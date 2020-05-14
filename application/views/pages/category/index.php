<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Kategori</span>
                    <a href="<?= base_url('category/create') ?>" class="btn btn-sm btn-secondary">Tambah</a>

                    <div class="float-right">
                        <?= form_open(base_url('category/search'), ['method' => 'POST']) ?>
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control form-control-sm" placeholder="Cari...." value="<?= $this->session->userdata('keyword') ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary btn-sm" type="submit"><i class="fas fa-search"></i></button>
                                    <a href="<?= base_url('category/reset') ?>?" class="btn btn-secondary btn-sm"><i class="fas fa-eraser"></i></a>
                                </div>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col"></th>
                        </thead>
                        <tbody>

                        <?php $no=0; foreach($content as $row): $no++;?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td>
                                    <p><?= $row->title ?></p>
                                </td>
                                <td><?= $row->slug ?></td>
                                <td>
                                    <?= form_open("category/delete/$row->id", ['method' => 'POST']) ?>
                                    <?= form_hidden('id',$row->id) ?>
                                        <a href="<?= base_url("category/edit/$row->id") ?>" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure ?');" type="submit">
                                            <i class="fas fa-trash "></i>
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