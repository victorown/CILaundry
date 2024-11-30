<?= $this->extend('auth/layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-sm-6 col-12">
            <form action="/login" method="POST" class="my-5">
                <div class="border border-dark rounded-2 p-4 mt-5">
                    <div class="login-form">
                        <a href="index.html" class="mb-4 d-flex">
                            <img src="assets/admin/images/logo.svg" class="img-fluid login-logo" alt="Mercury Admin" />
                        </a>
                        <h5 class="fw-light mb-5">Sign in to access dashboard.</h5>
                        <div class="mb-3">
                            <label class="form-label">Your Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter your username" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Your Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" />
                        </div>
                        <!-- <div class="d-flex align-items-center justify-content-between">
                            <div class="form-check m-0">
                                <input class="form-check-input" type="checkbox" value="" id="rememberPassword" />
                                <label class="form-check-label" for="rememberPassword">Remember</label>
                            </div>
                            <a href="forgot-password.html" class="text-blue text-decoration-underline">Lost password?</a>
                        </div> -->
                        <div class="d-grid py-3 mt-4">
                            <button type="submit" class="btn btn-lg btn-primary">
                                Login
                            </button>
                        </div>
                        
                        <div class="text-center pt-4">
                            <span>Not registered?</span>
                            <a href="/register" class="text-blue text-decoration-underline ms-2">
                                SignUp</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>