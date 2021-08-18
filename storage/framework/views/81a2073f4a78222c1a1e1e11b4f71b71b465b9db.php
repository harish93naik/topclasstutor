<?php $page="profile-settings";?>

<?php $__env->startSection('content'); ?>	
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
					
						<!-- Profile Sidebar -->
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
											<h4 class="usr-name"><?php echo e(auth()->user()->first_name); ?>&nbsp;<?php echo e(auth()->user()->last_name); ?></h4>
										<p class="mentee-type">English Literature (M.A)</p>
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
										<li><a href="/mentee/dashboard"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentee/bookings-mentee"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentee/schedule-timings"><i class="fas fa-hourglass-start"></i>Schedule Timings <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentee/chat"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentee/invoices"><i class="fas fa-file-invoice"></i>Invoices <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentee/blog"><i class="fab fa-blogger-b"></i>Blog <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentee/profile" class="active"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
										<!-- <li><a href="login"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li> -->
									</ul>
								</div>
							</div>
							<!-- /Sidebar -->

						</div>
						<!-- /Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form --> 
									<form method="POST" action="/mentee/profile/update" enctype="multipart/form-data">
										<?php echo csrf_field(); ?>
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="<?php echo e(asset(auth()->user()->profile_image)); ?>" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" name="content_file" class="upload">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" name="user_form[first_name]" class="form-control" value="<?php echo e($user_detail->first_name); ?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" name="user_form[last_name]" class="form-control" value="<?php echo e($user_detail->last_name); ?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Date of Birth</label>
													<div class="cal-icon">
														<input type="text" name="mentee_form[dob]" class="form-control datetimepicker" value="<?php echo e($mentee_details->dob); ?>">
													</div>
												</div>
											</div>
											<!-- <div class="col-12 col-md-6">
												<div class="form-group">
													<label>Blood Group</label>
													<select class="form-control select" name="mentee_form[blood_group]">
														<option>A-</option>
														<option>A+</option>
														<option>B-</option>
														<option>B+</option>
														<option>AB-</option>
														<option>AB+</option>
														<option>O-</option>
														<option>O+</option>
													</select>
												</div>
											</div> -->
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<input type="email" name="user_form[email]" class="form-control" value="<?php echo e($user_detail->email); ?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Mobile</label>
													<input type="text" name="user_form[phone_number]" value="<?php echo e($user_detail->phone_number); ?>" class="form-control">
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
												<label>Address1</label>
													<input type="text" name="mentee_form[address1]" class="form-control" value="<?php echo e($mentee_details->address1); ?>">
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
												<label>Address2</label>
													<input type="text" name="mentee_form[address2]" class="form-control" value="<?php echo e($mentee_details->address2); ?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" name="mentee_form[city]" class="form-control" value="<?php echo e($mentee_details->city); ?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>State</label>
													<input type="text" name="mentee_form[state]" class="form-control" value="<?php echo e($mentee_details->state); ?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Zip Code</label>
													<input type="text" name="mentee_form[zipcode]" class="form-control" value="<?php echo e($mentee_details->zipcode); ?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" name="mentee_form[country]" class="form-control" value="<?php echo e($mentee_details->country); ?>">
												</div>
											</div>
										</div>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->
									
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\template\resources\views/mentee/profile-settings.blade.php ENDPATH**/ ?>