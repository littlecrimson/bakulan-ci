<main class="container-custom">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">List pesanan anda</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=0; foreach($content as $row) : $no++ ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row->title ?></td>
                        <td><?= $row->price ?></td>
                        <td>
                            <form action="<?= base_url("cart/update/$row->id") ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                <div class="input-group">
                                    <input type="number" name="qty" class="form-control" value="<?= $row->qty ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-check"></i></button>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td><strong>Rp <?= number_format($row->subtotal, 0, ',','.') ?></strong></td>
                        <td class="text-center">
                            <form action="<?= base_url("cart/delete/$row->id") ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $row->id ?>">
                                <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <tr>
                        <td colspan="4">Total Belanja</td>
                        <td><strong>Rp <?= number_format(array_sum(array_column($content,'subtotal')), 0, ',','.') ?></strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <small>**Cek dengan teliti pesanan anda cebelum melakukan pembayaran</small>
        </div>
        <div class="col-md-12">
            <a href="<?= base_url('') ?>" class="btn btn-warning mt-2"><i class="fas fa-arrow-left"></i> Lanjutkan belanja</a>
            <a href="<?= base_url('checkout') ?>" class="btn btn-success mt-2 float-right">Lakukan pembayaran <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</main>

