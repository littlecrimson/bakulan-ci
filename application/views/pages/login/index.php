<main class="container-center">
    <div class="row">
        <img src="assets/images/drawkit2.svg" class="drawkit">
        <img src="assets/images/plant-3.svg" class="plant">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">LOGIN</h1>
                </div>
                <div class="col-md-12">
                    <?= form_open('login',['method' => 'POST']) ?>
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
                        <button class="btn btn-primary" type="submit">Login</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>