<?php $page="dashboard";?>
@extends('layout.mainlayout')
@php use App\Models\Review;
use App\Models\Mentor;
 @endphp
@section('content')	
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/mentor/index">Home</a></li>
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
									
									<div class="user-info-cont">
										<h4 class="usr-name">{{auth()->user()->first_name}}&nbsp;{{auth()->user()->last_name}}</h4>
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
										<li><a href="/mentor/dashboard" class="active"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/appointments"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/schedule-timings"><i class="fas fa-hourglass-start"></i>Schedule Timings <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/chat"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/invoices"><i class="fas fa-file-invoice"></i>Invoices <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/reviews"><i class="fas fa-eye"></i>Reviews <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/blog"><i class="fab fa-blogger-b"></i>Blog <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/profile"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
										<!-- <li><a href="/mentor/login"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li> -->
									</ul>
								</div>
							</div>
							<!-- /Sidebar -->

						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="row">
								<!-- <div class="col-md-12 col-lg-4 dash-board-list blue">
									<div class="dash-widget">
										<div class="circle-bar">
											<div class="icon-col">
												<i class="fas fa-users"></i>
											</div>
										</div>
										<div class="dash-widget-info">
											<h3>23</h3>
											<h6>Members</h6>															
										</div>
									</div>
								</div> -->
								
								<div class="col-md-12 col-lg-4 dash-board-list yellow">
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
								
								<!-- <div class="col-md-12 col-lg-4 dash-board-list pink">
									<div class="dash-widget">
										<div class="circle-bar">
											<div class="icon-col">
												<i class="fas fa-wallet"></i>
											</div>
										</div>
										<div class="dash-widget-info">
											<h3>$14</h3>
											<h6>Total Earned</h6>															
										</div>
									</div>
								</div> -->
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Mentee Lists</h4>
									<div class="card card-table">
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-hover table-center mb-0">
													<thead>
														<tr>
															<th>MENTEE NAME</th>
															<th>SCHEDULED DATE</th>
															<th class="text-center">STATUS</th>
															<!-- <th class="text-center">ACTION</th> -->
														</tr>
													</thead>
													<tbody>
														@foreach($booking_details as $row)
														<tr>
															<td>
																<h2 class="table-avatar">
																	<a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($row->mentee->user->profile_image) }}" alt="User Image"></a>
																	<a href="profile">{{$row->mentee->user->first_name}}&nbsp;{{$row->mentee->user->last_name}}<span>{{$row->mentee->user->email}}</span></a>				
																</h2>
															</td>
															<td>{{$row->schedule_date}}</td>

															<td class="text-center"><span class="{{$row->status}}">{{$row->status_description}}</span></td>
															<!-- <td class="text-center"><a href="profile" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> View</a></td> -->
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