<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card" style="margin-top: 5rem;">
                <div class="card-header">
                    <span>Form Kategori</span>
                </div>
                <div class="card-body">
                    <?= form_open($form_action, ['method' => 'POST']) ?>
                        <?= isset($input->id) ? form_hidden('id',$input->id) : ''?>
                        <div class="form-group">
                            <label for="nama">Kategori</label>
                            <!-- <input type="text" name="nama" id="title" class="form-control" onkeyup="createSlug()" required autofocus>
                             -->
                            <?= form_input('title',$input->title,['class'=>'form-control','id'=>'title','onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>
                            <!-- <small class="form-text text-danger">Kategori harus diisi</small> -->
                            <?= form_error('title') ?>
                        </div>

                        <div class="form-group">
                            <label for="nama">Slug</label>
                            <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true]) ?>
                            <!-- <input type="text" name="nama" id="slug" class="form-control" required >
                            <small class="form-text text-danger">Nama harus diisi</small> -->
                            <?= form_error('slug') ?>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
  </main>