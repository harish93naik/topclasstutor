<?php $page="bookings-mentee";?>
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
									<li class="breadcrumb-item active" aria-current="page">My Bookings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">My Bookings</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

						<div class="row">

							<!-- Sidebar -->
							<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
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
											<li><a href="/dashboard"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
											<li><a href="/bookings-mentee" class="active"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
											<!-- <li><a href="chat-mentee"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li> -->
											<!-- <li><a href="favourites"><i class="fas fa-star"></i>Favourites <span><i class="fas fa-chevron-right"></i></span></a></li> -->
											<li><a href="/mentee/mentor"><i class="fas fa-star"></i>Mentors <span><i class="fas fa-chevron-right"></i></span></a></li>
											<li><a href="/mentee/invoices"><i class="fas fa-file-invoice"></i>Invoices <span><i class="fas fa-chevron-right"></i></span></a></li>
											<li><a href="profile-mentee"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
											<li><a href="login"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /Sidebar -->

						<!-- Booking summary -->
						<div class="col-md-7 col-lg-8 col-xl-9">
							<h3 class="pb-3">Booking Summary</h3>
							<!-- Mentee List Tab -->
							<div class="tab-pane show active" id="mentee-list">
								<div class="card card-table">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover table-center mb-0">
												<thead>
													<tr>
														<th>MENTOR LISTS</th>
														<th>SCHEDULED DATE</th>
														<th class="text-center">SCHEDULED TIMINGS</th>
														<th class="text-center">STATUS</th>
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
														<td class="text-center"><span class="{{$row->status}}">{{$row->schedule_time}}</span></td>
														@if($row->status=="accept") 
														<td class="text-center"><a href="{{$row->meeting_url}}" target="_blank">&nbsp;Call Here&nbsp;<i class="fas fa-phone-alt"></i></a></span>
														@else
														<td class="text-center"><span class="{{$row->status}}">{{$row->status_description}}</span></td>
														@endif
													</tr>
													@endforeach
												</tbody>
											</table>		
										</div>
									</div>
								</div>
							</div>
							<!-- /Mentee List Tab -->
						</div>
						<!-- /Booking summary -->

						</div>
					
				</div>
			</div>		
			<!-- /Page Content -->
@endsection