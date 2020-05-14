<main class="container-custom">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php foreach($content as $row) : ?>
                <div class="col-md-4 mb-3">
                    <div class="card product-list">
                        <div class="card-img-top">
                        <a href="<?= base_url("product/detail/$row->slug") ?>" class="stretched-link"><img src="<?= base_url("images/product/$row->image") ?>" alt="asd"></a>
                        </div>
                        <div class="card-body">
                            <p class="title"><?= $row->product_title ?></p>
                            <p class="price">Rp <?= number_format($row->price, 0, ',', '.') ?></p>
                        </div>
                    </div>  
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>