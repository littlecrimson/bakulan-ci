<main class="container-custom">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-img-top">
                    <img src="<?= ($input->image) ? 'images/user/'.$input->image : 'http://placehold.co/200x200' ?>" alt="" id="img_show">
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <?= form_hidden('id',$this->session->userdata('id')) ?>
                    <input type="file" name="image" id="img_input">
                    <a href="#" class="btn btn-block" onclick="document.getElementById('img_input').click();"><i class="fas fa-edit"></i> Ubah gambar</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    Profile
                </div>
                <div class="card-body"> 
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
                            <label for="">Alamat</label>
                            <?= form_textarea(['name' => 'alamat', 'value' => $input->alamat, 'row' => 4, 'class' => 'form-control']) ?>
                            <?= form_error('alamat') ?>
                        </div>
                </div>
                <div class="card-footer">
                        <button class="btn btn-primary" type="submit" id="simpan"><i class="fas fa-save"></i> Simpan perubahan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>