<?php $page="dashboard-mentee";?>
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
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
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
								<div class="pro-avatar">{{auth()->user()->first_name[0]}}{{auth()->user()->last_name[0]}}</div>
								<!-- <div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
								</div> -->
								<div class="user-info-cont">
									<h4 class="usr-name">{{$user_detail->first_name}}&nbsp;{{$user_detail->last_name}}</h4>
									<!-- <p class="mentor-type">English Literature (M.A)</p> -->
								</div>
							</div>
							<!-- <div class="progress-bar-custom">
								<h6>Complete your profiles ></h6>
								<div class="pro-progress">
									<div class="tooltip-toggle" tabindex="0"></div>
									<div class="tooltip">80%</div>
								</div>
							</div>  -->
							<div class="custom-sidebar-nav">
								<ul>
									<li><a href="dashboard" ><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="bookings-mentee"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="chat-mentee"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="favourites"><i class="fas fa-star"></i>Favourites <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="/mentee/mentor"><i class="fas fa-star"></i>Mentors <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="/mentee/invoices"><i class="fas fa-file-invoice"></i>Invoices <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="/mentee/profile" class="active"><i class="fas fa-user-cog active"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
									<!-- <li><a href="login"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li> -->
								</ul>
							</div>
						</div>
						<!-- /Sidebar -->

						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
						
							
							
							<div class="row">
								<div class="col-md-12">
									
									
									<div class="card">
										<div class="card-body custom-border-card pb-0">
											<!-- Personal Details -->
									<div class="widget education-widget mb-0">
										<h4 class="widget-title">Personal Details</h4>
										<hr/>
										<div class="experience-box">
											<ul class="experience-list profile-custom-list">
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Gender</span>
															<div class="row-result">{{$mentee_details->gender}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Date of Birth</span>
															<div class="row-result">{{$mentee_details->dob}}</div>
														</div>
													</div>
												</li>
												<!-- <li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Where did you hear about us?</span>
															<div class="row-result">Through web search</div>
														</div>
													</div>
												</li> -->
											</ul>
										</div>
									</div>
									<!-- /Personal Details -->
										</div>
									</div>
									<div class="card">
								<div class="card-body custom-border-card pb-0">

									<!-- Qualification Details -->
									<div class="widget experience-widget mb-0">
										<h4 class="widget-title">Qualification</h4>
										<hr/>
										<div class="experience-box">
											<ul class="experience-list profile-custom-list">
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Undergraduate College</span>
															<div class="row-result">Coimbatore University</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Undergraduate Major</span>
															<div class="row-result">Mathematics</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Graduate College</span>
															<div class="row-result">Coimbatore University</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Type of Degree</span>
															<div class="row-result">B.Sc (Maths)</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<!-- /Qualification Details -->

								</div>
							</div>
								<div class="card">
								<div class="card-body pb-1 custom-border-card">

									<!-- Location Details -->
									<div class="widget awards-widget m-0">
										<h4 class="widget-title">Location</h4>
										<hr/>
										<div class="experience-box">
											<ul class="experience-list profile-custom-list">
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Address 1</span>
															<div class="row-result">{{$mentee_details->address1}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Address 2</span>
															<div class="row-result">{{$mentee_details->address2}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Country</span>
															<div class="row-result">{{$mentee_details->country}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>City</span>
															<div class="row-result">{{$mentee_details->city}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>District</span>
															<div class="row-result">{{$mentee_details->district}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Suburb</span>
															<div class="row-result">{{$mentee_details->state}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Postal Code</span>
															<div class="row-result">{{$mentee_details->zipcode}}</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<!-- /Location Details -->

								</div>
							</div>
									   
								</div>
							</div>

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->	
@endsection