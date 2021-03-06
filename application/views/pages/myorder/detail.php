<main class="container">
    <div class="row mb-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Detail Order #<?= $order->invoice ?>
                </div>
                <div class="card-body">
                    <p>Nama : <?= $order->name ?></p>
                    <p>Telepon : <?= $order->phone ?></p>
                    <p>Alamat : <?= $order->alamat ?></p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($order_detail as $row) : ?>
                                <tr>
                                    <td><strong><?= $row->title ?></strong></td>
                                    <td>Rp <?= number_format($row->price,0,',','.') ?></td>
                                    <td><?= $row->qty ?></td>
                                    <td>Rp <?= number_format($row->subtotal,0,',','.') ?></td>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <td colspan="3"><strong>Total</td>
                                <td>Rp <?= number_format(array_sum(array_column($order_detail,'subtotal')),0,',','.') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php if($order->status === 'waiting') : ?>
                    <div class="card-footer">
                        <a href="<?= base_url("myorder/confirm/$order->invoice") ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
                    </div>
                <?php endif ?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Status Pesanan
                </div>
                <div class="card-body">
                    <?php $this->load->view('layouts/_status',['status' => $order->status]); ?>
                </div>
            </div>
        </div>
    </div>

    <?php if(isset($order_confirm)) : ?>
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Bukti Konfirmasi Pembayaran
                    </div>
                    <div class="card-body">

                    <table class="table">
                        <tbody>
                            <tr>
                                <td>No Rekening</td>
                                <td>:</td>
                                <td><?= $order_confirm->account_number ?></td>
                            </tr>
                            <tr>
                                <td>Atas nama</td>
                                <td>:</td>
                                <td><?= $order_confirm->account_name ?></td>
                            </tr>
                            <tr>
                                <td>Nominal</td>
                                <td>:</td>
                                <td>Rp <?= number_format($order_confirm->nominal,0,',','.') ?>,-</td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td>:</td>
                                <td><?= $order_confirm->note ?></td>
                            </tr>
                        </tbody>
                    </table>
                        <p>Bukti transfer : </p>
                        <img src="<?= base_url("images/confirm/$order_confirm->image") ?>" class="img-thumbnail img-fluid">
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
</main>