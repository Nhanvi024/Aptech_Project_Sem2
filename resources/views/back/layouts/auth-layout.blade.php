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
	<title> @yield("pageTitle")</title>
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
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}

	{{-- </script> --}}
	<style>
		@import url('https://rsms.me/inter/inter.css');

		:root {
			--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
		}

		body {
			font-feature-settings: "cv03", "cv04", "cv11";
		}
	</style>
</head>

<body class=" d-flex flex-column">
	<script src="/back/dist/js/demo-theme.min.js?1692870487"></script>

	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
		crossorigin="anonymous"></script>
	@yield("content")

	<!-- Libs JS -->
	<!-- Tabler Core -->
	<script src="/back/dist/js/tabler.min.js?1692870487" defer></script>
	<script src="/back/dist/js/demo.min.js?1692870487" defer></script>
</body>

</html>
