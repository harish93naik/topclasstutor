<?php $page="video-call";?>

<?php $__env->startSection('content'); ?>



<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/mentee/index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">My Bookings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">My Bookings</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			
			<!-- Page Content -->


			<div class="content">
				<div class="container-fluid">

						<div class="row">

							<!-- Sidebar -->
							<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
								<div class="profile-sidebar">
									<div class="user-widget">
										<div class="pro-avatar"><?php echo e(auth()->user()->first_name[0]); ?><?php echo e(auth()->user()->last_name[0]); ?></div>
										<!-- <div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
										</div> -->
										<div class="user-info-cont">
											<h4 class="usr-name"><?php echo e(auth()->user()->first_name); ?>&nbsp;<?php echo e(auth()->user()->last_name); ?></h4>
											<!-- <p class="mentor-type">English Literature (M.A)</p> -->
										</div>
									</div>
									<!-- <div class="progress-bar-custom">
										<h6>Complete your profiles ></h6>
										<div class="pro-progress">
											<div class="tooltip-toggle" tabindex="0"></div>
											<div class="tooltip">80%</div>
										</div>
									</div> -->
									<?php if(auth()->user()->role=='mentee'): ?>
									<div class="custom-sidebar-nav">
										<ul>
											<li><a href="/mentee/dashboard"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
											<li><a href="/mentee/bookings-mentee" class="active"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
										<!-- 	<li><a href="chat-mentee"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li>
											<li><a href="favourites"><i class="fas fa-star"></i>Favourites <span><i class="fas fa-chevron-right"></i></span></a></li> -->
											<li><a href="/mentee/mentor"><i class="fas fa-star"></i>Mentors <span><i class="fas fa-chevron-right"></i></span></a></li>
											<li><a href="/mentee/invoices"><i class="fas fa-file-invoice"></i>Invoices <span><i class="fas fa-chevron-right"></i></span></a></li>
											<li><a href="/profile-mentee"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
											<!-- <li><a href="login"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li> -->
										</ul>
									</div>
									<?php elseif(auth()->user()->role=='mentor'): ?>
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
									<?php else: ?>
									<?php endif; ?>
								</div>
							</div>
							<!-- /Sidebar -->

						<!-- Booking summary -->
						<div class="col-md-7 col-lg-8 col-xl-9">
							<h3 class="pb-3">Booking Summary</h3>
							<!-- Mentee List Tab -->

							<?php if($is_call==true): ?>
							  <agora-chat :allusers="<?php echo e($users); ?>" authuserid="<?php echo e(auth()->user()->id); ?>" authuser="<?php echo e(auth()->user()->first_name); ?>"
        agora_id="<?php echo e(env('AGORA_APP_ID')); ?>" />
                        <?php else: ?>
                        <h1>You have not booked for today</h1>
                        <?php endif; ?>
							
							<!-- /Mentee List Tab -->
						</div>
						<!-- /Booking summary -->

						</div>
					
				</div>
			</div>		
			<!-- /Page Content -->

         
         


			<!-- /Page Content -->	
			

			
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\topclasstutor\resources\views/video-call.blade.php ENDPATH**/ ?>