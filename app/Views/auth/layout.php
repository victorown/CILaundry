<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?= $this->renderSection('title'); ?>
	<!-- <title>Bootstrap Gallery - Mercury Admin Template</title> -->

	<!-- Meta -->
	<meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
	<meta name="author" content="Bootstrap Gallery" />
	<link rel="canonical" href="https://www.bootstrap.gallery/">
	<meta property="og:url" content="https://www.bootstrap.gallery">
	<meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
	<meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
	<meta property="og:type" content="Website">
	<meta property="og:site_name" content="Bootstrap Gallery">
	<link rel="shortcut icon" href="assets/admin/images/favicon.svg" />

	<!-- *************
			************ CSS Files *************
		************* -->
	<link rel="stylesheet" href="assets/admin/fonts/bootstrap/bootstrap-icons.css" />
	<link rel="stylesheet" href="assets/admin/css/main.min.css" />
</head>

<body>
	<!-- Container start -->
	<?= $this->renderSection('content'); ?>
	<!-- Container end -->
	<!-- Required jQuery first, then Bootstrap Bundle JS -->
	<script src="/assets/admin/js/jquery.min.js"></script>
	<script src="/assets/admin/js/bootstrap.bundle.min.js"></script>

	<!-- *************
			************ Vendor Js Files *************
		************* -->

	<!-- Overlay Scroll JS -->
	<script src="/assets/admin/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
	<script src="/assets/admin/vendor/overlay-scroll/custom-scrollbar.js"></script>

	<!-- Apex Charts -->
	<script src="/assets/admin/vendor/apex/apexcharts.min.js"></script>
	<script src="/assets/admin/vendor/apex/custom/dash1/sales.js"></script>
	<script src="/assets/admin/vendor/apex/custom/dash1/sparkline.js"></script>
	<script src="/assets/admin/vendor/apex/custom/dash1/sparkline2.js"></script>

	<!-- Rating -->
	<script src="/assets/admin/vendor/rating/raty.js"></script>
	<script src="/assets/admin/vendor/rating/raty-custom.js"></script>

	<!-- Custom JS files -->
	<script src="/assets/admin/js/custom.js"></script>
</body>

</html>