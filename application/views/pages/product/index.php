<main role="main" class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Produk</span>
                    <a href="<?= base_url('product/create') ?>" class="btn btn-sm btn-secondary">Tambah</a>

                    <div class="float-right">
                        <form action="<?= base_url('product/search') ?>" method="POST">
                            <div class="input-group">
                                <input name="keywords" type="text" class="form-control form-control-sm" placeholder="Cari...." value="<?= $this->session->userdata('keywords') ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary btn-sm" type="submit"><i class="fas fa-search"></i></button>
                                    <a href="<?= base_url('product/reset') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eraser"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stock</th>
                                <th></th>
                        </thead>
                        <tbody>
                        <?php $no=0; foreach($content as $row): $no++?>
                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                    <p>
                                        <img src="<?= $row->image ? base_url("images/product/$row->image") : 'https://placehold.co/50x10' ?>" alt="" height="50px">
                                        <?= $row->product_title ?>
                                    </p>
                                </td>
                                <td>
                                    <span class="badge badge-primary"><i class="fas fa-tags"></i> <?= $row->category_title ?></span>
                                </td>
                                <td>Rp <?= number_format($row->price, 0, ',', '.') ?></td>
                                <td><?= $row->is_available ? 'Tersedia' : 'Kosong' ?></td>
                                <td>
                                    <?= form_open(base_url("product/delete/$row->id"), ['method' => 'POST']) ?>
                                    <?= form_hidden('id', $row->id) ?>
                                        <a href='<?= base_url("/product/edit/$row->id") ?>' class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure ?');" type="submit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    <?= form_close() ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?= $pagination ?>
                </div>
            </div>
        </div>
    </div>
  </main>