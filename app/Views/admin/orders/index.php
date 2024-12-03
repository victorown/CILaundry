<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('title'); ?>
<title><?= $title; ?></title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- App hero header starts -->
<div class="app-hero-header">
    <h2 class="fw-light"><?= $subTitle; ?></h2>
    <!-- <a href="/admin/service/create" class="btn btn-primary">Add Service</a> -->
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
                    <h5 class="card-title">Order History</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Service Name</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($orders)): ?>
                                    <tr>
                                        <th colspan="7" class="text-center p-4">
                                            <h3>There is no orders yet!</h3>
                                        </th>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($orders as $i => $order): ?>
                                        <tr>
                                            <td rowspan="<?= count($order['items']); ?>"><?= $i + 1; ?></td>
                                            <td rowspan="<?= count($order['items']); ?>"><?= $order['user_name']; ?></td>
                                            <?php foreach ($order['items'] as $j => $item): ?>
                                                <?php if ($j > 0): ?>
                                        <tr><?php endif; ?>
                                        <td><?= $item['service_name']; ?></td>
                                        <td><?= $item['item_quantity']; ?></td>
                                        <?php if ($j === 0): ?>
                                            <td rowspan="<?= count($order['items']); ?>">Rp. <?= number_format($order['total_amount'], 0, ',', '.'); ?></td>
                                            <?php if ($order['status'] != 'completed'): ?>
                                                <td rowspan="<?= count($order['items']); ?>"><span class="badge bg-warning"><?= ucfirst($order['status']); ?></span></td>
                                            <?php else: ?>
                                                <td rowspan="<?= count($order['items']); ?>"><span class="badge bg-success"><?= ucfirst($order['status']); ?></span></td>
                                            <?php endif; ?>
                                            <td rowspan="<?= count($order['items']); ?>">
                                                <a href="/admin/orders/detail/<?= $order['order_id']; ?>" class="btn btn-info">Detail</a>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($j > 0): ?>
                                        </tr><?php endif; ?>
                                <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>