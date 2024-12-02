<?= $this->extend('customers/layout/main'); ?>

<?= $this->section('title'); ?>
<title><?= $title; ?></title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h1 class="module-title font-alt">Checkout</h1>
                </div>
            </div>
            <hr class="divider-w pt-20">
            <?php if (session()->get('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong>
                    <?= session()->get('error'); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Success!</strong> <?= session()->get('success'); ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($orders)): ?>
                <?php foreach ($orders as $order): ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if (!empty($order->items)): ?>
                                <table class="table table-striped table-border checkout-table">
                                    <tbody>
                                        <tr>
                                            <th>Service</th>
                                            <th>Quantity</th>
                                            <th class="hidden-xs">Price</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                        <?php foreach ($order->items as $o): ?>
                                            <tr>
                                                <td>
                                                    <h5 class="product-title font-alt"><?= $o->service_name; ?></h5>
                                                </td>
                                                <td>
                                                    <h5 class="product-title font-alt"><?= $o->quantity; ?></h5>
                                                </td>
                                                <td>
                                                    <h5 class="product-title font-alt">Rp. <?= number_format($o->service_price, 0, ',', '.'); ?></h5>
                                                </td>
                                                <td>
                                                    <h5 class="product-title font-alt">Rp. <?= number_format($o->price, 0, ',', '.'); ?></h5>
                                                </td>
                                                <td class="pr-remove"><a href="/pelanggan/orders/destroy/<?= $o->item_id; ?>" title="Remove"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                    <hr class="divider-w">
                    <div class="row mt-70 pb-4">
                        <div class="col-sm-5 col-sm-offset-7">
                            <div class="shop-Cart-totalbox">
                                <h4 class="font-alt">Cart Totals</h4>
                                <table class="table table-striped table-border checkout-table">
                                    <tbody>
                                        <tr>
                                            <th>Date :</th>
                                            <td><?= $order->order_date; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status :</th>
                                            <td><?= $order->status; ?></td>
                                        </tr>
                                        <tr class="shop-Cart-totalprice">
                                            <th>Total :</th>
                                            <td>Rp. <?= number_format($order->total_amount, 0, ',', '.'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-lg btn-block btn-round btn-d" id="proceedCheckoutBtn">Proceed to Checkout</button>
                            </div>
                        </div>
                    </div>
                    <hr class="divider-w" style="margin: 20px 0">
                    <div id="additionalInfoForm" class="pt-4" style="display: none;">
                        <h4 class="font-alt">Additional Order Details</h4>
                        <form action="/pelanggan/payment" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="pickup_address" value="<?= $order->id; ?>" class="form-control" placeholder="Enter pickup address" hidden>
                            <div class="form-group">
                                <label for="pickup_address">Pickup Address</label>
                                <input type="text" name="pickup_address" id="pickup_address" class="form-control" placeholder="Enter pickup address" required>
                            </div>
                            <div class="form-group">
                                <label for="delivery_address">Delivery Address</label>
                                <input type="text" name="delivery_address" id="delivery_address" class="form-control" placeholder="Enter delivery address" required>
                            </div>
                            <div class="form-group">
                                <label for="pickup_time">Pickup Time</label>
                                <input type="datetime-local" name="pickup_time" id="pickup_time" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="pickup_time">Delivery Time</label>
                                <input type="datetime-local" name="delivery_time" id="delivery_time" class="form-control" required>
                            </div>

                            <h4 class="font-alt">Payment Details</h4>
                            <div class="form-group">
                                <label for="payment_method">Payment Method</label>
                                <select name="payment_method" id="payment_method" class="form-control">
                                    <option value="transfer">Bank Transfer</option>
                                    <option value="cash">Bayar Langsung</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="receipt_img">Receipt Image</label>
                                <input type="file" name="receipt_img" id="receipt_img" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-lg btn-block btn-round btn-d">Submit Order</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
    <?= $this->include('customers/layout/footer'); ?>
</div>
<script>
    document.getElementById('proceedCheckoutBtn').addEventListener('click', function() {
        document.getElementById('additionalInfoForm').style.display = 'block';
    });
</script>
<?= $this->endSection(); ?>