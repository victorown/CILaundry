<?php

namespace App\Controllers;

use App\Models\ServicesModel;

class Home extends BaseController
{
    protected $Services;

    public function __construct()
    {
        $this->Services = new ServicesModel();
    }

    public function index()
    {
        $data['services'] = $this->Services->findAll();
        $data['title'] = 'Home';
        return view('home', $data);
    }

}
