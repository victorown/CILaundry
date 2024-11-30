<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;


class UsersController extends BaseController
{
    protected $Users;
    protected $Validation;

    public function __construct()
    {
        $this->Users = new UserModel();
        $this->Validation = \Config\Services::validation();
    }

    public function register()
    {
        return view('auth/regis');
    }

    public function regis()
    {
        $this->Validation->setRules([
            'username' => [
                'rules' => 'required|min_length[3]|max_length[20]|alpha_numeric|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'min_length' => 'Username minimal harus memiliki 3 karakter.',
                    'max_length' => 'Username maksimal boleh memiliki 20 karakter.',
                    'alpha_numeric' => 'Username hanya boleh mengandung huruf dan angka.',
                    'is_unique' => 'Username sudah digunakan, silakan gunakan username lain.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password minimal harus memiliki 6 karakter.'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password harus diisi.',
                    'matches' => 'Konfirmasi password tidak sesuai dengan password.'
                ]
            ],
            'name' => [
                'rules' => 'required|alpha_space|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'alpha_space' => 'Nama hanya boleh mengandung huruf dan spasi.',
                    'min_length' => 'Nama minimal harus memiliki 3 karakter.',
                    'max_length' => 'Nama maksimal boleh memiliki 50 karakter.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Format email tidak valid.',
                    'is_unique' => 'Email sudah digunakan, silakan gunakan email lain.'
                ]
            ],
            'phone' => [
                'rules' => 'required|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi.',
                    'numeric' => 'Nomor telepon hanya boleh mengandung angka.',
                    'min_length' => 'Nomor telepon minimal harus memiliki 10 angka.',
                    'max_length' => 'Nomor telepon maksimal boleh memiliki 15 angka.'
                ]
            ],
            'address' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Alamat harus diisi.',
                    'max_length' => 'Alamat maksimal boleh memiliki 255 karakter.'
                ]
            ]
        ]);


        if ($this->Validation->withRequest($this->request)->run() === false) {
            return redirect()->back()->withInput()->with('error', $this->Validation->getErrors());
        }

        $this->Users->save([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('name'),
            'role' => 'pelanggan',
        ]);

        return redirect()->to('login');
    }

    public function login()
    {
        if (session()->get('logged_in')) {
            return redirect()->back();
        }
        return view('auth/login');
    }

    public function loggedIn()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $this->Users->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'name' => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'address' => $user['address'],
                'role' => $user['role'],
                'logged_in' => true
            ]);
        }
        if (session()->get('role') == 'admin') {
            return redirect()->to('admin/dashboard');
        }
        return redirect()->to('/');

        return redirect()->back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

    public function unauthorized()
    {
        return 'unauthorized';
    }
}
