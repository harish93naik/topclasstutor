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
									<h4 class="usr-name">{{auth()->user()->first_name}}&nbsp;{{auth()->user()->last_name}}</h4>
									<!-- <p class="mentor-type">English Literature (M.A)</p> -->
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
									<li><a href="dashboard" class="active"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="bookings-mentee"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
									<!-- <li><a href="chat-mentee"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="favourites"><i class="fas fa-star"></i>Favourites <span><i class="fas fa-chevron-right"></i></span></a></li> -->
									<li><a href="/mentee/mentor"><i class="fas fa-star"></i>Mentors <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="/mentee/invoices"><i class="fas fa-file-invoice"></i>Invoices <span><i class="fas fa-chevron-right"></i></span></a></li>
									<!-- <li><a href="/mentee/blog"><i class="fas fa-star"></i>Blog<span><i class="fas fa-chevron-right"></i></span></a></li> -->
									<li><a href="profile"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
									<!-- <li><a href="login"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li> -->
								</ul>
							</div>
						</div>
						<!-- /Sidebar -->

						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
						
							<div class="row">
								<div class="col-md-12 col-lg-4 dash-board-list blue">
									<div class="dash-widget">
										<div class="circle-bar">
											<div class="icon-col">
												<i class="fas fa-calendar-check"></i>
											</div>
										</div>
										<div class="dash-widget-info">
											<h3>{{$appointment_counts}}</h3>
											<h6>Appointments</h6>															
										</div>
									</div>
								</div>
								
								<!-- <div class="col-md-12 col-lg-4 dash-board-list yellow">
									<div class="dash-widget">
										<div class="circle-bar">
											<div class="icon-col">
												<i class="fas fa-star"></i>
											</div>
										</div>
										<div class="dash-widget-info">
											<h3>33</h3>
											<h6>Mentoring Points</h6>															
										</div>
									</div>
								</div> -->
								
								<!-- <div class="col-md-12 col-lg-4 dash-board-list pink">
									<div class="dash-widget">
										<div class="circle-bar">
											<div class="icon-col">
												<i class="fas fa-graduation-cap"></i>
											</div>
										</div>
										<div class="dash-widget-info">
											<h3>14</h3>
											<h6>Rank</h6>															
										</div>
									</div>
								</div> -->
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Mentor Lists</h4>
									
									<div class="card card-table">
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-hover table-center mb-0">
													<thead>
														<tr>
															<th>BASIC INFO</th>
															<th>Scheduled Date</th>
															<th class="text-center">TAGS</th>
															<!-- <th class="text-center">ACTION</th> -->
														</tr>
													</thead>
													<tbody>
															@foreach($booking_details as $row)
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="/profile/{{$row->mentor->mentor_id}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$row->mentor->user->profile_image}}" alt="User Image"></a>
																	<a href="/profile/{{$row->mentor->mentor_id}}">{{$row->mentor->user->first_name}}&nbsp;{{$row->mentor->user->last_name}}<span>{{$row->mentor->user->email}}</span></a>				
																</h2>
															</td>
															<td>{{$row->schedule_date}}</td>
															<td class="text-center"><span class="{{$row->status}}">{{$row->status_description}}</span></td>
															<!-- <td class="text-center"><a href="profile-mentee" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td> -->
														</tr>
														@endforeach
													
													</tbody>
												</table>		
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