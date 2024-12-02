<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\PaymentModel;
use App\Models\ServicesModel;
use CodeIgniter\HTTP\ResponseInterface;

class PaymentController extends BaseController
{
    protected $Service;
    protected $Order;
    protected $OrderItem;
    protected $Payment;

    public function __construct()
    {
        $this->Service = new ServicesModel();
        $this->Order = new OrderModel();
        $this->OrderItem = new OrderItemModel();
        $this->Payment = new PaymentModel();
    }

    public function payment()
    {
        $validationRule = [
            'pickup_address' => [
                'label' => 'Pickup Address',
                'rules' => 'required|string|max_length[255]',
            ],
            'delivery_address' => [
                'label' => 'Delivery Address',
                'rules' => 'required|string|max_length[255]',
            ],
            'pickup_time' => [
                'label' => 'Pickup Time',
                'rules' => 'required|valid_date[Y-m-d\TH:i]',
            ],
            'delivery_time' => [
                'label' => 'Delivery Time',
                'rules' => 'required|valid_date[Y-m-d\TH:i]',
            ],
            'payment_method' => [
                'label' => 'Payment Method',
                'rules' => 'required|in_list[transfer,cash]',
            ],
            'receipt_img' => [
                'label' => 'Receipt Image',
                'rules' => [
                    'uploaded[receipt_img]',
                    'is_image[receipt_img]',
                    'mime_in[receipt_img,image/jpg,image/jpeg,image/png]',
                    'max_size[receipt_img,2048]',
                ],
            ],
        ];

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            return redirect()->back()->withInput()->with('error', implode('<br>', $data['errors']));
        }

        $file = $this->request->getFile('receipt_img');

        if ($file->isValid() && !$file->hasMoved()) {
            // Generate random file name and move to public directory
            $fileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/', $fileName);

            // Log informasi file
            log_message("info", $fileName . " saved to public upload folder");

            // Path untuk disimpan ke database
            $receiptPath = 'uploads/' . $fileName;
        } else {
            return redirect()->back()->withInput()->with('error', 'File upload failed or has already been moved.');
        }

        $orderData = [
            'pickup_address' => $this->request->getPost('pickup_address'),
            'delivery_address' => $this->request->getPost('delivery_address'),
            'pickup_time' => $this->request->getPost('pickup_time'),
            'delivery_time' => $this->request->getPost('delivery_time'),
            'status' => 'in progress',
        ];

        $orderId = $this->request->getPost('id');

        if (!$this->Order->update($orderId, $orderData)) {
            return redirect()->back()->withInput()->with('error', 'Failed to update order.');
        }

        $paymentData = [
            'order_id' => $orderId,
            'payment_date' => date('Y-m-d H:i:s'),
            'payment_method' => $this->request->getPost('payment_method'),
            'receipt_img' => $receiptPath,
            'payment_status' => $this->request->getPost('payment_method') === 'cash' ? 'paid' : 'pending',
        ];

        if (!$this->Payment->insert($paymentData)) {
            return redirect()->back()->withInput()->with('error', 'Failed to insert payment data.');
        }

        return redirect()->to('/')->with('success', 'Order and payment data updated successfully.');
    }
}
