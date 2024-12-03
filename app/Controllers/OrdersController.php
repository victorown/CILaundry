<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\PaymentModel;
use App\Models\ServicesModel;
use CodeIgniter\HTTP\ResponseInterface;

class OrdersController extends BaseController
{
    protected $Orders;
    protected $Item;
    protected $Services;
    protected $Payment;
    protected $db;

    public function __construct()
    {
        $this->Orders = new OrderModel();
        $this->Services = new ServicesModel();
        $this->Payment = new PaymentModel();
        $this->Item = new OrderItemModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['orders'] = $this->Orders->getAllOrders();
        $data['title'] = 'Admin | Orders';
        $data['subTitle'] = 'Orders List';
        return view('admin/orders/index', $data);
    }

    public function orders($id)
    {
        $data['service'] = $this->Services->find($id);
        $data['quantity'] = $this->request->getPost('quantity');

        $itemPrice = $data['service']['price'] * $data['quantity'];
        $userId = session()->get('id');

        $existingOrder = $this->Orders->getPendingOrderByUser($userId);

        $this->db->transBegin();

        try {
            if ($existingOrder) {
                $orderId = $existingOrder['id'];
                $newTotalAmount = $existingOrder['total_amount'] + $itemPrice;

                $order = [
                    'order_date' => date('Y-m-d H:i:s'),
                    'total_amount' => $newTotalAmount
                ];

                if (!$this->Orders->updateOrder($orderId, $order)) {
                    throw new \Exception('Gagal memperbarui data order.');
                }

                $orderItem = [
                    'order_id' => $orderId,
                    'service_id' => $data['service']['id'],
                    'quantity' => $data['quantity'],
                    'price' => $itemPrice
                ];

                if (!$this->Item->insert($orderItem)) {
                    throw new \Exception('Gagal menambahkan order item.');
                }
            } else {
                $order = [
                    'user_id' => $userId,
                    'order_date' => date('Y-m-d H:i:s'),
                    'total_amount' => $itemPrice,
                    'payment_status' => 'unpaid'
                ];

                $orderId = $this->Orders->insert($order);

                $orderItem = [
                    'order_id' => $orderId,
                    'service_id' => $data['service']['id'],
                    'quantity' => $data['quantity'],
                    'price' => $itemPrice
                ];

                if (!$this->Item->insert($orderItem)) {
                    throw new \Exception('Gagal menambahkan order item.');
                }
            }

            if ($this->db->transStatus() === false) {
                throw new \Exception('Transaction failed');
            }

            $this->db->transCommit();

            return redirect()->to('/pelanggan/cart')->with('success', 'Order berhasil dibuat!');
        } catch (\Exception $e) {
            $this->db->transRollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat order: ' . $e->getMessage());
        }
    }

    public function cart()
    {
        $data['orders'] = $this->Orders->getOrderByUserId(session()->get('id'));
        $data['title'] = 'Cart';
        // dd($data);
        return view('customers/cart', $data);
    }

    public function destroy($id)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'ID tidak valid.');
        }

        $data = $this->Item->find($id);
        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $orderId = $data['order_id'];
        $price = $data['price'];

        $order = $this->Orders->find($orderId);
        if (!$order) {
            return redirect()->back()->with('error', 'Data order tidak ditemukan.');
        }

        $newTotalAmount = $order['total_amount'] - $price;
        if ($newTotalAmount < 0) {
            $newTotalAmount = 0;
        }

        if (!$this->Orders->update($orderId, ['total_amount' => $newTotalAmount])) {
            return redirect()->back()->with('error', 'Gagal memperbarui total_amount.');
        }

        if (!$this->Item->delete($id)) {
            return redirect()->back()->with('error', 'Gagal menghapus data order_item.');
        }

        return redirect()->back()->with('success', 'Data berhasil dihapus dan total pembayaran diperbarui.');
    }

    public function detail($id)
    {
        $data['order'] = $this->Orders->getOrderUser($id);
        $data['items'] = $this->Item->getDetailByOrderId($id);
        $data['payment'] = $this->Payment->getPaymentByOrderId($id);
        $data['title'] = 'Admin | Orders';
        $data['subTitle'] = 'Detail Order';
        // dd($data);
        return view('admin/orders/detail', $data);
    }

    public function approve($id)
    {

        $order = [
            'status' => 'completed',
            'payment_status' => 'paid'
        ];

        $payment = [
            'payment_status' => 'confirmed'
        ];

        $this->db->transStart();

        $this->Orders->update($id, $order);

        $this->Payment->where('order_id', $id)->set($payment)->update();

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return redirect()->back()->with('error', 'Approval failed. Please try again.');
        }

        return redirect()->to('/admin/orders')->with('success', 'Order approved successfully.');
    }


    public function reject($id)
    {
        $order = [
            'status' => 'cancelled',
            'payment_status' => 'unpaid'
        ];

        $payment = [
            'payment_status' => 'failed'
        ];

        $this->db->transStart();

        $this->Orders->update($id, $order);

        $this->Payment->where('order_id', $id)->set($payment)->update();

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return redirect()->back()->with('error', 'Reject failed. Please try again.');
        }

        return redirect()->to('/admin/orders')->with('success', 'Order rejected successfully.');
    }
}
