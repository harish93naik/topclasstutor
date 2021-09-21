<?php error_reporting(0);?>
<!-- Loader -->
@if(Route::is(['map-grid','map-list']))
<div id="loader">
		<div class="loader">
			<span></span>
			<span></span>
		</div>
	</div>
	@endif
	<!-- /Loader  -->
	<!-- Header -->
	<header class="header">
				<div class="header-fixed">
				<nav class="navbar navbar-expand-lg header-nav">

					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="/index" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="{{ Request::is('index') ? 'active' : '' }}">
								<a href="/index">Home</a>
							</li>
							<li class="{{ Request::is('about') ? 'active' : '' }}">
								<a href="/about">About Us</a>
							</li>
							
							<li class="{{ Request::is('contact') ? 'active' : '' }}">
								<a href="/contact-us">Contact Us</a>
							</li>
						</ul>
					</div>

					<!-- <div class="navbar-header col-lg-4">


						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="/index" class="navbar-brand logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div> -->
					<div class="navbar-header col-lg-4 logo-web-class">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="/index" class="navbar-brand logo">
							<img src="/assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
				<!-- 	<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="/index" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="{{ Request::is('about') ? 'active' : '' }}">
								<a href="/about">About Us</a>
							</li>
							<li class="{{ Request::is('index') ? 'active' : '' }}">
								<a href="index">Home</a>
							</li>
							<li class="{{ Request::is('index') ? 'active' : '' }}">
								<a href="index">Home</a>
							</li>
						</ul> -->

						@if(!auth()->user())

					<!-- 	<ul class="main-nav">
							<li class="{{ Request::is('index') ? 'active' : '' }}">
								<a href="index">Home</a>
							</li>
							<li class="has-submenu  <?php if($page=="dashboard" || $page=="book" || $page=="schedule-timings" || $page=="mentee-list" || $page=="profile-mentee"  || $page=="blog" || $page=="add-blog" || $page=="edit-blog" || $page=="chat" || $page=="invoices" || $page=="profile-settings" || $page=="reviews" || $page=="mentor-register") { echo 'active'; } ?>">
								<a href="">Mentor <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="<?php if($page=="dashboard") { echo 'active'; } ?>"><a href="dashboard">Mentor Dashboard</a></li>
									<li class="<?php if($page=="book") { echo 'active'; } ?>"><a href="bookings">Bookings</a></li>
									<li class="<?php if($page=="schedule-timings") { echo 'active'; } ?>"><a href="schedule-timings">Schedule Timing</a></li>
									<li class="<?php if($page=="mentee-list") { echo 'active'; } ?>"><a href="mentee-list">Mentee List</a></li>
									<li class="<?php if($page=="profile-mentee") { echo 'active'; } ?>"><a href="profile-mentee">Mentee Profile</a></li>
									<li class="has-submenu <?php if($page=="blog" || $page=="add-blog" || $page=="edit-blog") { echo 'active'; } ?>">
										<a href="blog">Blog</a>
										<ul class="submenu">
											<li class="<?php if($page=="blog") { echo 'active'; } ?>"><a href="blog">Blog</a></li>
											<li class="<?php if($page=="blog-details") { echo 'active'; } ?>"><a href="blog-details">Blog View</a></li>
											<li class="<?php if($page=="add-blog") { echo 'active'; } ?>"><a href="add-blog">Add Blog</a></li>
											<li class="<?php if($page=="edit-blog") { echo 'active'; } ?>"><a href="edit-blog">Edit Blog</a></li>
										</ul>
									</li>
									<li class="<?php if($page=="chat") { echo 'active'; } ?>"><a href="chat">Chat</a></li>
									<li class="<?php if($page=="invoices") { echo 'active'; } ?>"><a href="invoices">Invoices</a></li>
									<li class="<?php if($page=="profile-settings") { echo 'active'; } ?>"><a href="profile-settings">Profile Settings</a></li>
									<li class="<?php if($page=="reviews") { echo 'active'; } ?>"><a href="reviews">Reviews</a></li>
									<li class="<?php if($page=="mentor-register") { echo 'active'; } ?>"><a href="mentor-register">Mentor Register</a></li>
								</ul>
							</li>	
							<li class="has-submenu <?php if($page=="map-grid" || $page=="bookings" || $page=="map-list" || $page=="search" || $page=="profile" || $page=="bookings-mentee" || $page=="checkout" || $page=="booking-success" || $page=="dashboard-mentee" || $page=="favourites" || $page=="chat-mentee" || $page=="profile-settings-mentee" || $page=="profile-settings-mentee" || $page=="change-password") { echo 'active'; } ?>">
								<a href="">Mentee <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="has-submenu <?php if($page=="map-grid" || $page=="map-list") { echo 'active'; } ?>">
										<a href="#">Mentors</a>
										<ul class="submenu">
											<li class="<?php if($page=="map-grid") { echo 'active'; } ?>"><a href="map-grid">Map Grid</a></li>
											<li class="<?php if($page=="map-list") { echo 'active'; } ?>"><a href="map-list">Map List</a></li>
										</ul>
									</li>
									<li class="<?php if($page=="search") { echo 'active'; } ?>"><a href="search">Search Mentor</a></li>
									<li class="<?php if($page=="profile") { echo 'active'; } ?>"><a href="profile">Mentor Profile</a></li>
									<li class="<?php if($page=="bookings-mentee") { echo 'active'; } ?>"><a href="bookings-mentee">Bookings</a></li>
									<li class="<?php if($page=="checkout") { echo 'active'; } ?>"><a href="checkout">Checkout</a></li>
									<li class="<?php if($page=="booking-success") { echo 'active'; } ?>"><a href="booking-success">Booking Success</a></li>
									<li class="<?php if($page=="dashboard-mentee") { echo 'active'; } ?>"><a href="dashboard-mentee">Mentee Dashboard</a></li>
									<li class="<?php if($page=="favourites") { echo 'active'; } ?>"><a href="favourites">Favourites</a></li>
									<li class="<?php if($page=="chat-mentee") { echo 'active'; } ?>"><a href="chat-mentee">Chat</a></li>
									<li class="<?php if($page=="profile-settings-mentee") { echo 'active'; } ?>"><a href="profile-settings-mentee">Profile Settings</a></li>
									<li class="<?php if($page=="change-password") { echo 'active'; } ?>"><a href="change-password">Change Password</a></li>
								</ul>
							</li>	
							<li class="has-submenu <?php if($page=="voice-call" || $page=="video-call"  || $page=="components" || $page=="blank-page") { echo 'active'; } ?>">
								<a href="">Pages <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="<?php if($page=="voice-call") { echo 'active'; } ?>"><a href="voice-call">Voice Call</a></li>
									<li class="<?php if($page=="video-call") { echo 'active'; } ?>"><a href="video-call">Video Call</a></li>
									<li class="<?php if($page=="search") { echo 'active'; } ?>"><a href="search">Search Mentors</a></li>
									<li class="<?php if($page=="components") { echo 'active'; } ?>"><a href="components">Components</a></li>
									<li class="has-submenu">
										<a href="invoices">Invoices</a>
										<ul class="submenu">
											<li><a href="invoices">Invoices</a></li>
											<li><a href="invoice-view">Invoice View</a></li>
										</ul>
									</li>
									<li class="<?php if($page=="blank-page") { echo 'active'; } ?>"><a href="blank-page">Starter Page</a></li>
									<li class="<?php if($page=="login") { echo 'active'; } ?>"><a href="login">Login</a></li>
									<li class="<?php if($page=="register") { echo 'active'; } ?>"><a href="register">Register</a></li>
									<li class="<?php if($page=="forgot-password") { echo 'active'; } ?>"><a href="forgot-password">Forgot Password</a></li>
								</ul>
							</li>
							<li class="has-submenu <?php if($page=="blog-list" || $page=="blog-grid"  || $page=="blog-details") { echo 'active'; } ?>">
								<a href="">Blog <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="<?php if($page=="blog-list") { echo 'active'; } ?>"><a href="blog-list">Blog List</a></li>
									<li class="<?php if($page=="blog-grid") { echo 'active'; } ?>"><a href="blog-grid">Blog Grid</a></li>
									<li class="<?php if($page=="blog-details") { echo 'active'; } ?>"><a href="blog-details">Blog Details</a></li>
								</ul>
							</li>
							<li>
							<a href="{{route('page')}}" target="_blank">Admin</a>
							</li>
							<li class="login-link">
								<a href="login">Login / Signup</a>
							</li>
						</ul>	 -->
						@endif		 
					<!-- </div>	 -->
					
					<ul class="nav header-navbar-rht">
					@if(Route::is(['pagee','mentor-register','mentee-register','about']))
						@if(!auth()->user())

						<a class="nav-link header-login  home-menu {{ Request::is('mentee-register') ? 'active' : '' }}" href="/mentee-register">Mentee Register</a>
						

						<a class="nav-link header-login  home-menu {{ Request::is('mentor-register') ? 'active' : '' }}" href="/mentor-register">Become a Mentor?</a>

						<li class="nav-item">
							<a class="nav-link header-login" href="login">Login</a>
						</li>
					

						<!-- <li class="nav-item">
							<a class="nav-link header-login" href="register">Register</a>

						</li> -->

						@endif
						@endif
						@if(!Route::is(['mentor-register','mentee-register']))
						@if(auth()->user())
						
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

								<span class="user-img">
									@if(auth()->user())
									<img class="rounded-circle" src="{{asset(auth()->user()->profile_image) }}" width="31" alt="{{auth()->user()->first_name}}">
									@else
									<img class="rounded-circle" src="/assets/img/user/user.jpg" width="31" alt="{{auth()->user()->first_name}}">
									@endif
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="{{asset(auth()->user()->profile_image) }}" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>{{auth()->user()->first_name}}</h6>
										<p class="text-muted mb-0">{{auth()->user()->role}}</p>
									</div>
								</div>
								@if(auth()->user()->role=="mentor")
								<a class="dropdown-item" href="/mentor/dashboard">Dashboard</a>
								<a class="dropdown-item" href="/mentor/profile-settings">Profile Settings</a>
								@elseif(auth()->user()->role=="mentee")
								<a class="dropdown-item" href="/mentee/dashboard">Dashboard</a>
								<a class="dropdown-item" href="/mentee/profile-settings">Profile Settings</a>
								@else
								<a class="dropdown-item" href="/admin/dashboard">Dashboard</a>
								<a class="dropdown-item" href="/admin/profile-settings">Profile Settings</a>
								@endif
								<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

							</div>
						</li>
						@endif
						<!-- /User Menu -->
						@endif
					</ul>
					
					


					
				</nav>


				</div>
			</header>
			<!-- /Header -->
<div class="main-wrapper">
