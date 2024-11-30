<?= $this->extend('auth/layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10 col-sm-12 col-12">
            <form action="register" method="post" class="my-5">
                <div class="border border-dark rounded-2 p-4 mt-5">
                    <div class="login-form">
                        <a href="#" class="mb-4 d-flex justify-content-center">
                            <img src="assets/admin/images/logo.svg" class="img-fluid login-logo" alt="Mercury Admin" />
                        </a>
                        <h5 class="fw-light mb-5 text-center">Create your admin account.</h5>
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Your Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Enter your username" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Your Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter password" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Re-enter password" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Your Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name" />
                                </div>
                            </div>
                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Your Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Your Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Your Address</label>
                                    <textarea name="address" class="form-control" placeholder="Enter your address"></textarea>
                                </div>
                                <div class="form-check" style="margin-top: 30px;">
                                    <input class="form-check-input" type="checkbox" value="" id="termsConditions" />
                                    <label class="form-check-label" for="termsConditions">I agree to the terms and conditions</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid py-3 mt-4">
                            <button type="submit" class="btn btn-lg btn-primary">
                                Signup
                            </button>
                        </div>
                        <div class="text-center pt-4">
                            <span>Already have an account?</span>
                            <a href="login" class="text-blue text-decoration-underline ms-2">
                                Login</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>