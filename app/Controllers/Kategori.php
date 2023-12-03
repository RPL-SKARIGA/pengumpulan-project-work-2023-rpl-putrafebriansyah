<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori as model;

class Kategori extends BaseController
{

    public function index()
    {
        $session = session();
        $kategori = new model();
        $data = [
            'data' => $session,
            'kategori' => $kategori->findAll()
        ];
        echo view('template/header', $data);
        echo view('kategori', $data);
        echo view('template/footer');
    }

    public function store()
    {
        $kategori = new model();
        $data = [
            'nama_ktg' => $this->request->getVar('nama_ktg')
        ];

        $result = $kategori->save($data);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function edit()
    {
        $id = $this->request->getVar('id');
        $kategoris = new Model();
        $kategori = $kategoris->find($id);
        $output = "
    <div class='form-group mb-3'>
        <label for='nama kategori'>Nama kategori</label>
        <input type='text' class='form-control' name='nama_ktg' value='{$kategori['nama_ktg']}' placeholder='Nama Kategori' id='edit_nama_ktg'>
        <input type='hidden' class='form-control' placeholder='Nama Kategori' value='{$kategori['id']}' id='id' name='id'>
    </div>
    ";

        echo $output;
    }

    public function update()
    {
        $kategoris = new Model();

        $data = [
            'id' => $this->request->getVar('id'),
            'nama_ktg' => $this->request->getVar('nama_ktg')
        ];
        $result = $kategoris->save($data);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function delete()
    {
        $id = $this->request->getVar('id');

        $kategoris = new Model();
        $result = $kategoris->delete($id);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
