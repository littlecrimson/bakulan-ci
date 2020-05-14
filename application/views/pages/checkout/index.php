<main class="container">
    <div class="row mb-4">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Formulir pembayaran
                </div>
                <div class="card-body">
                    <form action="<?= base_url('checkout/create') ?>" method="POST">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" class="form-control" required value="<?= $input->name ?>">
                            <?= form_error('name') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" id="" cols="30" rows="10" class="form-control"><?= $input->alamat ?></textarea>
                            <?= form_error('alamat') ?>
                        </div>
                        <div class="form-group">
                            <label for="">No. Telepon</label>
                            <input type="text" name="phone" class="form-control" required value="<?= $input->phone ?>">
                            <?= form_error('phone') ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Detail belanja
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>harga</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($cart as $row) : ?>
                                
                                <tr>
                                    <td><i><?= $row->title ?></i></td>
                                    <td><?= $row->qty ?></td>
                                    <td><?= number_format($row->price,0,',','.') ?></td>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <td colspan="2"><strong>Total</strong></td>
                                <td><strong>Rp <?= number_format(array_sum(array_column($cart,'subtotal')), 0, ',','.') ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
