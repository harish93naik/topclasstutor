<?php $page="blog";?>

<?php $__env->startSection('content'); ?>	
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/mentee/index">Home</a></li>
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
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star"></i>
									</div>
									<div class="user-info-cont">
										<h4 class="usr-name"><h4 class="usr-name"><?php echo e(auth()->user()->first_name); ?>&nbsp;<?php echo e(auth()->user()->last_name); ?></h4></h4>
										<p class="mentor-type">English Literature (M.A)</p>
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
										<li><a href="dashboard" ><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="bookings-mentee"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="chat-mentee"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="favourites"><i class="fas fa-star"></i>Favourites <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="/mentee/mentor"><i class="fas fa-star"></i>Mentors <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="/mentee/invoices"><i class="fas fa-file-invoice"></i>Invoices <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="/mentee/blog" class="active"><i class="fas fa-star"></i>Blog<span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="profile"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
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
														<a href="blog-details"><img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt="Post Image"></a>
													</div>
													<div class="course-content">
														<span class="date"><?php echo e($row->created_at); ?></span>
														<span class="course-title"><?php echo e($row->blog_title); ?></span>
														<p><?php echo e($row->description); ?></p>
														<div class="row">
															<div class="col text-right">
																<a href="/mentee/view-blog/<?php echo e($row->blog_id); ?>" class="text-success">
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
									
									<!-- Inactive Content -->
									<div role="tabpanel" id="inactiveservice" class="tab-pane fade">
									
										<div class="row">
											<div class="col-12 col-md-6 col-xl-4">
												<div class="course-box blog grid-blog">
													<div class="blog-image mb-0">
														<a href="blog-details"><img class="img-fluid" src="assets/img/blog/blog-04.jpg" alt="Post Image"></a>
													</div>
													<div class="course-content">
														<span class="date">April 09 2020</span>
														<span class="course-title">Abacus Study for beginner - Part III</span>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
														<div class="row">
															<div class="col">
																<a href="edit-blog" class="text-success">
																	<i class="far fa-edit"></i> Edit
																</a>
															</div>
															<div class="col text-right">
																<a href="javascript:void(0);" class="text-success">
																	<i class="fas fa-toggle-on"></i> Active
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6 col-xl-4">
												<div class="course-box blog grid-blog">
													<div class="blog-image mb-0">
														<a href="blog-details"><img class="img-fluid" src="assets/img/blog/blog-05.jpg" alt="Post Image"></a>
													</div>
													<div class="course-content">
														<span class="date">April 09 2020</span>
														<span class="course-title">Abacus Study for beginner - Part III</span>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
														<div class="row">
															<div class="col">
																<a href="edit-blog" class="text-success">
																	<i class="far fa-edit"></i> Edit
																</a>
															</div>
															<div class="col text-right">
																<a href="javascript:void(0);" class="text-success">
																	<i class="fas fa-toggle-on"></i> Active
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6 col-xl-4">
												<div class="course-box blog grid-blog">
													<div class="blog-image mb-0">
														<a href="blog-details"><img class="img-fluid" src="assets/img/blog/blog-06.jpg" alt="Post Image"></a>
													</div>
													<div class="course-content">
														<span class="date">April 09 2020</span>
														<span class="course-title">Abacus Study for beginner - Part III</span>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
														<div class="row">
															<div class="col">
																<a href="edit-blog" class="text-success">
																	<i class="far fa-edit"></i> Edit
																</a>
															</div>
															<div class="col text-right">
																<a href="javascript:void(0);" class="text-success">
																	<i class="fas fa-toggle-on"></i> Active
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6 col-xl-4">
												<div class="course-box blog grid-blog">
													<div class="blog-image mb-0">
														<a href="blog-details"><img class="img-fluid" src="assets/img/blog/blog-07.jpg" alt="Post Image"></a>
													</div>
													<div class="course-content">
														<span class="date">April 09 2020</span>
														<span class="course-title">Abacus Study for beginner - Part III</span>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
														<div class="row">
															<div class="col">
																<a href="edit-blog" class="text-success">
																	<i class="far fa-edit"></i> Edit
																</a>
															</div>
															<div class="col text-right">
																<a href="javascript:void(0);" class="text-success">
																	<i class="fas fa-toggle-on"></i> Active
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6 col-xl-4">
												<div class="course-box blog grid-blog">
													<div class="blog-image mb-0">
														<a href="blog-details"><img class="img-fluid" src="assets/img/blog/blog-08.jpg" alt="Post Image"></a>
													</div>
													<div class="course-content">
														<span class="date">April 09 2020</span>
														<span class="course-title">Abacus Study for beginner - Part III</span>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
														<div class="row">
															<div class="col">
																<a href="edit-blog" class="text-success">
																	<i class="far fa-edit"></i> Edit
																</a>
															</div>
															<div class="col text-right">
																<a href="javascript:void(0);" class="text-success">
																	<i class="fas fa-toggle-on"></i> Active
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6 col-xl-4">
												<div class="course-box blog grid-blog">
													<div class="blog-image mb-0">
														<a href="blog-details"><img class="img-fluid" src="assets/img/blog/blog-09.jpg" alt="Post Image"></a>
													</div>
													<div class="course-content">
														<span class="date">April 09 2020</span>
														<span class="course-title">Abacus Study for beginner - Part III</span>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
														<div class="row">
															<div class="col">
																<a href="edit-blog" class="text-success">
																	<i class="far fa-edit"></i> Edit
																</a>
															</div>
															<div class="col text-right">
																<a href="javascript:void(0);" class="text-success">
																	<i class="fas fa-toggle-on"></i> Active
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
									<!-- /Inactive Content -->

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
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\template\resources\views/mentee/blog.blade.php ENDPATH**/ ?>