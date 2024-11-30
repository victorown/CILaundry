<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class CustomerController extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();
        $data['customers'] = $customerModel->findAll();

        return view('customers/index', $data);

    }

    public function create()
    {
        return view('customers/create');
    }

    public function store()
    {
        $customerModel = new CustomerModel();

        $customerModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('/customers');
    }
}
