<main class="container-custom">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="h3 mr-3">Manajemen pembayaran</span>
                        <a href="<?= base_url('payment/create') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah</a>
                        <div class="float-right">
                            <form action="<?= base_url('payment/search') ?>" method="POST">
                                <div class="input-group">
                                    <input name="keyword" type="text" class="form-control form-control-sm" placeholder="Cari user" value="<?= $this->session->userdata('keyword') ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary btn-sm" type="submit"><i class="fas fa-search"></i></button>
                                        <a href="<?= base_url('payment/reset') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eraser"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Bank</th>
                                    <th>Norek</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; foreach($content as $row): $no++ ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= ucfirst($row->name) ?></td>
                                        <td><?= ucfirst($row->bank) ?></td>
                                        <td><?= $row->norek ?></td>
                                        <td>
                                        <?= form_open("payment/delete/$row->id",['method' => 'POST']) ?>
                                            <?= form_hidden('id',$row->id) ?>
                                            <a href="<?= base_url("payment/edit/$row->id") ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Apakah anda yakin ?')" ><i class="fas fa-trash"></i></button>
                                        <?= form_close() ?>
                                    </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <?= $paginate ?>
            </div>
        </div>
    </main>