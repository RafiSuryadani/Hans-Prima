<!DOCTYPE html>
<html lang="zxx">

<head>
	<!-- Meta Tag -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
	<title>Hansprima</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?= base_url() ?>img/hansprima_gpt2.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- StyleSheet -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?= base_url() ?>css/magnific-popup.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="<?= base_url() ?>css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
	<link rel="stylesheet" href="<?= base_url() ?>css/themify-icons.css">
	<!-- Nice Select CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>css/niceselect.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>css/animate.css">
	<!-- Flex Slider CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>css/flex-slider.min.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?= base_url() ?>css/owl-carousel.css">
	<!-- Slicknav -->
	<link rel="stylesheet" href="<?= base_url() ?>css/slicknav.min.css">

	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="<?= base_url() ?>css/reset.css">
	<link rel="stylesheet" href="<?= base_url() ?>css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>css/responsive.css">

	<!-- Color CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>css/color/color1.css">
	<!--<link rel="stylesheet" href="css/color/color2.css">-->
	<!--<link rel="stylesheet" href="css/color/color3.css">-->
	<!--<link rel="stylesheet" href="css/color/color4.css">-->
	<!--<link rel="stylesheet" href="css/color/color5.css">-->
	<!--<link rel="stylesheet" href="css/color/color6.css">-->
	<!--<link rel="stylesheet" href="css/color/color7.css">-->
	<!--<link rel="stylesheet" href="css/color/color8.css">-->
	<!--<link rel="stylesheet" href="css/color/color9.css">-->
	<!--<link rel="stylesheet" href="css/color/color10.css">-->
	<!--<link rel="stylesheet" href="css/color/color11.css">-->
	<!--<link rel="stylesheet" href="css/color/color12.css">-->

	<link rel="stylesheet" href="#" id="colors">

</head>

<body class="js">

	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->

	<!-- Eshop Color Plate -->
	<div class="color-plate ">
		<a class="color-plate-icon"><i class="ti-paint-bucket"></i></a>
		<h4>Eshop Colors</h4>
		<p>Here is some awesome color's available on Eshop Template.</p>
		<span class="color1"></span>
		<span class="color2"></span>
		<span class="color3"></span>
		<span class="color4"></span>
		<span class="color5"></span>
		<span class="color6"></span>
		<span class="color7"></span>
		<span class="color8"></span>
		<span class="color9"></span>
		<span class="color10"></span>
		<span class="color11"></span>
		<span class="color12"></span>
	</div>
	<!-- /End Color Plate -->

	<?= $this->include('_layouts/header') ?>

	<?= $this->renderSection('content') ?>

	<?= $this->include('_layouts/footer') ?>

	<!-- Jquery -->
	<script src="<?= base_url() ?>js/jquery.min.js"></script>
	<script src="<?= base_url() ?>js/jquery-migrate-3.0.0.js"></script>
	<script src="<?= base_url() ?>js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="<?= base_url() ?>js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?= base_url() ?>js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="<?= base_url() ?>js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="<?= base_url() ?>js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="<?= base_url() ?>js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="<?= base_url() ?>js/magnific-popup.js"></script>
	<!-- Fancybox JS -->
	<script src="<?= base_url() ?>js/facnybox.min.js"></script>
	<!-- Waypoints JS -->
	<script src="<?= base_url() ?>js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="<?= base_url() ?>js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="<?= base_url() ?>js/nicesellect.js"></script>
	<!-- Ytplayer JS -->
	<script src="<?= base_url() ?>js/ytplayer.min.js"></script>
	<!-- Flex Slider JS -->
	<script src="<?= base_url() ?>js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="<?= base_url() ?>js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="<?= base_url() ?>js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="<?= base_url() ?>js/easing.js"></script>
	<!-- Active JS -->
	<script src="<?= base_url() ?>js/active.js"></script>

	<?= $this->renderSection('script') ?>

</body>

</html>