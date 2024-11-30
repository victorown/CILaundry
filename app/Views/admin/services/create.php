<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('title'); ?>
<title><?= $title; ?></title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- App hero header starts -->
<div class="app-hero-header">
    <h1 class="fw-light"><?= $subTitle; ?></h1>

    <!-- <a href="/admin/service" class="btn btn-primary">Back</a> -->
</div>
<!-- App Hero header ends -->

<div class="app-body">
    <?php if (session()->get('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->get('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <form action="/admin/service/store" method="post">
        <div class="row">
            <div class="col-xxl-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Create Service</h5>
                    </div>
                    <div class="card-body">
                        <!-- Row start -->
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Service Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter service name" />
                                    <span class="text-danger"><?= session('errors.name') ?></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Enter service price" />
                                    <span class="text-danger"><?= session('errors.price') ?></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea type="text" name="description" class="form-control" placeholder="Enter service description"></textarea>
                                    <span class="text-danger"><?= session('errors.description') ?></span>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>
                    <div class="card-footer">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="/admin/service" class="btn btn-outline-secondary">
                                Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>