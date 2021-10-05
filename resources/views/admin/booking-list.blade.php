@extends('layout.mainlayout_admin')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Bookings</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index_admin">Dashboard</a></li>
									<li class="breadcrumb-item active">Bookings</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
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
												@foreach($booking_details as $row)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="/admin/mentor-profile/{{$row->mentor_id}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($row->mentor->user->profile_image)}}" alt="User Image"></a>
															<a href="/admin/mentor-profile/{{$row->mentor_id}}">{{$row->mentor->user->first_name}}&nbsp;{{$row->mentor->user->last_name}}</a>
														</h2>
													</td>
													<td>{{$row->mentor->user->category_description}}</td>
													<td>
														<h2 class="table-avatar">
															<a href="/admin/mentee-profile/{{$row->mentee_id}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($row->mentee->user->profile_image)}}" alt="User Image"></a>
															<a href="/admin/mentee-profile/{{$row->mentee_id}}">{{$row->mentee->user->first_name}}&nbsp;{{$row->mentee->user->last_name}}</a>
														</h2>
													</td>
													<td>{{$row->schedule_date}} <span class="text-primary d-block">{{$row->schedule_time}}</span></td>
													<td>
														<div class="appointment-action">
										@if($row->status=="pending")
										<a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
											<i class="far fa-eye"></i> View
										</a>
										<a href="/admin/appointments/{{$row->booking_id}}/accept" class="btn btn-sm bg-success-light">
											<i class="fas fa-check"></i> Accept
										</a>
										<a href="/admin/appointments/{{$row->booking_id}}/reject" class="btn btn-sm bg-danger-light">
											<i class="fas fa-times"></i> Cancel
										</a>
										@else
										<a class="{{$row->status}}">{{$row->status_description}}</a>
										@endif
									</div>
													</td>
													<td class="text-center">
														$200
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
@endsection