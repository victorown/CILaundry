<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'order_date',
        'status',
        'total_amount',
        'payment_status',
        'pickup_address',
        'delivery_address',
        'pickup_time',
        'delivery_time',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getOrderByUserId($userId)
    {
        $orders = $this->db->table('orders')
            ->select('orders.id, orders.user_id, orders.order_date, orders.status, orders.payment_status, orders.total_amount')
            ->join('users', 'users.id = orders.user_id')
            ->where('orders.user_id', $userId)
            ->get()
            ->getResult();

        $orderItems = $this->db->table('order_items')
            ->select('order_items.id AS item_id, order_items.order_id, order_items.service_id, 
                  order_items.quantity, order_items.price, services.name AS service_name, 
                  services.price AS service_price')
            ->join('services', 'services.id = order_items.service_id')
            ->whereIn('order_items.order_id', array_column($orders, 'id'))
            ->get()
            ->getResult();

        foreach ($orders as $order) {
            $order->items = array_filter($orderItems, function ($item) use ($order) {
                return $item->order_id == $order->id;
            });
        }

        return $orders;
    }


    public function getPendingOrderByUser($userId)
    {
        return $this->where('user_id', $userId)
            ->where('payment_status', 'unpaid')
            ->first();
    }

    public function updateOrder($orderId, $data)
    {
        return $this->update($orderId, $data);
    }

    public function getAllOrders()
    {
        $builder = $this->db->table('orders');
        $builder->select('
        orders.id AS order_id,
        users.name AS user_name,
        orders.order_date,
        orders.status,
        orders.total_amount,
        services.name AS service_name,
        order_items.quantity AS item_quantity
    ');
        $builder->join('users', 'users.id = orders.user_id');
        $builder->join('order_items', 'order_items.order_id = orders.id');
        $builder->join('services', 'services.id = order_items.service_id');
        $builder->orderBy('orders.id', 'ASC');

        $result = $builder->get()->getResultArray();

        // Kelompokkan hasil berdasarkan order_id
        $orders = [];
        foreach ($result as $row) {
            $orderId = $row['order_id'];
            if (!isset($orders[$orderId])) {
                $orders[$orderId] = [
                    'order_id' => $row['order_id'],
                    'user_name' => $row['user_name'],
                    'order_date' => $row['order_date'],
                    'status' => $row['status'],
                    'total_amount' => $row['total_amount'],
                    'items' => [],
                ];
            }
            $orders[$orderId]['items'][] = [
                'service_name' => $row['service_name'],
                'item_quantity' => $row['item_quantity'],
            ];
        }

        return array_values($orders);
    }

    public function getOrderUser($id)
    {
        return $this->select('orders.id, orders.order_date, orders.status, orders.total_amount,
        orders.payment_status, orders.pickup_address, orders.delivery_address,
        orders.pickup_time, orders.delivery_time, users.name, users.email, users.phone')
            ->join('users', 'users.id = orders.user_id')
            ->where('orders.id', $id)
            ->first();
    }

    public function getOrdersDashboard()
    {
        return $this->select('orders.id, orders.order_date, orders.total_amount, orders.status, users.name')
        ->join('users', 'users.id = orders.user_id')
        ->orderBy('orders.order_date', 'DESC')
        ->get()
        ->getResult();
    }
}
