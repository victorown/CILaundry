<?php helper('MenuHelper'); ?>

<nav id="sidebar" class="sidebar-wrapper">

    <!-- App brand starts -->
    <div class="app-brand px-3 py-3 d-flex align-items-center">
        <a href="index.html">
            <img src="/assets/admin/images/logo.svg" class="logo" alt="Bootstrap Gallery" />
        </a>
    </div>
    <!-- App brand ends -->

    <!-- Sidebar menu starts -->
    <div class="sidebarMenuScroll">
        <ul class="sidebar-menu">
            <li class="<?= isActive('/admin/dashboard') ?>">
                <a href="/admin/dashboard">
                    <i class="bi bi-pie-chart"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="<?= isActive('/admin/service') ?>">
                <a href="/admin/service">
                    <i class="bi bi-box"></i>
                    <span class="menu-text">Services</span>
                </a>
            </li>
            <li class="<?= isActive('/admin/orders') ?>">
                <a href="/admin/orders">
                    <i class="bi bi-box"></i>
                    <span class="menu-text">Orders</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Sidebar menu ends -->

</nav>