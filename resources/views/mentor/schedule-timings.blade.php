<?php $page="schedule-timings";?>
@php use App\Models\ScheduleTimings; 
	use App\Models\Review;
	use App\Models\Mentor;
@endphp
@extends('layout.mainlayout')
@section('content')		
	<!-- Breadcrumb -->
    <div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/mentor/index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Schedule Timings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Schedule Timings</h2>
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
									
									<div class="user-info-cont">
										<h4 class="usr-name"><h4 class="usr-name">{{auth()->user()->first_name}}&nbsp;{{auth()->user()->last_name}}</h4></h4>
										<p class="mentor-type">{{auth()->user()->degree}}</p>
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
										<li><a href="/mentor/dashboard"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/appointments"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/schedule-timings" class="active"><i class="fas fa-hourglass-start"></i>Schedule Timings <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/chat"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/invoices"><i class="fas fa-file-invoice"></i>Invoices <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/reviews"><i class="fas fa-eye"></i>Reviews <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/blog"><i class="fab fa-blogger-b"></i>Blog <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/profile"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
										<!-- <li><a href="login"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li> -->
									</ul>
								</div>
							</div>
							<!-- /Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
						 {{-- TODO: refactor --}}

                        @if(session('message-success'))

                                <p>&nbsp;</p>

                            <div class="alert alert-success" role="alert">
                                {{ session('message-success') }}
                            </div>

                        @endif

                        @if(session('message-info'))

                                <p>&nbsp;</p>

                            <div class="alert alert-info" role="alert">
                                {{ session('message-info') }}
                            </div>

                        @endif

                        @if(session('message-alert'))

                                <p>&nbsp;</p>

                            <div class="alert alert-danger" role="alert">
                                {{ session('message-alert') }}
                            </div>

                        @endif
							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										
											<h4 class="card-title">Schedule Timings</h4>
											<div class="profile-box">
												<!-- <div class="row">

													<div class="col-lg-4">
														<div class="form-group">               
															<label>Timing Slot Duration</label>
															<select class="select form-control">
																<option>Select</option>
																<option>15 mins</option>
																<option selected="selected">30 mins</option>  
																<option>45 mins</option>
																<option>1 Hour</option>
															</select>
														</div>
													</div>

												</div>  -->    
												<div class="row">
													<div class="col-md-12">
														<!-- <div class="card schedule-widget mb-0"> -->
														
														
														<!-- <div class="card-body"> -->
											<!-- EVENT CODE -->

															
      <div id='calendar'></div> 

															<!-- EVent CODE -->

															
														<!-- </div>
													</div> -->
												</div>
											</div>
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