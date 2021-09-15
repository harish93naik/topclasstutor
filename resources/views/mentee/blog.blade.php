<?php $page="blog";?>
@extends('layout.mainlayout')
@section('content')	
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/mentee/index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Blog</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Blog</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Sidebar -->
							<div class="profile-sidebar">
								<div class="user-widget">
									<div class="pro-avatar">JD</div>
									<div class="rating">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star"></i>
									</div>
									<div class="user-info-cont">
										<h4 class="usr-name"><h4 class="usr-name">{{auth()->user()->first_name}}&nbsp;{{auth()->user()->last_name}}</h4></h4>
										<p class="mentor-type">English Literature (M.A)</p>
									</div>
								</div>
								<!-- <div class="progress-bar-custom">
									<h6>Complete your profiles ></h6>
									<div class="pro-progress">
									  <div class="tooltip-toggle" tabindex="0"></div>
									   <div class="tooltip">80%</div>
									</div>
								</div> -->
								<div class="custom-sidebar-nav">
									<ul>
										<li><a href="dashboard" ><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="bookings-mentee"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="chat-mentee"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="favourites"><i class="fas fa-star"></i>Favourites <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="/mentee/mentor"><i class="fas fa-star"></i>Mentors <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="/mentee/invoices"><i class="fas fa-file-invoice"></i>Invoices <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="/mentee/blog" class="active"><i class="fas fa-star"></i>Blog<span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="profile"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
									</ul>
								</div>
							</div>
							<!-- /Sidebar -->

						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							
							<div class="row">
								
							<div class="col-12">

								<!-- Tab Menu -->
								<nav class="user-tabs">
									<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
										<li>
											<a class="nav-link active" href="#activeservice" data-toggle="tab">Active Blog</a>
										</li>
										<!-- <li>
											<a class="nav-link" href="#inactiveservice" data-toggle="tab">Inactive Blog</a>
										</li> -->
									</ul>
								</nav>
								<!-- /Tab Menu -->

								<!-- Tab Content -->
								<div class="tab-content">

									<!-- Active Content -->
									<div role="tabpanel" id="activeservice" class="tab-pane fade show active">

										<div class="row">

											@if($blog_details)

											@foreach($blog_details as $row)
											<div class="col-12 col-md-6 col-xl-4">
												<div class="course-box blog grid-blog">
													<div class="blog-image mb-0">
														<a href="blog-details"><img class="img-fluid" src="{{asset($row->blog_image) }}" alt="Post Image"></a>
													</div>
													<div class="course-content">
														<span class="date">{{ $row->created_at->format('M j, Y') }}</span>
														<span class="course-title">{{$row->blog_title}}</span>
														<p>{{substr($row->description,0,250)}}</p>
														<div class="row">
															<div class="col text-right">
																<a href="/mentee/view-blog/{{$row->blog_id}}" class="text-success">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
															
														</div>
													</div>
												</div>
											</div>

											@endforeach
											
											@else

											<p>No blogs</p>

											@endif
										
										</div>

									</div>
									<!-- /Active Content -->
									
								

								</div>
								<!-- /Tab Content -->


							</div>


							</div>

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->	
@endsection