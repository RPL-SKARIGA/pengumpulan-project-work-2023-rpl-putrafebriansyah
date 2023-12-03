<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $produk = new Produk;
        $data = [
            'data' => $session,
            'produk' => $produk->findAll()
        ];
        echo view('template/header', $data);
        echo view('admin', $data);
        echo view('template/footer');
    }
}
