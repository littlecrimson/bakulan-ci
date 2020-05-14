<div class="col-md-3 hide">
    <div class="card-custom">
        <ul class="list-group">
            <strong>Kategori</strong>

            <?php foreach($category as $row) : ?>
                <li class="list-group-item"><a href="<?= base_url("product/kategori/$row->slug") ?>"><?= ucwords($row->title) ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>