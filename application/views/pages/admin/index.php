<main class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-gears"></i>Control Panel Admin
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="<?= base_url('order') ?>" class="btn btn-block btn-cs-1 text-white"><i class="fas fa-dollar-sign"></i> Pesanan</a>
                            <a href="<?= base_url('product') ?>" class="btn btn-block btn-cs-2 text-white"><i class="fas fa-box"></i> Produk</a>
                            <a href="<?= base_url('category') ?>" class="btn btn-block btn-cs-3 text-white"><i class="fas fa-tags"></i> Kategori</a>
                            <a href="<?= base_url('admin/manage') ?>" class="btn btn-block btn-cs-4 text-white"><i class="fas fa-user"></i> User</a>
                            <a href="<?= base_url('promo') ?>" class="btn btn-block btn-cs-5 text-white"><i class="fas fa-percent"></i> Promo</a>
                            <a href="<?= base_url('payment') ?>" class="btn btn-block btn-cs-6 btn-danger"><i class="fas fa-credit-card"></i> Payment</a>
                        </div>
                        <div class="col-md-9">
                            <h1 class="h3">Selamat datang, <?= $this->session->userdata('name'); ?></h1>
                            <p>Mau nglakuin apa hari ini ?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>