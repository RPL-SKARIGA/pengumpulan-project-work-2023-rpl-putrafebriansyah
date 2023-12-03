<h4 class="mt-4">Halaman Kategori</h4>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>" class="text-decoration-none">Dashboard</a> > kategori page</li>
</ol>
<div class="row">
  <div id="filter-produk">

  </div>
</div>
<div class="row">
  <div class="mb-3 d-flex justify-content-end">
    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#createproduk"><i class="fas fa-plus"></i>Tambah Produk</button>
  </div>
  <div class="col-12 col-md-12 col-xl-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Tabel produk</div>
      </div>
      <div class="card-body">
        <table class="table table-borderless" id="get-data">
          <thead>
            <tr>
              <th>#</th>
              <th>info produk</th>
              <th>harga jual</th>
              <th>Kategori</th>
              <th>opsi</th>
            </tr>
          </thead>
          <tbody class="align-middle">
            <?php $i = 1;
            foreach ($produk as $row) { ?>
              <tr id="<?php echo $row['id_prd']; ?>">
                <td><?php echo $i++; ?></td>
                <td>
                  <div class="row">
                    <div class="col-6 col-md-6 col-xl-3"><img src="uploads/<?php echo $row['gambar']; ?>" style="width: 70px; height: 70px;"></div>
                    <div class="col-6 col-md-6 col-xl-9"><?php echo $row['nama_brg']; ?><div><?php echo $row['created_at']; ?></div>
                    </div>
                  </div>
                </td>
                <td>
                  Rp <?php echo $row['harga']; ?> ;- diskon <?php echo $row['diskon']; ?>%
                  <div>
                    Harga jual Rp <?php $nilai = ($row['diskon'] / 100) * $row['harga'];
                                  $harga_jual = $row['harga'] - $nilai;
                                  echo $harga_jual ?> ;-
                  </div>
                </td>
                <td><?php echo $row['nama_ktg']; ?></td>
                <td>
                  <button class='btn btn-sm btn-primary' data-id='<?php echo $row['id_prd']; ?>' id='edit-produk' data-bs-toggle='modal' data-bs-target='#update-produk'>Edit</button> <button data-id='<?php echo $row['id_prd']; ?>' id='delete-produk' class='btn btn-sm btn-danger'>Delete</button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Produk -->
<div class="modal fade" id="createproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="saveproduk">
          <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-xl-6">
              <div class="form-group">
                <label for="nama_brg">Nama barang</label>
                <input type="text" class="form-control mb-4" placeholder="Nama barang" name="nama_brg" id="nama_brg">
              </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-xl-6">
              <div class="form-group">
                <label for="id_ktg">Kategori</label>
                <select name="id_ktg" id="id_ktg" class="form-control form-select">
                  <option> Pilih kategori produk </option>
                  <?php foreach ($kategori as $ktg) { ?>
                    <option value="<?php echo $ktg['id']; ?>"><?php echo $ktg['nama_ktg']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="file">Gambar:</label>
            <input type="file" name="file" id="file" class="form-control-file border mb-4">
          </div>
          <div class="row">
            <div class="col-4 col-sm-4 col-md-4 col-xl-4">
              <div class="form-group">
                <label for="harga">harga</label>
                <input type="number" class="form-control" placeholder="Harga barang" name="harga" id="harga">
              </div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-xl-4">
              <div class="form-group">
                <label for="diskon">diskon</label>
                <input type="text" class="form-control" placeholder="Diskon item ?" name="diskon" id="diskon" min="1" max="90">
              </div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-xl-4">
              <div class="form-group">
                <label for="stok">stok</label>
                <input type="text" class="form-control" placeholder="Stok item ?" name="stok" id="stok" min="1" max="90">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Produk -->
<div class="modal fade" id="update-produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateproduk">
          <div id="get-produk-form"></div>
      </div>
      <div class="modal-footer d-grid gap-2">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript" src="produk.js"></script>