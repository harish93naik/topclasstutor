<?php $page="blog";?>

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
									<li class="breadcrumb-item active" aria-current="page">Blog</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Blog</h2>
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
									<div class="pro-avatar">JD</div>
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
										<li><a href="dashboard"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="bookings"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="schedule-timings"><i class="fas fa-hourglass-start"></i>Schedule Timings <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="chat"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="invoices"><i class="fas fa-file-invoice"></i>Invoices <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="reviews"><i class="fas fa-eye"></i>Reviews <span><i class="fas fa-chevron-right"></i></span></a></li>
										
										<li class="submenu"><a href="#" class="active"><i class="fab fa-blogger-b"></i>Blog <span><i class="fas fa-chevron-right"></i></span></a>
										<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('mentor/blog') ? 'active' : ''); ?>" href="<?php echo e(url('mentor/blog')); ?>"> Blog </a></li>
									<!-- <li><a class="<?php echo e(Request::is('mentor/blog-details') ? 'active' : ''); ?>" href="<?php echo e(url('admin/blog-details')); ?>"> Blog Details </a></li> -->
									<li><a class="<?php echo e(Request::is('mentor/add-blog') ? 'active' : ''); ?>" href="<?php echo e(url('mentor/add-blog')); ?>"> Add Blog </a></li>
									<!-- <li><a class="<?php echo e(Request::is('admin/edit-blog') ? 'active' : ''); ?>" href="<?php echo e(url('admin/edit-blog')); ?>"> Edit Blog </a></li> -->
								</ul></li>
										<li><a href="profile"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
										<!-- <li><a href="login"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li> -->
									</ul>
								</div>
							</div>
							<!-- /Sidebar -->

						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							
							<div class="row">
								
							<div class="col-12">

								<!-- Tab Menu -->
								<nav class="user-tabs">
									<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
										<li>
											<a class="nav-link active" href="#activeservice" data-toggle="tab">Active Blog</a>
										</li>
										<li>
											<a class="nav-link" href="#inactiveservice" data-toggle="tab">Inactive Blog</a>
										</li>
									</ul>
								</nav>
								<!-- /Tab Menu -->

								<!-- Tab Content -->
								<div class="tab-content">

									<!-- Active Content -->
									<div role="tabpanel" id="activeservice" class="tab-pane fade show active">

										<div class="row">

											<?php if($blog_details): ?>

											<?php $__currentLoopData = $blog_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="col-12 col-md-6 col-xl-4">
												<div class="course-box blog grid-blog">
													<div class="blog-image mb-0">
														<a href="blog-details"><img class="img-fluid" src="<?php echo e(asset($row->blog_image)); ?>" alt="Post Image"></a>
													</div>
													<div class="course-content">
														<span class="date"><?php echo e($row->created_at->format('M j, Y')); ?></span>
														<span class="course-title"><?php echo e($row->blog_title); ?></span>
														<p><?php echo e(substr($row->description,0,250)); ?></p>
														<div class="row">
															<div class="col">
																<a href="/mentor/edit-blog/<?php echo e($row->blog_id); ?>" class="text-success"><i class="far fa-edit"></i> Edit</a>
															</div>
															<div class="col text-right">
																<a href="/mentor/view-blog/<?php echo e($row->blog_id); ?>" class="text-danger">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
											<?php else: ?>

											<p>No blogs</p>

											<?php endif; ?>
										
										</div>

									</div>
									<!-- /Active Content -->
									
									

								</div>
								<!-- /Tab Content -->


							</div>


							</div>

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\template\resources\views/mentor/blog.blade.php ENDPATH**/ ?>