<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= $this->renderSection('title'); ?>
    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="/assets/admin/images/favicon.svg" />

    <!-- *************
			************ CSS Files *************
		************* -->
    <link rel="stylesheet" href="/assets/admin/fonts/bootstrap/bootstrap-icons.css" />
    <link rel="stylesheet" href="/assets/admin/css/main.min.css" />

    <!-- *************
			************ Vendor Css Files *************
		************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="/assets/admin/vendorss/overlay-scroll/OverlayScrollbars.min.css" />
  </head>

  <body>
    <!-- Page wrapper start -->
    <div class="page-wrapper">

      <!-- Main container start -->
      <div class="main-container">

        <!-- Sidebar wrapper start -->
        <?= $this->include('admin/layout/sidebar'); ?>
        <!-- Sidebar wrapper end -->

        <!-- App container starts -->
        <div class="app-container">

          <!-- App header starts -->
          <?= $this->include('admin/layout/navbar'); ?>
          <!-- App header ends -->

          <?= $this->renderSection('content'); ?>

          <!-- App footer start -->
          <div class="app-footer">
            <span>© Bootstrap Gallery 2024</span>
          </div>
          <!-- App footer end -->

        </div>
        <!-- App container ends -->

      </div>
      <!-- Main container end -->

    </div>
    <!-- Page wrapper end -->

    <!-- *************
			************ JavaScript Files *************
		************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="/assets/admin/js/jquery.min.js"></script>
    <script src="/assets/admin/js/bootstrap.bundle.min.js"></script>

    <!-- *************
			************ Vendor Js Files *************
		************* -->

    <!-- Overlay Scroll JS -->
    <script src="/assets/admin/vendorss/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
    <script src="/assets/admin/vendorss/overlay-scroll/custom-scrollbar.js"></script>

    <!-- Apex Charts -->
    <script src="/assets/admin/vendorss/apex/apexcharts.min.js"></script>
    <script src="/assets/admin/vendorss/apex/custom/dash1/sales.js"></script>
    <script src="/assets/admin/vendorss/apex/custom/dash1/sparkline.js"></script>
    <script src="/assets/admin/vendorss/apex/custom/dash1/sparkline2.js"></script>

    <!-- Rating -->
    <script src="/assets/admin/vendorss/rating/raty.js"></script>
    <script src="/assets/admin/vendorss/rating/raty-custom.js"></script>

    <!-- Custom JS files -->
    <script src="/assets/admin/js/custom.js"></script>
  </body>

</html>