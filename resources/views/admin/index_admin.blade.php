
@extends('layout.mainlayout_admin')
@php use App\Models\Review @endphp
@section('content')		
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
										<div class="dash-count">
											<h3>{{$user_counts}}</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										<h6 class="text-muted">Members</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-primary w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
										<div class="dash-count">
											<h3>{{$appointment_counts}}</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Appointments</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-star-o"></i>
										</span>
										<div class="dash-count">
											<h3>485</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Mentoring Points</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-danger w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
										<div class="dash-count">
											<h3>$62523</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Revenue</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-warning w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-lg-6">
						
							<!-- Sales Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Revenue</h4>
								</div>
								<div class="card-body">
									<div id="morrisArea"></div>
								</div>
							</div>
							<!-- /Sales Chart -->
							
						</div>
						<div class="col-md-12 col-lg-6">
						
							<!-- Invoice Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Status</h4>
								</div>
								<div class="card-body">
									<div id="morrisLine"></div>
								</div>
							</div>
							<!-- /Invoice Chart -->
							
						</div>	
					</div>
					<div class="row">
						<div class="col-md-6 d-flex">
						
							<!-- Recent Orders -->
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Mentor List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Mentor Name</th>
													<th>Course</th>
													<th>Earned</th>
													<th>Reviews</th>
												</tr>
											</thead>
											<tbody>
												@foreach($mentor_list as $mentor)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="/admin/mentor-profile/{{$mentor->mentor_id}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($mentor->user->profile_image)}}" alt="User Image"></a>
															<a href="/admin/mentor-profile/{{$mentor->mentor_id}}">{{$mentor->user->first_name}}&nbsp;{{$mentor->user->last_name}}</a>
														</h2>
													</td>
													<td>{{$mentor->user->category_description}}</td>
													<td>$3200.00</td>
													<td class="rating">

														@php
													$rating = Review::getRating($mentor->mentor_id);
													$count = sizeof($rating);
													$avg = ($count!=0)?ceil(array_sum($rating)/$count):1;
													@endphp

													@for($i=0;$i<$avg;$i++)
													<i class="fas fa-star filled"></i>
													<!-- <i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i> -->
													@endfor
													@for($i=0;$i<5-$avg;$i++)
													<i class="fas fa-star"></i>
													@endfor
													</td>
												</tr>
												@endforeach
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
						<div class="col-md-6 d-flex">
						
							<!-- Feed Activity -->
							<div class="card  card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Mentee List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>													
													<th>Mentee Name</th>
													<th>Phone</th>
													<th>Joined</th>
													<th>Paid</th>													
												</tr>
											</thead>
											<tbody>
												@foreach($mentee_list as $mentee)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="/admin/mentee-profile/{{$mentee->mentee_id}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($mentee->user->profile_image)}}" alt="User Image"></a>
															<a href="/admin/mentee-profile/{{$mentee->mentee_id}}">{{$mentee->user->first_name}}&nbsp;{{$mentee->user->last_name}}</a>
														</h2>
													</td>
													<td>{{$mentee->user->phone_number}}</td>
													<td>{{ $mentee->created_at->format('M j, Y') }}</td>
													<td class="text-right">$100.00</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Feed Activity -->
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">Booking List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Mentor Name</th>
													<th>Course</th>
													<th>Mentee Name</th>
													<th>Booking Time</th>
													<th>Status</th>
													<th class="text-right">Amount</th>
												</tr>
											</thead>
											<tbody>
												@foreach($booking_list as $booking)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="/admin/mentor-profile/{{$booking->mentor->mentor_id}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($booking->mentor->user->profile_image)}}" alt="User Image"></a>
															<a href="/admin/mentor-profile/{{$booking->mentor->mentor_id}}">{{$booking->mentor->user->first_name}}&nbsp;{{$booking->mentor->user->last_name}}</a>
														</h2>
													</td>
													<td>{{$booking->mentor->user->category_description}}</td>
													<td>
														<h2 class="table-avatar">
															<a href="/admin/mentee-profile/{{$booking->mentee->mentee_id}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($booking->mentee->user->profile_image)}}" alt="User Image"></a>
															<a href="/admin/mentee-profile/{{$booking->mentee->mentee_id}}">{{$booking->mentee->user->first_name}}&nbsp;{{$booking->mentee->user->last_name}}</a>
														</h2>
													</td>
													<td>@php 
														$time = strtotime($booking->schedule_date); 
														$newformat = date('d-M-Y',$time);
														@endphp
														{{$newformat}}<span class="text-primary d-block">{{$booking->schedule_time}}</span></td>
													<td>
														<div class="status-toggle">
															<input type="checkbox" id="status_1" class="check" checked>
															<label for="status_1" class="checktoggle">checkbox</label>
														</div>
													</td>
													<td class="text-right">
														$200.00
													</td>
												</tr>
												@endforeach
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
	   @endsection
	  