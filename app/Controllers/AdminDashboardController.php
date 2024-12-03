<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\PaymentModel;
use App\Models\ServicesModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminDashboardController extends BaseController
{
    protected $Order;
    protected $OrderItem;
    protected $Payment;
    protected $Services;
    protected $User;

    public function __construct()
    {
        $this->Order = new OrderModel();
        $this->OrderItem = new OrderItemModel();
        $this->Payment = new PaymentModel();
        $this->Services = new ServicesModel();
        $this->User = new UserModel();
    }

    public function index()
    {
        $data['orders'] = $this->Order->getOrdersDashboard();
        $data['total_services'] = $this->Services->countAll();
        $data['total_orders'] = $this->Order->countAll();
        $data['total_customers'] = $this->User->where('role', 'pelanggan')->countAllResults();
        $data['title'] = 'Admin | Dashboard';
        $data['subTitle'] = 'Dashboard';
        // dd($data);
        return view('admin/dashboard', $data);
    }
}
