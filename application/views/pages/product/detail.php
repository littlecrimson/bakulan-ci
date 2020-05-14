<main class="container-custom">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="banner arrival mr-2">
                        <img src="<?= base_url("/images/product/$content->image") ?>" alt="" class="mr-4" style="width: 400px">
                    </div>
                </div>
                <div class="col-md-8">
                    <p class="h4"><?= $content->title ?></p>
                    <a href=" <?= base_url("product/kategori/".$similiar[0]->category_slug) ?>" class="badge badge-primary mb-2 text-white p-2"><i class="fas fa-tags"></i> <?= $similiar[0]->category_title ?></a>
                    <p><?= $content->description ?></p>
                    <p class="h2">Rp <?= number_format($content->price, 0, ',', '.') ?></p>
                    <span style="display: none" id="real-price"><?= $content->price ?></span>
                    <button class="btn btn-lg" id="btn-custom-1" data-toggle="modal" data-target="#buyModal"  data-title="<?= $content->title ?>">
                        <span class="iconify" data-inline="false" data-icon="icons8:buy" style="text-align: center; font-size: 30px;"></span> BUY NOW
                    </button>

                    <button class="btn btn-lg" id="btn-custom-2" data-toggle="modal" data-target="#cartModal"  data-title="<?= $content->title ?>">
                        <span class="iconify" data-inline="false" data-icon="ant-design:shopping-cart-outlined" style="text-align: center; font-size: 25px;"></span> ADD TO CART
                    </button>
                </div>
            </div>
            <hr>
            <?php $this->load->view('layouts/_similiar'); ?>
        </div>
    </div>
</main>

<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModal" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah ke keranjang belanja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('cart/add') ?>" method="POST" class="formCart">
          <input type="hidden" name="id" value="<?= $content->id ?>">
          <div class="form-group">
            <label for="product-name" class="col-form-label">Nama produk</label>
            <input type="text" class="form-control product-title" readonly value="#">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Qty </label>
            <input type="number" name="qty" class="form-control" value="1" required> 
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Subtotal </label>
            <input type="text" class="form-control subtotal" value="1" readonly> 
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" type="submit" id="submit">Tambah</button>
        <?= form_close() ?>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModal" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Beli Sekarang ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('cart/add') ?>" method="POST" class="formCart">
          <input type="hidden" name="id" value="<?= $content->id ?>">
          <div class="form-group">
            <label for="product-name" class="col-form-label">Nama produk</label>
            <input type="text" class="form-control product-title" readonly value="#">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Qty </label>
            <input type="number" name="qty" class="form-control" value="1" readonly> 
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Subtotal </label>
            <input type="text" class="form-control subtotal" value="1" readonly> 
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" type="submit" id="beli">Beli</button>
        <?= form_close() ?>
      </div>
    </div>
  </div>
</div>