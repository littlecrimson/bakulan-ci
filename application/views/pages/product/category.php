<main class="container-custom">
    <div class="row">
        <!-- <div class="col-md-12 mb-3">
            <div class="banner banner-promo hide kategori">
                <img src="https://placehold.co/2000x500" alt="">
            </div>
        </div> -->
        <div class="col-md-12">
            <div class="row">
                <?php if($content === ''): ?>
                    <div class="col md-12">
                        <p>Maaf produk di dalam kategori ini belum tersedia</p>
                    </div>
                <?php else: ?>
                    <?php foreach($content as $row) : ?>
                    <div class="col-md-4 mb-3">
                        <div class="card product-list">
                            <div class="card-img-top">
                            <a href="<?= base_url("product/detail/$row->product_slug") ?>" class="stretched-link"><img src="<?= base_url("images/product/$row->image") ?>" alt=""></a>
                            </div>
                            <div class="card-body">
                                <p class="title"><?= $row->product_title ?></p>
                                <p class="price">Rp <?= number_format($row->price, 0, ',', '.') ?></p>
                            </div>
                        </div>  
                    </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</main>