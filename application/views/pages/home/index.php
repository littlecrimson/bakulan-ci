<main class="container-custom">
    <div class="row mb-3">
        <?php $this->load->view('layouts/_categoryMenu'); ?>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 hide">
                    <div class="banner banner-promo">
                        <?php $this->load->view('layouts/_promo'); ?>
                    </div>
                </div>
                <!-- <div class="col-md-12 arrival-container">
                    <h1 class="h3 mt-4" id="title-arrival">New Arival</h1>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="banner arrival">
                                <img src="https://placehold.co/300x300" alt="" class="float-left mr-4">
                                <p class="h4 mt-4">Product name XXIV</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde quaerat veritatis similique maxime quisquam asperiores consequuntur odit provident dolores. Molestias, magni. Voluptate, provident repellat illo nostrum rerum voluptatum unde deserunt?
                                Libero quasi nisi consequatur dolorem voluptates, iusto perferendis. Saepe ipsa voluptates non eos ullam veritatis, id iusto sapiente dicta, voluptatum, explicabo alias minus rerum esse iste molestias fuga! Autem, unde!</p>
                                <button class="btn btn-lg" id="btn-custom">
                                    BUY NOW
                                </button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <hr class="hr-mobile">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php foreach($content as $row) : ?>
                <div class="col-md-4 mb-3">
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
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>