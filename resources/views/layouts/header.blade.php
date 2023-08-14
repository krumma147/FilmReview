<div class="site-mobile-menu site-navbar-target">
	<div class="site-mobile-menu-header">
		<div class="site-mobile-menu-close">
			<span class="icofont-close js-menu-toggle"></span>
		</div>
	</div>
	<div class="site-mobile-menu-body"></div>
</div>

<div class="site-nav">
	<div class="container">
		<div class="menu-bg-wrap">
			<div class="site-navigation">
				<div class="row g-0 align-items-center">
					<div class="col-2">
						<a href="/" class="logo m-0 float-start">Blogy<span class="text-primary">.</span></a>
					</div>
					<div class="col-8 text-center">
						<form action="#" class="search-form d-inline-block d-lg-none">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="bi-search"></span>
						</form>

						<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
							<li class="active"><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="contact.html">Contact Us</a></li>
							<li>
								<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
									<span></span>
								</a>
								<form action="#" class="search-form d-none d-lg-inline-block">
									<input type="text" class="form-control" placeholder="Search...">
									<span class="bi-search"></span>
								</form>
							</li>
						</ul>
					</div>
					<div class="col-2 text-end">
						@if (Route::has('login'))
							@auth
								<div class="dropdown">
									@if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
										<button class="btn btn-secondary dnavbar-toggler" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
											<img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
										</button>
									@else
										<button class="btn btn-secondary navbar-toggler" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
											{{ Auth::user()->name }}
										</button>
									@endif
				
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
											<!-- Account Management -->
											<li>
												<a class="dropdown-item" href="#">{{ __('Manage Account') }}</a>	
											<li>
				
											<a class="dropdown-item" href="{{ route('profile.show') }}">
												{{ __('Profile') }}
											</a>
				
											@if (Laravel\Jetstream\Jetstream::hasApiFeatures())
												<a class="dropdown-item" href="{{ route('api-tokens.index') }}">
													{{ __('API Tokens') }}
												</a>
											@endif
				
										<div class="border-t border-gray-200"></div>
				
											<!-- Authentication -->
										<form method="POST" action="{{ route('logout') }}" id="logout-form">
										@csrf
											<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
												{{ __('Log Out') }}
											</a>
										</form>
										
									</ul>								  
								</div>
							@else
									<a href="{{ route('login') }}" class=" text-light font-semibold hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
								@if (Route::has('register'))
									<a href="{{ route('register') }}" class=" text-light ml-4 font-semibold  hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
								@endif
							@endauth
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>