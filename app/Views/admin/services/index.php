<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('title'); ?>
<title><?= $title; ?></title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- App hero header starts -->
<div class="app-hero-header">
    <h2 class="fw-light"><?= $subTitle; ?></h2>
    <a href="/admin/service/create" class="btn btn-primary">Add Service</a>
</div>
<!-- App Hero header ends -->

<!-- App body starts -->
<div class="app-body">

    <?php if (session()->get('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->get('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->get('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->get('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-xxl-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="card-title">Services</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Services Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$services): ?>
                                    <tr>
                                        <th colspan="5" class="text-center p-4">
                                            <h3>There is no services yet!</h3>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                                <?php foreach ($services as $i => $s): ?>
                                    <tr>
                                        <td><?= $i + 1; ?></td>
                                        <td><?= $s['name']; ?></td>
                                        <td>Rp. <?= $s['price']; ?></td>
                                        <td><?= $s['description']; ?></td>
                                        <td>
                                            <a href="/admin/service/edit/<?= $s['id']; ?>" class="btn btn-warning">Edit</a>
                                            <a href="/admin/service/destroy/<?= $s['id']; ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>