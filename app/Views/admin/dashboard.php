<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('title'); ?>
<title><?= $title; ?></title>
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>

<!-- App hero header starts -->
<div class="app-hero-header">
    <h5 class="fw-light"><?= $subTitle; ?></h5>
    <h3 class="fw-light mb-5">Have a good day :)</h3>
</div>
<!-- App Hero header ends -->

<!-- App body starts -->
<div class="app-body">
    <!-- Row starts -->
    <div class="row">
        <div class="col-xl-4 col-sm-6 col-12">
            <div class="card shadow mb-4 p-2 rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-box lg shadow-solid-rb border border-dark p-4 rounded-4 me-3">
                        <i class="bi bi-pie-chart fs-1 lh-1 text-primary"></i>
                    </div>
                    <div class="m-0">
                        <h5 class="fw-light mb-1">Services</h5>
                        <h2 class="m-0 text-primary"><?= $total_services; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12">
            <div class="card shadow mb-4 p-2 rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-box lg shadow-solid-rb border border-dark p-4 rounded-4 me-3">
                        <i class="bi bi-sticky fs-1 lh-1 text-primary"></i>
                    </div>
                    <div class="m-0">
                        <h5 class="fw-light mb-1">Orders</h5>
                        <h2 class="m-0 text-primary"><?= $total_orders; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12">
            <div class="card shadow mb-4 p-2 rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-box lg shadow-solid-rb border border-dark p-4 rounded-4 me-3">
                        <i class="bi bi-emoji-smile fs-1 lh-1 text-primary"></i>
                    </div>
                    <div class="m-0">
                        <h5 class="fw-light mb-1">Customers</h5>
                        <h2 class="m-0 text-primary"><?= $total_customers; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->

    <!-- Row start -->
    <div class="row">
        <div class="col-xxl-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="card-title">Order History</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customers Name</th>
                                    <th>Order Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $i => $o): ?>
                                    <tr>
                                        <td><?= $i + 1; ?></td>
                                        <td><?= $o->name; ?></td>
                                        <td><?= $o->order_date; ?></td>
                                        <td>Rp. <?= number_format($o->total_amount, 0, ',', '.'); ?></td>
                                        <td>
                                            <?php if ($o->status != 'completed'): ?>
                                                <span class="badge bg-warning"><?= $o->status; ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-success"><?= $o->status; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="/admin/orders/detail/<?= $o->id; ?>" class="btn btn-primary">Detail</a>
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
    <!-- Row end -->

</div>
<!-- App body ends -->

<?= $this->endSection(); ?>