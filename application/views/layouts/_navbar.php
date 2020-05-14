<nav class="navbar navbar-expand-lg mb-4">
    <div class="container">
    <a href="<?= base_url() ?>" class="navbar-brand">Bakulan</a>
    <form action="<?= base_url('home/search') ?>" class="form-inline mx-auto">
        <input name="produk" type="text" class="form-control" id="search" placeholder="Belanja apa hari ini ?" value="<?= $this->session->userdata('produk') ?>">
    </form>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item mr-2">
            <a href="<?= base_url('cart') ?>" class="nav-link"><span class="iconify" data-inline="false" data-icon="ant-design:shopping-cart-outlined" style="font-size: 28px;"></span><small> <?= (getCart()) ? getCart() : '' ?></small></a>
        </li>
        <li class="nav-item ml-2 dropdown">
            <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="iconify" data-inline="false" data-icon="ant-design:user-outlined" style="font-size: 28px;"></span></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php if(!$this->session->userdata('is_login')): ?>
                <a class="dropdown-item" href="<?= base_url('login') ?>">Login</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('register') ?>">Daftar</a>
                <?php else: ?>
                <?php if($this->session->userdata('role') === 'admin'): ?>
                    <a class="dropdown-item" href="<?= base_url('admin') ?>">Control Panel</a>
                    <div class="dropdown-divider"></div>
                <?php endif ?>
                <a class="dropdown-item" href="<?= base_url('profile') ?>">Profil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('myorder') ?>">Orders</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('logout') ?>">Log out</a>
                <?php endif ?>
            </div>
        </li>
    </ul>
    </div>
</nav>