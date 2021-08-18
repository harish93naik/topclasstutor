<?php $page="schedule-timings";?>
@php use App\Models\ScheduleTimings; @endphp
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
										<div class="card-body">
											<h4 class="card-title">Schedule Timings</h4>
											<div class="profile-box">
												<div class="row">

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

												</div>     
												<div class="row">
													<div class="col-md-12">
														<div class="card schedule-widget mb-0">
														
															<!-- Schedule Header -->
															<div class="schedule-header">
															
																<!-- Schedule Nav -->
																<div class="schedule-nav">
																	<ul class="nav nav-tabs nav-justified">
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_sunday">Sunday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link active" data-toggle="tab" href="#slot_monday">Monday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_tuesday">Tuesday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_wednesday">Wednesday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_thursday">Thursday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_friday">Friday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_saturday">Saturday</a>
																		</li>
																	</ul>
																</div>
																<!-- /Schedule Nav -->
																
															</div>
															<!-- /Schedule Header -->
															
															<!-- Schedule Content -->
															<div class="tab-content schedule-cont">
															
																<!-- Sunday Slot -->
																
																<div id="slot_sunday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">

																		<span>Time Slots</span> 

																		<a class="edit-link" data-toggle="modal" href="#add_time_slot" data-value="1"><i class="fa fa-plus-circle"></i> Add Slot</a></h4>

																		@php
																			$slot=ScheduleTimings::getSlot(1);
																		@endphp

																		@if(!$slot)

																		

																		<p class="text-muted mb-0">Not Available</p>

																		@else

																		<div class="user-times">
																			@foreach($slot as $row)
																		<div class="user-slot-list">
																			{{$row->start_time}} - {{$row->end_time}}
																			<a href="schedule-timings/delete/{{$row->slot_id}}" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
																		@endforeach
																	</div>
																	@endif

																	

																	
																</div>

																<!-- /Sunday Slot -->

																<!-- Monday Slot -->
																<div id="slot_monday" class="tab-pane fade show active">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" data-toggle="modal" href="#add_time_slot" data-value="2"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	@php
																			$slot=ScheduleTimings::getSlot(2);
																		@endphp

																		@if(!$slot)

																		

																		<p class="text-muted mb-0">Not Available</p>

																		@else

																		<div class="user-times">
																			@foreach($slot as $row)
																		<div class="user-slot-list">
																			{{$row->start_time}} - {{$row->end_time}}
																			<a href="schedule-timings/delete/{{$row->slot_id}}" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
																		@endforeach
																	</div>
																	@endif
																	<!-- /Slot List -->
																	
																</div>
																<!-- /Monday Slot -->

																<!-- Tuesday Slot -->
																<div id="slot_tuesday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" data-toggle="modal" href="#add_time_slot" data-value="3"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	@php
																			$slot=ScheduleTimings::getSlot(3);
																		@endphp

																		@if(!$slot)

																		

																		<p class="text-muted mb-0">Not Available</p>

																		@else

																		<div class="user-times">
																			@foreach($slot as $row)
																		<div class="user-slot-list">
																			{{$row->start_time}} - {{$row->end_time}}
																			<a href="schedule-timings/delete/{{$row->slot_id}}" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
																		@endforeach
																	</div>
																	@endif
																</div>
																<!-- /Tuesday Slot -->

																<!-- Wednesday Slot -->
																<div id="slot_wednesday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" data-toggle="modal" href="#add_time_slot" data-value="4"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	@php
																			$slot=ScheduleTimings::getSlot(4);
																		@endphp

																		@if(!$slot)

																		

																		<p class="text-muted mb-0">Not Available</p>

																		@else

																		<div class="user-times">
																			@foreach($slot as $row)
																		<div class="user-slot-list">
																			{{$row->start_time}} - {{$row->end_time}}
																			<a href="schedule-timings/delete/{{$row->slot_id}}" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
																		@endforeach
																	</div>
																	@endif
																</div>
																<!-- /Wednesday Slot -->

																<!-- Thursday Slot -->
																<div id="slot_thursday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" data-toggle="modal" href="#add_time_slot" data-value="5"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	@php
																			$slot=ScheduleTimings::getSlot(5);
																		@endphp

																		@if(!$slot)

																		

																		<p class="text-muted mb-0">Not Available</p>

																		@else

																		<div class="user-times">
																			@foreach($slot as $row)
																		<div class="user-slot-list">
																			{{$row->start_time}} - {{$row->end_time}}
																			<a href="schedule-timings/delete/{{$row->slot_id}}" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
																		@endforeach
																	</div>
																	@endif
																</div>
																<!-- /Thursday Slot -->

																<!-- Friday Slot -->
																<div id="slot_friday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" data-toggle="modal" href="#add_time_slot" data-value="6"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	@php
																			$slot=ScheduleTimings::getSlot(6);
																		@endphp

																		@if(!$slot)

																		

																		<p class="text-muted mb-0">Not Available</p>

																		@else

																		<div class="user-times">
																			@foreach($slot as $row)
																		<div class="user-slot-list">
																			{{$row->start_time}} - {{$row->end_time}}
																			<a href="schedule-timings/delete/{{$row->slot_id}}" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
																		@endforeach
																	</div>
																	@endif
																</div>
																<!-- /Friday Slot -->

																<!-- Saturday Slot -->
																<div id="slot_saturday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" data-toggle="modal" href="#add_time_slot" data-value="7"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	@php
																			$slot=ScheduleTimings::getSlot(7);
																		@endphp

																		@if(!$slot)

																		

																		<p class="text-muted mb-0">Not Available</p>

																		@else

																		<div class="user-times">
																			@foreach($slot as $row)
																		<div class="user-slot-list">
																			{{$row->start_time}} - {{$row->end_time}}
																			<a href="schedule-timings/delete/{{$row->slot_id}}" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
																		@endforeach
																	</div>
																	@endif
																</div>
																<!-- /Saturday Slot -->

															</div>
															<!-- /Schedule Content -->
															
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

				</div>

			</div>		
			<!-- /Page Content -->
@endsection