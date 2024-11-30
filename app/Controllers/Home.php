<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // $data['customers'] = [
        //     [
        //         'id' => 1,
        //         'name' => 'John Doe',
        //         'email' => 'johndoe@example.com',
        //         'phone' => '123456789',
        //         'address' => '123 Example Street'
        //     ]
        // ];
        // return view('laundry_view', $data);
        return view('home');
    }

    public function pelanggan()
    {
        return view('home');
    }
    
}
