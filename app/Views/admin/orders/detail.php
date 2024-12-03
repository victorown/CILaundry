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
    <form action="/admin/orders/detail/<?= $order['id']; ?>" method="post">
        <div class="row">
            <div class="col-xxl-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Customer Data</h5>
                    </div>
                    <div class="card-body">
                        <!-- Row start -->
                        <div class="row">
                            <div class="col-lg-6 col-sm-4 col-12">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <li class="list-group-item"><b>Name:</b> <?= $order['name']; ?></li>
                                            <li class="list-group-item"><b>Phone:</b> <?= $order['phone'];; ?></li>
                                            <li class="list-group-item"><b>Email:</b> <?= $order['email']; ?></li>
                                            <li class="list-group-item"><b>Order Date:</b> <?= $order['order_date']; ?></li>
                                            <?php if ($order['status'] != 'completed'): ?>
                                                <li class="list-group-item"><b>Order Status:</b> <span class="badge bg-warning"><?= $order['status']; ?></span></li>
                                            <?php else: ?>
                                                <li class="list-group-item"><b>Order Status:</b> <span class="badge bg-success"><?= $order['status']; ?></span></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-4 col-12">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <li class="list-group-item"><b>Pickup Address:</b> <?= $order['pickup_address']; ?></li>
                                            <li class="list-group-item"><b>Delivery Address:</b> <?= $order['delivery_address']; ?></li>
                                            <li class="list-group-item"><b>Pickup Time:</b> <?= $order['pickup_time']; ?></li>
                                            <li class="list-group-item"><b>Delivery Time:</b> <?= $order['delivery_time']; ?></li>
                                            <?php if ($order['payment_status'] != 'paid'): ?>
                                                <li class="list-group-item"><b>Payment Status:</b> <span class="badge bg-warning"><?= $order['payment_status']; ?></span></li>
                                            <?php else: ?>
                                                <li class="list-group-item"><b>Payment Status:</b> <span class="badge bg-success"><?= $order['payment_status']; ?></span></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>
                    <div class="card-footer">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="/admin/orders" class="btn btn-outline-secondary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Order Items</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Service Name</th>
                                        <th>Service Price</th>
                                        <th>Kg / Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $index => $i): ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td><?= $i['name']; ?></td>
                                            <td>Rp. <?= number_format($i['service_price'], 0, ',', '.'); ?></td>
                                            <td><?= $i['quantity']; ?></td>
                                            <td>Rp. <?= number_format($i['price'], 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Payment Confirmation</h5>
                    </div>
                    <div class="row g-0">
                        <div class="col-sm-6 d-flex justify-content-center">
                            <?php if (!empty($payment['receipt_img'])): ?>
                                <img src="/<?= $payment['receipt_img']; ?>" class="img-fluid rounded-start w-50" alt="Bootstrap Gallery">
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="card-body">
                                <?php if ($payment['payment_status'] != 'confirmed'): ?>
                                    <h5 class="card-title mb-3 text-danger"><?= $payment['payment_status']; ?></h5>
                                <?php else: ?>
                                    <h5 class="card-title mb-3 text-success"><?= $payment['payment_status']; ?></h5>
                                <?php endif; ?>
                                <p class="m-0 fs-5 mb-3">
                                    <i class="fs-3 bi bi-calendar me-4"></i><?= $payment['payment_date']; ?>
                                </p>
                                <p class="m-0 fs-5 mb-3"><i class="fs-3 bi bi-cash-coin me-4"></i><?= $payment['payment_method']; ?></p>
                                <p class="m-0 fs-5 mb-5"><i class="fs-3 bi bi-cash-coin me-4"></i>Rp. <?= number_format($order['total_amount'], 0, ',', '.'); ?></p>

                                <?php if ($payment['payment_status'] != 'confirmed'): ?>
                                    <div class="row" style="height: 100px;">
                                        <div class="col-sm-6 align-bottom">
                                            <a href="/admin/orders/reject/<?= $order['id']; ?>" class="w-auto btn btn-danger btn-lg">Reject</a>
                                        </div>
                                        <div class="col-sm-6 align-bottom">
                                            <a href="/admin/orders/approve/<?= $order['id']; ?>" class="w-auto btn btn-success btn-lg">Confirm</a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>