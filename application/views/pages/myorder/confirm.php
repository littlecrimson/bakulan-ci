<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Konfirmasi Pembayaran <a href="<?= base_url("myorder/detail/$order->invoice") ?>">#<?= $order->invoice ?></a></span>
                    <span class="float-right">
                        <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                    </span>
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <?= form_hidden('id_order',$order->id) ?>
                        <div class="form-group">
                            <label for="">No Invoice</label>
                            <input type="text" class="form-control" value="<?= $order->invoice ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Dari rekening a/n</label>
                            <input name="account_name" type="text" class="form-control" value="<?= $input->account_name ?>">
                            <?= form_error('account_name') ?>
                        </div>

                        <div class="form-group">
                            <label for="">No rekening </label>
                            <input name="account_number" type="text" class="form-control" value="<?= $input->account_number ?>">
                            <?= form_error('account_number') ?>
                        </div>

                        <div class="form-group">
                            <label for="">Nominal Transfer </label>
                            <input name="nominal" type="number" class="form-control" value="<?= $input->nominal ?>">
                            <?= form_error('nominal') ?>
                        </div>

                        <div class="form-group">
                            <label for="">Catatan </label>
                            <textarea name="note" class="form-control" placeholder="Catatan : warna, ukuran, dll"><?= $input->note ?></textarea>
                            <?= form_error('note') ?>
                        </div>

                        <div class="form-group">
                            <label for="">Bukti Transfer</label>
                            <input type="file" name="image" id="img_input" style="display: block">
                            <?php if ($this->session->flashdata('image_error')) : ?>
								<small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
							<?php endif ?>
                            <img id="img_show"></img>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>