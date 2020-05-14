<main class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Manajemen banner promo</span>
                    <div class="float-right">
                    <a href="<?= base_url('promo/create') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0; foreach($content as $row): $no++ ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><img src="<?= base_url("images/promo/$row->image") ?>" class="img-fluid" style="height: 100px"></td>
                                <td class="text-center">
                                <?= form_open_multipart("promo/delete/$row->id", ['method' => 'POST']) ?>
                                <?= form_hidden('id',$row->id) ?>
                                    <a href="<?= base_url("promo/edit/$row->id") ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')"><i class="fas fa-trash"></i></button>
                                <?= form_close() ?>
                                </td>
                            </tr>
                           <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>