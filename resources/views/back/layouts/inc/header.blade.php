<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none sticky-top" style="top: 0px">
	<div class="container-xl">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
			aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-nav flex-row order-md-last">
			<div class="d-none d-md-flex">
				<a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip" data-bs-placement="bottom"
					aria-label="Enable dark mode" data-bs-original-title="Enable dark mode">
					<!-- Download SVG icon from http://tabler-icons.io/i/moon -->
					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
						stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
						<path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
					</svg>
				</a>
				<a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip" data-bs-placement="bottom"
					aria-label="Enable light mode" data-bs-original-title="Enable light mode">
					<!-- Download SVG icon from http://tabler-icons.io/i/sun -->
					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
						stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
						<path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
						<path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
					</svg>
				</a>
			</div>
			<div class="nav-item dropdown">
				<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
					<span class="avatar avatar-sm" style="background-image: url({{ auth("admin")->user()->getAvatar() }})"></span>
					<div class="d-none d-xl-block ps-2">
						<div>{{ auth("admin")->user()->username }}</div>
						<div class="mt-1 small text-secondary">{{ auth("admin")->user()->position }}</div>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
					<a href="/admin" class="dropdown-item">Home</a>
					<div class="dropdown-divider"></div>
					<a href={{ route("admin.admin.logout") }} class="dropdown-item">Logout</a>
				</div>
			</div>
		</div>
		<div class="collapse navbar-collapse" id="navbar-menu">
			<div>
				{{-- <form action="./" method="get" autocomplete="off" novalidate="">
					<div class="input-icon">
						<span class="input-icon-addon">
							<!-- Download SVG icon from http://tabler-icons.io/i/search -->
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
								stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
								<path d="M21 21l-6 -6"></path>
							</svg>
						</span>
						<input type="text" value="" class="form-control" placeholder="Search…"
							aria-label="Search in website">
					</div>
				</form> --}}
			</div>
		</div>
	</div>
</header>
