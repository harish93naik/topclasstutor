
<?php use App\Models\Review;
	use App\Models\Mentor;
 ?>
<?php $__env->startSection('content'); ?>		
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/mentor/index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Appointments</li>
								</ol>
							</nav>
							<!-- <h2 class="breadcrumb-title">Appointments</h2> -->
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
									<div class="pro-avatar"><?php echo e(auth()->user()->first_name[0]); ?><?php echo e(auth()->user()->last_name[0]); ?></div>
									
									<div class="user-info-cont">
										<h4 class="usr-name"><h4 class="usr-name"><?php echo e(auth()->user()->first_name); ?>&nbsp;<?php echo e(auth()->user()->last_name); ?></h4></h4>
										<p class="mentor-type"><?php echo e(auth()->user()->degree); ?></p>
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
										<li><a href="/mentor/appointments" class="active"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/schedule-timings"><i class="fas fa-hourglass-start"></i>Schedule Timings <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/chat"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/invoices"><i class="fas fa-file-invoice"></i>Invoices <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/reviews"><i class="fas fa-eye"></i>Reviews <span><i class="fas fa-chevron-right"></i></span></a></li>
										<!-- <li><a href="/mentor/blog"><i class="fab fa-blogger-b"></i>Blog <span><i class="fas fa-chevron-right"></i></span></a></li> -->
										<li><a href="/mentor/profile"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
										<!-- <li><a href="login"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li> -->
									</ul>
								</div>
							</div>
							<!-- /Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="appointments">
							
							<?php if(sizeof($booking_details)!=0): ?>
								<!-- Appointment List -->
								<?php $__currentLoopData = $booking_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="appointment-list">
									<div class="profile-info-widget">
										<a href="profile-mentee" class="booking-user-img">
											<img src="<?php echo e(asset($row->mentee->user->profile_image)); ?>" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><a href="profile-mentee"><?php echo e($row->mentee->user->first_name); ?>&nbsp;<?php echo e($row->mentee->user->last_name); ?></a></h3>
											<div class="mentee-details">
												<h5><i class="far fa-clock"></i><?php echo e($row->schedule_date); ?>, <?php echo e($row->schedule_time); ?></h5>
												<h5><i class="fas fa-map-marker-alt"></i><?php echo e($row->mentee->state); ?>, <?php echo e($row->mentee->country); ?></h5>
												<h5><i class="fas fa-envelope"></i><?php echo e($row->mentee->user->email); ?></h5>
												<h5 class="mb-0"><i class="fas fa-phone"></i> <?php echo e($row->mentee->user->phone_number); ?></h5>
											</div>
										</div>
									</div>
									<div class="appointment-action">
										<?php if($row->status=="accept"): ?> 
														<td class="text-center"><a href="<?php echo e($row->meeting_url); ?>"target="_blank">&nbsp;Call Here&nbsp;<i class="fas fa-phone-alt"></i></a></span>
														<?php else: ?>
														<td class="text-center"><span class="<?php echo e($row->status); ?>"><?php echo e($row->status_description); ?></span></td>
														<?php endif; ?>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<div class="row">
								<div class="col-md-12">
									<div class="blog-pagination">
										<div class="d-flex justify-content-center">
    								<?php echo $booking_details->links(); ?>

										</div>
									</div>
								</div>
								<?php else: ?>
							<h3>Currently No Bookings</h3>
							<?php endif; ?>
							</div>
							
								<!-- /Appointment List -->
							
								
								
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\topclasstutor\resources\views/mentor/appointments.blade.php ENDPATH**/ ?>