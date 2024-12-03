<nav class="navbar navbar-custom navbar-fixed-top " role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="/">CIL</a>
        </div>
        <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">Home</a></li>
                <li><a href="/pelanggan/product">Services</a></li>
                <li><a href="/pelanggan/cart">Cart</a></li>

                <li class="dropdown"><a class="dropdown-toggle" href="documentation.html" data-toggle="dropdown">User</a>
                    <ul class="dropdown-menu">
                        <?php if (session()->get('logged_in')): ?>
                            <!-- <li><a href="#">Profile</a></li> -->
                            <li><a href="/logout">Logout</a></li>
                        <?php else: ?>
                            <li><a href="/login">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>