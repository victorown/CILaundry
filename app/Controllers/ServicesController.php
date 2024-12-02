<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServicesModel;
use CodeIgniter\HTTP\ResponseInterface;

class ServicesController extends BaseController
{
    protected $Services;
    protected $Validation;

    public function __construct()
    {
        $this->Services = new ServicesModel();
        $this->Validation = \Config\Services::validation();
    }

    public function index()
    {
        $data['services'] = $this->Services->findAll();
        $data['title'] = 'Admin | Services';
        $data['subTitle'] = 'Services List';
        return view('admin/services/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Admin | Services';
        $data['subTitle'] = 'Services';
        return view('admin/services/create', $data);
    }

    public function store($id = null)
    {
        $this->Validation->setRules([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                ],
            ],
            'price' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga harus diisi.',
                ],
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.',
                ],
            ],
        ]);

        if (!$this->Validation->withRequest($this->request)->run()) {
            $errors = $this->Validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
        ];

        if ($id !== null) {
            $data['id'] = $id;
        }

        if ($this->Services->save($data)) {
            $message = $id ? 'Service berhasil diperbarui!' : 'Service berhasil ditambahkan!';
            return redirect()->to('/admin/service')->with('success', $message);
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        $data['service'] = $this->Services->where('id', $id)->first();
        $data['title'] = 'Admin | Services';
        $data['subTitle'] = 'Services';
        return view('admin/services/edit', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        dd($data);
        return 1;
    }

    public function destroy($id)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'ID tidak valid.');
        }

        $data = $this->Services->find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        if ($this->Services->delete($id)) {
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }

    public function detail($id)
    {
        $data['service'] = $this->Services->find($id);
        $data['title'] = 'Detail Service';
        return view('customers/detail', $data);
    }

    public function display()
    {
        $data['services'] = $this->Services->findAll();
        $data['title'] = 'Services';
        return view('customers/services', $data);
    }
}
