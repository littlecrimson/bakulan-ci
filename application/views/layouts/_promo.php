<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php if($banner_promo) : ?>
        <?php foreach($banner_promo as $row => $value) : ?>
            <div class="carousel-item <?= ($row === 0) ? 'active' : '' ?>">
            <img src="<?= base_url("images/promo/$value->image") ?>" class="d-block w-100" alt="...">
            </div>
        <?php endforeach ?>
    <?php else : ?>
      <div class="carousel-item active">
        <img src="https://placehold.co/1000x500" class="d-block w-100" alt="...">
      </div>
    <?php endif ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
