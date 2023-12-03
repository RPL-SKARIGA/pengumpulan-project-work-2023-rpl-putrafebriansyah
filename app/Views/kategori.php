<h4 class="mt-4">Halaman kategori</h4>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>" class="text-decoration-none">Dashboard</a> > Kategori page</li>
</ol>
<div class="row">
    <div id="filter-kategori">

    </div>
</div>
<div class="row">
    <div class="mb-3 d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createkategori"><i class="fas fa-plus"></i>Tambah Kategori</button>
    </div>
    <div class="col-12 col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tabel kategori</div>
            </div>
            <div class="card-body">
                <table class="table table-borderless" id="get-data-kategori">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>opsi</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php $i = 1;
                        foreach ($kategori as $row) { ?>
                            <tr id="<?php echo $row['id']; ?>">
                                <td><?php echo $i++; ?>.</td>
                                <td><?php echo $row['nama_ktg']; ?></td>
                                <td>
                                    <button class='btn btn-sm btn-primary' data-id='<?php echo $row['id']; ?>' id='edit-kategori' data-bs-toggle='modal' data-bs-target='#update-kategori'>Edit</button> <button data-id='<?php echo $row['id']; ?>' id='delete-kategori' class='btn btn-sm btn-danger'>Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Kategori -->
<div class="modal fade" id="createkategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="savektg">
                    <div class="form-group">
                        <label for="nama_ktg">Nama kategori</label>
                        <input type="text" class="form-control mb-4" placeholder="Nama kategori" name="nama_ktg" id="nama_ktg">
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
<!-- Modal Edit Kategori -->
<div class="modal fade" id="update-kategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updatektg">
                    <div id="get-kategori-form"></div>
            </div>
            <div class="modal-footer d-grid gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="kategori.js"></script>