<main class="container">
    <div class="row">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-body">
                <?= form_open($form_action,['method' => 'POST']) ?>
                    <div class="form-group">
                        <label for="">Nama pemilik rekening</label>
                        <?= form_input(['name' => 'name', 'value' => $input->name,'class' => 'form-control', 'required' => true, 'autofocus' => true]); ?>
                        <?= form_error('name') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Nama bank</label>
                        <?= form_input(['name' => 'bank', 'value' => $input->bank,'class' => 'form-control', 'required' => true]); ?>
                        <?= form_error('bank') ?>
                    </div>
                    <div class="form-group">
                        <label for="">No rekening</label>
                        <?= form_input(['name' => 'norek', 'value' => $input->norek,'class' => 'form-control', 'required' => true]); ?>
                        <?= form_error('norek') ?>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>