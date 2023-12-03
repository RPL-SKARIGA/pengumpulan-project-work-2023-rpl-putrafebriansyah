<h4 class="mt-4">Dashboard</h4>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <div>Jumlah Produk : <b><?php echo count($produk) ?></b> <i class="fas fa-box"></i></div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white text-decoration-none stretched-link" href="<?= site_url('produk') ?>">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <div>Jumlah Kategori : <b><?php echo count($produk) ?></b> <i class="fas fa-box"></i></div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white text-decoration-none stretched-link" href="<?= site_url('produk') ?>">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>