<?php $page="profile-settings";?>

<?php use\App\Models\Review; ?>
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
									<div class="pro-avatar"><?php echo e(auth()->user()->first_name[0]); ?><?php echo e(auth()->user()->last_name[0]); ?></div>
									<div class="rating">
										<?php
													$rating = Review::getRating($mentor_details->mentor_id);
													$count = sizeof($rating);
													$avg = ($count!=0)?ceil(array_sum($rating)/$count):1;
													?>

													<?php for($i=0;$i<$avg;$i++): ?>
													<i class="fas fa-star filled"></i>
													<!-- <i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i> -->
													<?php endfor; ?>
													<?php for($i=0;$i<5-$avg;$i++): ?>
													<i class="fas fa-star"></i>
													<?php endfor; ?>
									</div>
									<div class="user-info-cont">
										<h4 class="usr-name"><?php echo e(auth()->user()->first_name); ?>&nbsp;<?php echo e(auth()->user()->last_name); ?></h4>
										<p class="mentor-type"><?php echo e(auth()->user()->course_name); ?></p>
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
										<li><a href="/mentor/schedule-timings"><i class="fas fa-hourglass-start"></i>Schedule Timings <span><i class="fas fa-chevron-right"></i></span></a></li>
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
						<!-- /Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
									<form method="POST" action="/mentor/profile/update" enctype="multipart/form-data">
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
																<input type="file" name="content_file" accept="application/pdf" class="upload">
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
														<input type="text" name="mentor_form[dob]" class="form-control datetimepicker" value="<?php echo e($mentor_details->dob); ?>">
													</div>
												</div>
											</div>
											<div class="col-6 col-md-3">
												<div class="form-group">
													
													
																<label>Category</label>
																<input type="hidden" id="category_id" value="<?php echo e($user_detail->category); ?>">
																<select class="form-control select" name="user_form[category]" id="category_select"> 
																	<option value="">Select Category..</option>
																	<option value="english">English</option>
																	<option value="mathematics">Mathematics</option>
																	<option value="physics">Physics</option>
																	<option value="chemistry">Chemistry</option>
																	<option value="technology">Technoogy-Education</option>
																	<option value="science">Science</option>
																	<option value="education">Education</option>
																	<option value="sports">Sports</option>
																	<option value="geography">Geography</option>
																	<option value="history">History</option>
																	
																</select>
															
												</div>
											</div>
											<div class="col-6 col-md-3">
												<div class="form-group">
													<label>Degree</label>
													<input type="text" name="user_form[degree]" class="form-control" value="<?php echo e($user_detail->degree); ?>">
												</div>
											</div>
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
													<input type="text" name="mentor_form[address1]" class="form-control" value="<?php echo e($mentor_details->address1); ?>">
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
												<label>Address2</label>
													<input type="text" name="mentor_form[address2]" class="form-control" value="<?php echo e($mentor_details->address2); ?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" name="mentor_form[city]" class="form-control" value="<?php echo e($mentor_details->city); ?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>State</label>
													<input type="text" name="mentor_form[state]" class="form-control" value="<?php echo e($mentor_details->state); ?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Zip Code</label>
													<input type="text" name="mentor_form[zipcode]" class="form-control" value="<?php echo e($mentor_details->zipcode); ?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" name="mentor_form[country]" class="form-control" value="<?php echo e($mentor_details->country); ?>">
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
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\topclasstutor\resources\views/mentor/profile-settings.blade.php ENDPATH**/ ?>