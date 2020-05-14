<main class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    Daftar pesanan anda
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Invoice</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($content as $row) : ?>
                                <tr>
                                    <td><a href="<?= base_url("myorder/detail/$row->invoice") ?>">#<?= $row->invoice ?></a></td>
                                    <td><?= date("d-m-Y", strtotime($row->date)) ?></td>
                                    <td>Rp <?= number_format($row->total,0,',','.') ?></td>
                                    <td><?php $this->load->view('layouts/_status', ['status' => $row->status]); ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>