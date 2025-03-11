<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Fruitkha ADMIN</title>
	<!-- CSS files -->
	<link href="/back/dist/css/tabler.min.css?1692870487" rel="stylesheet" />
	<link href="/back/dist/css/tabler-flags.min.css?1692870487" rel="stylesheet" />
	<link href="/back/dist/css/tabler-payments.min.css?1692870487" rel="stylesheet" />
	<link href="/back/dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet" />
	<link href="/back/dist/css/demo.min.css?1692870487" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
		integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
	<style>
		@import url('https://rsms.me/inter/inter.css');

		:root {
			--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
		}

		body {
			font-feature-settings: "cv03", "cv04", "cv11";
		}

		/* Paginate */
		.pagination-wrap ul li a {
			-webkit-transition: 0.3s;
			-o-transition: 0.3s;
			transition: 0.3s;
		}

		.pagination-wrap ul li:hover a {
			background-color: #3B71CA;
			color: white
		}

		.pagination-wrap {
			margin-top: 40px;
		}

		.pagination-wrap ul {
			margin: 0;
			padding: 0;
			list-style-type: none;
		}

		.pagination-wrap ul li {
			display: inline-block;
		}

		.pagination-wrap ul li a {
			color: black;
			font-size: 15px;
			background-color: #f3f3f3;
			display: inline-block;
			padding: 8px 14px;
			border-radius: 2px;
			margin: 3px;
			font-weight: 600;
			text-decoration: none;
			border-radius: 5px;
		}

		.pagination-wrap ul li a.active {
			background-color: #3B71CA;
			color: white
		}
	</style>
</head>

<body>
	<script src="/back/dist/js/demo-theme.min.js?1692870487"></script>
	<!-- Content -->
	@include("back.layouts.inc.aside")
	@include("back.layouts.inc.header")
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
		crossorigin="anonymous"></script>
	@yield("content")
	<!-- Libs JS -->
	<script src="/back/dist/libs/apexcharts/dist/apexcharts.min.js?1692870487" defer></script>
	<script src="/back/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487" defer></script>
	<script src="/back/dist/libs/jsvectormap/dist/maps/world.js?1692870487" defer></script>
	<script src="/back/dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487" defer></script>

	<!-- Tabler Core -->
	<script src="/back/dist/js/tabler.min.js?1692870487" defer></script>
	<script src="/back/dist/js/demo.min.js?1692870487" defer></script>
</body>

</html>
