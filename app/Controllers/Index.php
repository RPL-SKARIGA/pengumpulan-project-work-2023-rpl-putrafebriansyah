<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk;
use App\Models\Kategori;

class Index extends BaseController
{
    public function index()
    {
        $session = session();
        $produk = new Produk;
        $kategori = new Kategori;
        $data = [
            'data' => $session,
            'produk' => $produk->findAll(),
            'kategori' => $kategori->findAll(),
        ];
        echo view('index', $data);
    }
}
