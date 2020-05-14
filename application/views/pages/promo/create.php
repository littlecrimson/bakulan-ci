<main class="container-custom">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4">
                <div class="card-img-top">
                    <img src="<?= ($input->image) ? base_url("images/promo/$input->image") : 'http://placehold.co/1000x200' ?>" id="img_show" style="display: inherit; width: 100%">
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <input type="file" name="image" id="img_input">
                    <a href="#" class="btn btn-block" onclick="document.getElementById('img_input').click();"><i class="fas fa-edit"></i> Upload</a>
                    <?= form_error('image') ?>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-primary">Submit</button>
                    <?= form_close() ?>
                </div>
            </div>
            <small>**ukuran proporsional untuk banner adalah 1000x200</small>
            <br>
            <small>lebih dari itu maka akan dipaksa untuk diperkecil</small>
        </div>
    </div>
</main>