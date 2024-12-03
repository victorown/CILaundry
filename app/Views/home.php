<?= $this->extend('customers/layout/main'); ?>

<?= $this->section('title'); ?>
<title><?= $title; ?></title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section class="home-section home-fade home-full-height" id="home">
    <div class="hero-slider">
        <ul class="slides">
            <li class="bg-dark-30 bg-dark shop-page-header" style="background-image:url(/assets/customer/images/shop/slider1.png);">
                <div class="titan-caption">
                    <div class="caption-content">
                        <div class="font-alt mb-30 titan-title-size-1">This is CILaundry</div>
                        <div class="font-alt mb-30 titan-title-size-4"> Winter 2024 </div>
                        <div class="font-alt mb-40 titan-title-size-1">Your online laundry service</div><a class="section-scroll btn btn-border-w btn-round" href="#latest">Learn More</a>
                    </div>
                </div>
            </li>
            <li class="bg-dark-30 bg-dark shop-page-header" style="background-image:url(/assets/customer/images/shop/slider3.png);">
                <div class="titan-caption">
                    <div class="caption-content">
                        <div class="font-alt mb-30 titan-title-size-1"> This is CILaundry</div>
                        <div class="font-alt mb-40 titan-title-size-4">Exclusive services</div><a class="section-scroll btn btn-border-w btn-round" href="#latest">Learn More</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<div class="main">
    <section class="module-small">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Our Services</h2>
                </div>
            </div>
            <div class="row multi-columns-row">
                <?php foreach ($services as $i => $s): ?>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="shop-item">
                            <div class="shop-item-image"><img src="/assets/customer/images/shop/product-7.jpg" alt="Accessories Pack" />
                                <div class="shop-item-detail"><a href="/pelanggan/product/detail/<?= $s['id']; ?>" class="btn btn-round btn-b"><span class="icon-basket">Order Now</span></a></div>
                            </div>
                            <h4 class="shop-item-title font-alt"><a href="#"><?= $s['name']; ?></a></h4>Rp. <?= number_format($s['price'], 0, ',', '.'); ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="row mt-30">
                <div class="col-sm-12 align-center"><a class="btn btn-b btn-round" href="/pelanggan/product">See all products</a></div>
            </div>
        </div>
    </section>
    <section class="module module-video bg-dark-30" data-background="">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt mb-0">Fresh Clothes, Zero Hassle.</h2>
                </div>
            </div>
        </div>
        <div class="video-player" data-property="{videoURL:'https://www.youtube.com/watch?v=EMy5krGcoOU', containment:'.module-video', startAt:0, mute:true, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:25}"></div>
    </section>
    <!-- <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Exclusive services</h2>
                    <div class="module-subtitle font-serif">Our exclusive service ensures your laundry is handled with the utmost care, offering premium cleaning, fast delivery, and a hassle-free experience for a wardrobe that always feels brand new.</div>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel text-center" data-items="5" data-pagination="false" data-navigation="false">
                    <div class="owl-item">
                        <div class="col-sm-12">
                            <div class="ex-product"><a href="#"><img src="/assets/customer/images/shop/product-1.jpg" alt="Leather belt" /></a>
                                <h4 class="shop-item-title font-alt"><a href="#">Leather belt</a></h4>£12.00
                            </div>
                        </div>
                    </div>
                    <div class="owl-item">
                        <div class="col-sm-12">
                            <div class="ex-product"><a href="#"><img src="/assets/customer/images/shop/product-2.jpg" alt="Derby shoes" /></a>
                                <h4 class="shop-item-title font-alt"><a href="#">Derby shoes</a></h4>£54.00
                            </div>
                        </div>
                    </div>
                    <div class="owl-item">
                        <div class="col-sm-12">
                            <div class="ex-product"><a href="#"><img src="/assets/customer/images/shop/product-3.jpg" alt="Leather belt" /></a>
                                <h4 class="shop-item-title font-alt"><a href="#">Leather belt</a></h4>£19.00
                            </div>
                        </div>
                    </div>
                    <div class="owl-item">
                        <div class="col-sm-12">
                            <div class="ex-product"><a href="#"><img src="/assets/customer/images/shop/product-4.jpg" alt="Leather belt" /></a>
                                <h4 class="shop-item-title font-alt"><a href="#">Leather belt</a></h4>£14.00
                            </div>
                        </div>
                    </div>
                    <div class="owl-item">
                        <div class="col-sm-12">
                            <div class="ex-product"><a href="#"><img src="/assets/customer/images/shop/product-5.jpg" alt="Chelsea boots" /></a>
                                <h4 class="shop-item-title font-alt"><a href="#">Chelsea boots</a></h4>£44.00
                            </div>
                        </div>
                    </div>
                    <div class="owl-item">
                        <div class="col-sm-12">
                            <div class="ex-product"><a href="#"><img src="/assets/customer/images/shop/product-6.jpg" alt="Leather belt" /></a>
                                <h4 class="shop-item-title font-alt"><a href="#">Leather belt</a></h4>£19.00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <?= $this->include('customers/layout/footer'); ?>
</div>

<?= $this->endSection(); ?>