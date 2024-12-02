<?= $this->extend('customers/layout/main'); ?>

<?= $this->section('title'); ?>
<title><?= $title; ?></title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="main">
    <section class="module bg-dark-60 shop-page-header" data-background="/assets/customer/images/shop/product-page-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Our Laundry Services</h2>
                    <div class="module-subtitle font-serif">A refreshing calm has taken over my entire being, just like the crispness of freshly cleaned clothes that I cherish with all my heart.</div>
                </div>
            </div>
        </div>
    </section>
    <hr class="divider-w">
    <section class="module-small">
        <div class="container">
            <div class="row multi-columns-row">
                <?php foreach ($services as $s): ?>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="shop-item">
                            <div class="shop-item-image"><img src="/assets/customer/images/shop/product-7.jpg" alt="Accessories Pack" />
                                <div class="shop-item-detail"><a href="/pelanggan/product/detail/<?= $s['id']; ?>" class="btn btn-round btn-b"><span class="icon-basket">Add To Cart</span></a></div>
                            </div>
                            <h4 class="shop-item-title font-alt"><a href="#"><?= $s['name']; ?></a></h4>Rp. <?= number_format($s['price'], 0, ',', '.'); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- <div class="row">
                <div class="col-sm-12">
                    <div class="pagination font-alt"><a href="#"><i class="fa fa-angle-left"></i></a><a class="active" href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#"><i class="fa fa-angle-right"></i></a></div>
                </div>
            </div> -->
        </div>
    </section>
    <?= $this->include('customers/layout/footer'); ?>
</div>

<?= $this->endSection(); ?>