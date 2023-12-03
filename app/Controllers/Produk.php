<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk as ModelsProduk;
use App\Models\Kategori as ModelsKategori;

class Produk extends BaseController
{
    public function index()
    {
        $session = session();
        $builder = new ModelsProduk();
        $builder = $builder->join('tb_kategori', 'tb_produk.id_ktg = tb_kategori.id')->select('tb_kategori.id as id_ktg, tb_produk.id as id_prd, tb_produk.nama_brg, tb_produk.harga, tb_produk.gambar, tb_produk.diskon, tb_produk.created_at, tb_kategori.nama_ktg')->findAll();
        $kategori = new ModelsKategori();
        $data = [
            'data' => $session,
            'produk' => $builder,
            'kategori' => $kategori->findAll()
        ];
        echo view('template/header', $data);
        echo view('produk', $data);
        echo view('template/footer');
    }

    public function store()
    {
        $produk = new ModelsProduk();
        $file = $this->request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move("uploads/", $newName);
        }
        
        $data = [
            'nama_brg' => $this->request->getVar('nama_brg'),
            'id_ktg' => $this->request->getVar('id_ktg'),
            'gambar' => $newName,
            'harga' => $this->request->getVar('harga'),
            'diskon' => $this->request->getVar('diskon'),
            'stok' => $this->request->getVar('stok'),
        ];

        $result = $produk->save($data);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    // public function getData()
    // {
    //     $i = 1;
    //     $produks = new ModelsProduk();
    //     $results = $produks->orderBy('id', 'DESC')->findAll();
    //     $output = "";
    //     foreach ($results as $produk) {
    //         $output .= "
    //     <tr>
    //         <td>" . $i++ ."</td>
    //         <td><div class='row'><div class='col-2 col-md-2 col-xl-2'><img src='uploads/{$produk['gambar']}' alt='{$produk['gambar']}' style='width:75px;height:75px;'></div><div class='col-10 col-md-10 col-xl-10'><div>{$produk['nama_brg']}</div><div>{$produk['created_at']}</div></div></div></td>
    //         <td>{$produk['harga']}</td>
    //         <td><button class='btn btn-sm btn-primary' data-toggle='modal' data-id='{$produk['id']}' id='edit-produk' data-bs-toggle='modal' data-bs-target='#update-produk'>Edit</button> <button data-id='{$produk['id']}' id='delete-produk' class='btn btn-sm btn-danger'>Delete</button></td>
    //     </tr>";
    //     }
    //     echo $output;
    // }

    public function edit()
    {
        $id = $this->request->getVar('id');
        $produk = new ModelsProduk();
        $produk = $produk->join('tb_kategori', 'tb_produk.id_ktg = tb_kategori.id')->select('tb_kategori.id as id_ktg, tb_produk.id as id_prd, tb_produk.nama_brg, tb_produk.harga, tb_produk.gambar, tb_produk.diskon, tb_produk.stok, tb_produk.created_at, tb_kategori.nama_ktg')->find($id);
        $kategoris = new ModelsKategori();
        $kategori = $kategoris->findAll();
        $output1 = "
    <div class='form-group mb-3'>
        <label for='nama barang'>Nama barang</label>
        <input type='text' class='form-control' name='nama_brg' value='{$produk['nama_brg']}' placeholder='Nama Barang' id='edit_nama_brg'>
        <input type='hidden' class='form-control' placeholder='Nama Barang' value='{$produk['id_prd']}' id='id' name='id'>
    </div>
    <div class='form-group mb-3'>
        <label for='kategori'>Kategori</label>
        <select name='id_ktg' id='edit_id_ktg' class='form-select'>
            <option value='{$produk['id_ktg']}'>{$produk['nama_ktg']} - kategori saat ini</option>
            <option> Pilih kategori item </option>
            ";
        echo $output1;
foreach($kategori as $ktg){ ?> <?php echo "<option value='{$ktg['id']}'>{$ktg['nama_ktg']}</option>";}
$output3 = "
        </select>
        <input type='hidden' class='form-control' placeholder='Nama kategori' value='{$produk['id_prd']}' id='id' name='id'>
    </div>
    <div class='d-flex justify-content-center'>
        <img class='mb-3' src='uploads/{$produk['gambar']}' alt='{$produk['gambar']}' style='width:70px;height:70px;'>
    </div>
    <div class='form-group text-center mb-3'>
        <label for='file'>Gambar</label>
        <input type='file' class='form-control-file border' name='new_image' id='new_image'>
        <input type='hidden' value='{$produk['gambar']}' class='form-control-file border' name='old_image' id='old_image'>
    </div>
    <div class='row'>
        <div class='col-4 col-sm-4 col-md-4 col-xl-4'>
            <div class='form-group'>
                <label for='harga'>Harga</label>
                <input type='text' class='form-control' name='harga' value='{$produk['harga']}' placeholder='Harga barang' id='edit_harga'>
                <input type='hidden' class='form-control' placeholder='harga' value='{$produk['id_prd']}' id='id' name='id'>
            </div>
        </div>
        <div class='col-4 col-sm-4 col-md-4 col-xl-4'>
            <div class='form-group'>
                <label for='diskon'>Diskon</label>
                <input type='text' class='form-control' name='diskon' value='{$produk['diskon']}' placeholder='Diskon nya berapa ?' id='edit_diskon'>
                <input type='hidden' class='form-control' placeholder='harga' value='{$produk['id_prd']}' id='id' name='id'>
            </div>
        </div>
        <div class='col-4 col-sm-4 col-md-4 col-xl-4'>
            <div class='form-group'>
                <label for='stok'>Stok produk</label>
                <input type='text' class='form-control' name='stok' value='{$produk['stok']}' placeholder='Stok itemnya ?' id='edit_stok'>
                <input type='hidden' class='form-control' placeholder='Stok' value='{$produk['id_prd']}' id='id' name='id'>
            </div>
        </div>
    </div>
    ";
        // echo $output2;
        echo $output3;
    }

    public function update()
    {
        $produks=new ModelsProduk();
       
        // $product=$produks->find($id);
        $new_image = $this->request->getFile('new_image');
        $old_image = $this->request->getVar('old_image');
        $newImage="";
        if ($new_image != "") {
            $path = "uploads/" . $old_image;
            if (file_exists($path)) {
                unlink($path);
            }
            if($new_image->isValid() && ! $new_image->hasMoved()){  
                $newImage = $new_image->getRandomName();
                $new_image->move("uploads/", $newImage);
            }
        }else{  
            $newImage=$old_image;
        }

        $data=[  
            'id'=>$this->request->getVar('id'),
            'nama_brg'=>$this->request->getVar('nama_brg'),
            'id_ktg'=>$this->request->getVar('id_ktg'),
            'gambar'=>$newImage,
            'harga'=>$this->request->getVar('harga'),
            'diskon'=>$this->request->getVar('diskon'),
            'stok'=>$this->request->getVar('stok'),
        ];
        $result=$produks->save($data);
        if($result) {
            echo 1;
        }else{  
            echo 0;
        }
    }

    public function delete()
    {
        $id = $this->request->getVar('id');

        $produks = new ModelsProduk();
        $get = $produks->find($id);
        $path = "uploads/" . $get['gambar'];
        if (file_exists($path)) {
            unlink($path);
        }
        $result = $produks->delete($id);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
