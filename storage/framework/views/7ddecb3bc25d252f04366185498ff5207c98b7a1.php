
<?php use App\Models\Review ?>
<?php $__env->startSection('content'); ?>		
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/mentee/index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
				
					<div class="row">
						<div class="col-12">
						
							<div class="card">
								<div class="card-body">
									<div class="booking-user-info">
										<a href="/profile/<?php echo e($mentor->mentor_id); ?>" class="booking-user-img">
											<img src="<?php echo e($mentor->user->profile_image); ?>" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="/profile/<?php echo e($mentor->mentor_id); ?>"><?php echo e($mentor->user->first_name); ?>&nbsp;<?php echo e($mentor->user->last_name); ?></a></h4>
											
											<p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i><?php echo e($mentor->state); ?>,<?php echo e($mentor->country); ?></p>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="row">
								<div class="col-12 col-sm-4 col-md-6">
									<h4 class="mb-1"><?php now();?></h4>
									<p class="text-muted">Monday</p>
								</div>
								<div class="col-12 col-sm-8 col-md-6 text-sm-right">
									<div class="bookingrange btn btn-white btn-sm mb-3">
										<i class="far fa-calendar-alt mr-2"></i>
										<span></span>
										<i class="fas fa-chevron-down ml-2"></i>
									</div>
								</div>
                            </div> -->
							<!-- Schedule Widget -->
							<div class="card booking-schedule schedule-widget">
							
								<!-- Schedule Header -->
								<div class="schedule-header">
									<div class="row">
										<div class="col-md-12">

											<form action="/mentee/payment-page"  method="POST">
												<?php echo csrf_field(); ?>
										
											<!-- Day Slot -->
											<div id="booking-slot" class="day-slot">
											<div class="col-12 col-md-6 justify-content-sm-center justify-content-start">
												<!-- <div class="form-group">
													<label>Choose the date</label>
													<div class="cal-icon">
														<input type="text" name="scheduled_date" class="form-control datepicker" value="">

													</div>
													

												</div> -->

												<!-- EVENT CODE -->

															
      <div id='booking-calendar'></div> 

															<!-- EVent CODE -->
												 
											</div>
												

												
												
												<!-- <ul>
													<li class="left-arrow">
														<a href="">
															<i class="fa fa-chevron-left"></i>
														</a>
													</li>
													<li>
														<span>Sun</span>
														
													</li>
													<li>
														<span>Mon</span>
														
													</li>
													<li>
														<span>Tue</span>
														
													</li>
													<li>
														<span>Wed</span>
														
													</li>
													<li>
														<span>Thu</span>
														
													</li>
													<li>
														<span>Fri</span>
														
													</li>
													<li>
														<span>Sat</span>
														
													</li>
													
													
												</ul> -->
											</div>
											<!-- /Day Slot -->
											
										</div>
									</div>
								</div>
								<!-- /Schedule Header -->
								
								<!-- Schedule Content -->
								<div class="schedule-cont">
									<div class="row">
										<div class="col-md-12">
										
											<!-- Time Slot -->
													
											<input type="hidden" id="mentor-id" name="mentor_id" value="<?php echo e($mentor->mentor_id); ?>">

											<input type="hidden" id="scheduled-start-time-id" name="scheduled_start_time" value="">

											<input type="hidden" id="scheduled-end-time-id" name="scheduled_end_time" value="">

											<input type="hidden" id="duration" name="duration" value="">

											<input type="hidden" id="event_id" name="event_id" value="">

											<!-- <input type="hidden" id="amount" name="amount" value="500"> -->

											<div id="day-slot" class="time-slot">
												


											</div>
											<!-- /Time Slot -->
											
										</div>
									</div>
								</div>
								<!-- /Schedule Content -->
								
							</div>
							<!-- /Schedule Widget -->
							
							<!-- Submit Section -->
							<div class="submit-section proceed-btn text-right">
								<button class="btn btn-primary submit-btn" id="proceed-btn" type="submit" name="form_submit" value="submit" disabled="true">Proceed to Pay</button>
							</div>
						</form>
							<!-- /Submit Section -->
							
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\topclasstutor\resources\views/mentee/booking.blade.php ENDPATH**/ ?>