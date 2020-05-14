<main role="main" class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Manajemen Pesanan</span>
                    <div class="float-right">
                        <form action="<?= base_url('order/search') ?>" method="POST">
                            <div class="input-group">
                                <input name="keywords" type="text" class="form-control form-control-sm" placeholder="Cari...." value="<?= $this->session->userdata('keywords') ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary btn-sm" type="submit"><i class="fas fa-search"></i></button>
                                    <a href="<?= base_url('order/reset') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eraser"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nomor Invoice</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                        </thead>
                        <tbody>
                            <?php foreach($content as $row) : ?>
                                <tr>
                                    <td><a href="<?= base_url("order/detail/$row->id") ?>">#<?= $row->invoice ?></a></td>
                                    <td><?= date('d/m/Y',strtotime($row->date)) ?></td>
                                    <td>Rp <?= number_format($row->total,0,',','.') ?></td>
                                    <td><?php $this->load->view('layouts/_status', ['status' => $row->status] ); ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <?= $pagination ?>
                </div>
            </div>
        </div>
    </div>
</main>