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
}
