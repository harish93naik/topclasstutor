@extends('layout.mainlayout_admin')
@section('content')	

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Mentee</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index_admin">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
									<li class="breadcrumb-item active">Mentee</li>
								</ul>
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
													<th>Mentee Name</th>
													<th>E-mail</th>
													<!-- <th>Member Since</th> -->
													<th>College Certificate</th>
													<th class="text-center">Account Status</th>
													
												</tr>
											</thead>
											<tbody>
												@foreach($mentee_details as $row)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="/admin/mentee-profile/{{$row->mentee_id}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset($row->user->profile_image)}}" alt="User Image"></a>
															<a href="/admin/mentee-profile/{{$row->mentee_id}}">{{$row->user->first_name}}&nbsp;{{$row->user->last_name}}</a>
														</h2>
													</td>
													<td>{{$row->user->email}}</td>

													<td><a href="{{asset($row->certificate)}}" target="_blank">View|<a href="{{asset($row->certificate)}}" download>Download</td>
													
													<!-- <td>{{ $row->created_at->format('M j, Y') }}<br></td> -->
													
													
													
													<td>
														<div class="status-toggle d-flex justify-content-center">
															@if($row->user->status=="active")
															<input type="checkbox" id="status_{{$row->mentee_id}}" data-id="{{$row->user->id}}"onchange="updateStatus(this);" class="check" checked>
															@else
															<input type="checkbox" id="status_{{$row->mentee_id}}"  data-id="{{$row->user->id}}"onchange="updateStatus(this);" class="check">
															@endif
															<label for="status_{{$row->mentee_id}}" class="checktoggle">checkbox</label>
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