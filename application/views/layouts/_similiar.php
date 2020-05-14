<p class="h5">Produk sejenis : </p>
<div class="row">
    <?php foreach($similiar as $row) : ?>
    <?php if($row->id === $content->id) : continue ?>
    <?php else : ?>
    <div class="col-md-3 mb-3">
        <div class="card product-list">
            <div class="card-img-top">
                <a href="<?= base_url("product/detail/$row->slug") ?>" class="stretched-link"><img src="<?= base_url("images/product/$row->image") ?>"></a>
            </div>
            <div class="card-body">
                <p class="title"><?= $row->product_title ?></p>
                <p class="price">Rp <?= number_format($row->price, 0, ',', '.') ?></p>
            </div>
        </div>
    </div>
    <?php endif ?>
    <?php endforeach ?>
</div>