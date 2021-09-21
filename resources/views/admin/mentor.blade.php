+
@extends('layout.mainlayout_admin')
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Mentor</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index_admin">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
									<li class="breadcrumb-item active">Mentor</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
							<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						Actions
					</a>
					<div class="dropdown-menu">
						
						<a class="dropdown-item" href="/admin/mentor/add">Add Mentor</a>
						<!-- <a class="dropdown-item" href="settings">Settings</a> -->
						
					</div>
				</li>
							</div>
					</div>
				</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Mentor Name</th>
													<th>Course</th>
													<th>Member Since</th>
													<th>E-mail</th>
													<!-- <th>Earned</th> -->
													<th>Resume</th>
													<th class="text-center">Account Status</th>
													
												</tr>
											</thead>
											<tbody>
												@foreach($mentor_details as $row)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="/admin/mentor-profile/{{$row->mentor_id}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($row->user->profile_image)}}" alt="User Image"></a>
															<a href="/admin/mentor-profile/{{$row->mentor_id}}">{{$row->user->first_name}}&nbsp;{{$row->user->last_name}}</a>
														</h2>
													</td>
													<td>{{$row->user->degree}}</td>
													
													<td>{{ $row->created_at->format('M j, Y') }}<br></td>

													<td>{{$row->user->email}}</td>

													<td><a href="{{asset($row->user->resume)}}" target="_blank">View|<a href="{{asset($row->user->resume)}}" download>Download</td>
													
													<!-- <td>{{$row->user->resume}}</td> -->
													<!-- <td>$3100</td> -->
													
													<td>
														<div class="status-toggle d-flex justify-content-center">
															@if($row->user->status=="active")
															<input type="checkbox" id="status_{{$row->mentor_id}}" data-id="{{$row->user->id}}"onchange="updateStatus(this);" class="check" checked>
															@else
															<input type="checkbox" id="status_{{$row->mentor_id}}" data-id="{{$row->user->id}}"onchange="updateStatus(this);" class="check">
															@endif
															<label for="status_{{$row->mentor_id}}" class="checktoggle">checkbox</label>
														</div>
													</td>
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
			<!-- /Page Wrapper -->	
@endsection