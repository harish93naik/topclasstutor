<?php $page="reviews";?>

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
									<li class="breadcrumb-item"><a href="index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Reviews</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Reviews</h2>
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
									<div class="rating">
										<?php
													$mentor_details = Mentor::where('user_id',auth()->user()->id)->first();
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
										<p class="mentor-type"><?php echo e(auth()->user()->category_description); ?>(<?php echo e(auth()->user()->degree); ?>)</p>
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
										<li><a href="/mentor/reviews" class="active"><i class="fas fa-eye"></i>Reviews <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/blog"><i class="fab fa-blogger-b"></i>Blog <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/profile"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
										<!-- <li><a href="login"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li> -->
									</ul>
								</div>
							</div>
							<!-- /Sidebar -->
							
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="doc-review review-listing">
							
								<!-- Review Listing -->
								<ul class="comments-list">

									<?php $__currentLoopData = $review_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								
									<!-- Comment List -->
									<li>
										<div class="comment">
											<img class="avatar rounded-circle" alt="User Image" src="<?php echo e(asset($row->mentee->user->profile_image)); ?>">
											<div class="comment-body">
												<div class="meta-data">
													<span class="comment-author"><?php echo e($row->mentee->user->first_name); ?>&nbsp;<?php echo e($row->mentee->user->last_name); ?></span>
													<span class="comment-date">Reviewed on <?php echo e($row->created_at->format('M j, Y')); ?></span>
													<div class="review-count rating">
														

													<?php for($i=0;$i<$row->rating;$i++): ?>
													<i class="fas fa-star filled"></i>
													<!-- <i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i> -->
													<?php endfor; ?>
													<?php for($i=0;$i<5-$row->rating;$i++): ?>
													<i class="fas fa-star"></i>
													<?php endfor; ?>

													</div>
												</div>
												<!-- <p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the consectetur</p> -->
												<p class="comment-content">
													<?php echo e($row->review); ?>

												</p>
											
											</div>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										
									
								</ul>
								<!-- /Comment List -->
								
							</div>
						</div>
						<div class="row">
								<div class="col-md-12">
									<div class="blog-pagination">
										<div class="d-flex justify-content-center">
    								<?php echo $review_details->links(); ?>

										</div>
									</div>
								</div>
							</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\template\resources\views/mentor/reviews.blade.php ENDPATH**/ ?>