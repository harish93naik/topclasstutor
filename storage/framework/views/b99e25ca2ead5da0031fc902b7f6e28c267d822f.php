<?php $page="profile";?>

<?php use App\Models\Review ?>
<?php $__env->startSection('content'); ?>		
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/mentor/index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Mentor Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Mentor Profile</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-10">

							<!-- Mentor Widget -->
							<div class="card">
								<div class="card-body">
									<div class="mentor-widget">
										<div class="user-info-left align-items-center">
											<div class="mentor-img d-flex flex-wrap justify-content-center">
												<div class="pro-avatar"><?php echo e(auth()->user()->first_name[0]); ?><?php echo e(auth()->user()->last_name[0]); ?></div>
												<div class="rating text-center">
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
												<div class="mentor-details m-0">
													<p class="user-location m-0"><i class="fas fa-map-marker-alt"></i> <?php echo e($mentor_details->state); ?>,<?php echo e($mentor_details->country); ?></p>
												</div>
											</div>
											<div class="user-info-cont">
												<h4 class="usr-name"><?php echo e($user_detail->first_name); ?>&nbsp;<?php echo e($user_detail->last_name); ?></h4>
												<p class="mentor-type"><?php echo e(auth()->user()->category_description); ?>&nbsp;(<?php echo e(auth()->user()->degree); ?>)</p>
												<div class="mentor-action">
													<p class="mentor-type social-title">Contact Me</p>
													<a href="javascript:void(0)" class="btn-blue">
														<i class="fas fa-comments"></i>
													</a>
													<a href="chat" class="btn-blue">
														<i class="fas fa-envelope"></i>
													</a>
													<a href="javascript:void(0)" class="btn-blue" data-toggle="modal" data-target="#voice_call">
														<i class="fas fa-phone-alt"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="user-info-right d-flex align-items-end flex-wrap">
											<div class="hireme-btn text-center">
												<span class="hire-rate">$500 / Hour</span>
												<a class="blue-btn-radius" href="booking">Hire Me</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Mentor Widget -->
							
							<!-- Mentor Details Tab -->
							<div class="card">
								<div class="card-body custom-border-card pb-0">
								
									<!-- About Details -->
									<div class="widget about-widget custom-about mb-0">
										<h4 class="widget-title">About Me</h4>
										<hr/>
										<p><?php echo e($mentor_details->description); ?></p>
									</div>
									<!-- /About Details -->
								</div>
							</div>

							<div class="card">
								<div class="card-body custom-border-card pb-0">

									<!-- Personal Details -->
									<div class="widget education-widget mb-0">
										<h4 class="widget-title">Personal Details</h4>
										<hr/>
										<div class="experience-box">
											<ul class="experience-list profile-custom-list">
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Gender</span>
															<div class="row-result"><?php echo e($mentor_details->gender); ?></div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Date of Birth</span>
															<div class="row-result"><?php echo e($mentor_details->dob); ?></div>
														</div>
													</div>
												</li>
												<!-- <li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Where did you hear about us?</span>
															<div class="row-result">Through web search</div>
														</div>
													</div>
												</li> -->
											</ul>
										</div>
									</div>
									<!-- /Personal Details -->

								</div>
							</div>
							<!-- Qualification Details -->
							<!-- <div class="card">
								<div class="card-body custom-border-card pb-0">

									
									<div class="widget experience-widget mb-0">
										<h4 class="widget-title">Qualification</h4>
										<hr/>
										<div class="experience-box">
											<ul class="experience-list profile-custom-list">
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Undergraduate College</span>
															<div class="row-result">Coimbatore University</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Undergraduate Major</span>
															<div class="row-result">Mathematics</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Graduate College</span>
															<div class="row-result">Coimbatore University</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Type of Degree</span>
															<div class="row-result">B.Sc (Maths)</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									

								</div>
							</div> -->
<!-- /Qualification Details -->
							<div class="card">
								<div class="card-body pb-1 custom-border-card">

									<!-- Location Details -->
									<div class="widget awards-widget m-0">
										<h4 class="widget-title">Location</h4>
										<hr/>
										<div class="experience-box">
											<ul class="experience-list profile-custom-list">
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Address 1</span>
															<div class="row-result"><?php echo e($mentor_details->address1); ?></div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Address 2</span>
															<div class="row-result"><?php echo e($mentor_details->address2); ?></div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Country</span>
															<div class="row-result"><?php echo e($mentor_details->country); ?></div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>City</span>
															<div class="row-result"><?php echo e($mentor_details->city); ?></div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>State</span>
															<div class="row-result"><?php echo e($mentor_details->state); ?></div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Postal Code</span>
															<div class="row-result"><?php echo e($mentor_details->zipcode); ?></div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<!-- /Location Details -->

								</div>
							</div>
							<!-- /Mentor Details Tab -->

						</div>
					</div>
				</div>
			</div>		
			<!-- /Page Content -->
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\topclasstutor\resources\views/mentor/profile.blade.php ENDPATH**/ ?>