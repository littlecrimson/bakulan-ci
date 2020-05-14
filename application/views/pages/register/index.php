<main class="container-center">
    <div class="row">
        <img src="<?= base_url('/assets/images/drawkit2.svg') ?>" class="drawkit">
        <img src="<?= base_url('/assets/images/plant-3.svg') ?>" class="plant-2">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">REGISTER</h1>
                </div>
                <div class="col-md-12">
                    <?= form_open('register', ['method' => 'POST']) ?>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <?= form_input(['name' => 'name', 'value' => $input->name,'class' => 'form-control', 'required' => true, 'autofocus' => true]); ?>
                            <?= form_error('name'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'required' => true, 'placeholder' => 'Masukkan alamat email']) ?>
                            <?= form_error('email') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <?= form_password('password', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Masukkan password minimal 8 karakter']); ?>
                            <?= form_error('password') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasi Password</label>
                            <?= form_password('password_confirmation', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Masukkan password yang sama']); ?>
                            <?= form_error('password_confirmation') ?>
                        </div>
                        <button class="btn btn-primary" type="submit">Register</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>