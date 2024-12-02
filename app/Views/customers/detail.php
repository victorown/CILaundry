<?= $this->extend('customers/layout/main'); ?>

<?= $this->section('title'); ?>
<title><?= $title; ?></title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="main">
    <section class="module">
        <div class="container">
            <div class="row">
                <?php if (session()->get('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error!</strong> <?= session()->get('error'); ?>
                    </div>
                <?php endif; ?>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="product-title font-alt"><?= $service['name']; ?></h1>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-sm-12"><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star-off"></i></span><a class="open-tab section-scroll" href="#reviews">-2customer reviews</a>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-sm-12">
                            <div class="price font-alt"><span class="amount">Rp. <?= number_format($service['price'], 0, ',', '.'); ?></span></div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-sm-12">
                            <div class="description">
                                <p><?= $service['description']; ?></p>
                            </div>
                        </div>
                    </div>
                    <form action="/pelanggan/orders/<?= $service['id']; ?>" method="post">
                        <div class="row mb-20">
                            <div class="col-sm-4 mb-sm-20">
                                <input class="form-control input-lg" type="number" name="quantity" value="1" max="40" min="1" required="required" />
                            </div>
                            <div class="col-sm-8"><button type="submit" class="btn btn-lg btn-block btn-round btn-b">Add To Cart</button></div>
                        </div>
                    </form>
                    <div class="row mb-20">
                        <div class="col-sm-12">
                            <div class="product_meta"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <?= $this->include('customers/layout/footer'); ?>
</div>

<?= $this->endSection(); ?>