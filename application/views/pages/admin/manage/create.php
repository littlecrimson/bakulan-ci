<main class="container-custom">
    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card mb-4">
                    <div class="card-header">
                        Tambah user
                    </div>
                    <div class="card-body">
                    <?= isset($input->id) ? form_hidden('id',$input->id) : '' ?>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <?= form_input(['name' => 'name', 'value' => $input->name,'class' => 'form-control', 'required' => true, 'autofocus' => true]); ?>
                                <?= form_error('name') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'required' => true, 'placeholder' => 'Masukkan alamat email']) ?>
                                <?= form_error('email') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 8 karakter']); ?>
                                <?= form_error('password') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Role</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <?= form_radio(['name' => 'role', 'value' => 'admin', 'checked' => $input->role == 'admin' ? true : false, 'class' => 'form-check-input']) ?>
                                    <label for="">Admin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <?= form_radio(['name' => 'role', 'value' => 'member', 'checked' => $input->role == 'member' ? true : false, 'class' => 'form-check-input']) ?>
                                    <label for="">Member</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <br>
                                <input type="file" name="image" style="display: block">
                                <?php if($this->session->flashdata('image_error')) : ?>
                                <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                                <?php endif; ?>
                            </div>
                    </div>
                    <div class="card-footer">
                            <button class="btn btn-primary" type="submit" id="simpan"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    <?= form_close() ?>
</main>