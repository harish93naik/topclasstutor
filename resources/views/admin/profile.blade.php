@extends('layout.mainlayout_admin')
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">My Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index_admin">Dashboard</a></li>
									<li class="breadcrumb-item active">My Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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

						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="../assets_admin/img/profiles/avatar-12.jpg">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0">{{$user_detail->first_name}}&nbsp;{{$user_detail->last_name}}</h4>
										<h6 class="text-muted">{{$user_detail->email}}</h6>
										<div class="pb-3"><i class="fa fa-map-marker"></i>@if($admin_info){{$admin_info->state}},{{$admin_info->country}}@endif</div>
										<!-- <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div> -->
									</div>
									<div class="col-auto profile-btn">
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted mb-0 mb-sm-3">Name</p>
														<p class="col-sm-10">{{$user_detail->first_name}}&nbsp;{{$user_detail->last_name}}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-10">@if($admin_info){{$admin_info->dob}}@endif</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-10">{{$user_detail->email}}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-10">{{$user_detail->phone_number}}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted mb-0">Address</p>
														<p class="col-sm-10 mb-0">@if($admin_info){{$admin_info->address}}<br>
														{{$admin_info->city}},<br>
														{{$admin_info->state}} - {{$admin_info->zipcode}},<br>
														{{$admin_info->country}}.@endif</p>
													</div>
												</div>
											</div>
										
											
										</div>

									
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form action="/admin/password-reset" method="POST">
														@csrf
														<div class="form-group">
															<label>Old Password</label>
															<input type="password" name="current_password" class="form-control">
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" name="new_password" class="form-control">
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" name="confirm_password" class="form-control">
														</div>
														<button class="btn btn-primary" type="submit">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
            <!-- Edit Details Modal -->
		<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document" >
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Personal Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="/admin/profile/update">
							@csrf
							<div class="row form-row">
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>First Name</label>
										<input type="text" name="user_form[first_name]" class="form-control" value="{{$user_detail->first_name}}">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Last Name</label>
										<input type="text" name="user_form[last_name]" class="form-control" value="{{$user_detail->last_name}}">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label>Date of Birth</label>
										<div class="cal-icon">
											<input type="text" name="info_form[dob]" class="form-control" value="@if($admin_info){{$admin_info->dob}}@endif">
										</div>
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Email ID</label>
										<input type="email" class="form-control" name="user_form[email]" value="{{$user_detail->email}}">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Mobile</label>
										<input type="text" name="user_form[phone_number]" value="{{$user_detail->phone_number}}" class="form-control">
									</div>
								</div>
								<div class="col-12">
									<h5 class="form-title"><span>Address</span></h5>
								</div>
								<div class="col-12">
									<div class="form-group">
									<label>Address</label>
										<input type="text" name="info_form[address]" class="form-control" value="@if($admin_info){{$admin_info->address}}@endif">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>City</label>
										<input type="text" name="info_form[city]" class="form-control" value="@if($admin_info){{$admin_info->city}}@endif">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>State</label>
										<input type="text" class="form-control" name="info_form[state]" value="@if($admin_info){{$admin_info->state}}@endif">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Zip Code</label>
										<input type="text" class="form-control" name="info_form[zipcode]" value="@if($admin_info){{$admin_info->zipcode}}@endif">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label>Country</label>
										<input type="text" class="form-control" name="info_form[country]" value="@if($admin_info){{$admin_info->country}}@endif">
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Details Modal -->	
@endsection