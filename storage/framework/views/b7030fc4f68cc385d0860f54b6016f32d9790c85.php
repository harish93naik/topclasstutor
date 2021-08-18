
<?php $__env->startSection('content'); ?>	

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Blog Details</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Blog Details</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">

									<!-- Blog details -->
									<div class="row">
									
										<div class="col-12 blog-details">
											<span class="course-title"><?php echo e($blog->blog_title); ?></span>
											<div class="d-flex flex-wrap date-col">
												<span class="date"><i class="fas fa-calendar-check"></i><?php echo e($blog->created_at); ?></span>
												<span class="author"><i class="fe fe-user"></i> By <?php echo e($blog->mentor->user->first_name); ?>&nbsp;<?php echo e($blog->mentor->user->last_name); ?></span>
											</div>
											<div class="blog-details-img">
												<img class="img-fluid" src="../assets_admin/img/blog/blog-01.jpg" alt="Post Image">
											</div>
											<div class="blog-content">
												<?php echo e($blog->description); ?>

											</div>
										</div>
										
									</div>
									<!-- /Blog details -->

								</div>
							</div>

							<!-- Share post -->
							<div class="card">
								<div class="card-body">
									<h4>Share the post</h4>
									<ul class="share-post">
										<li>
											<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
										</li>
										<li>
											<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
										</li>
										<li>
											<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
										</li>
										<li>
											<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
										</li>
										<li>
											<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
										</li>
									</ul>
								</div>
							</div>
							<!-- /Share post -->

							<!-- About Author -->
							<div class="card">
								<div class="card-body">
									<h4>About author</h4>
									<div class="about-author pt-4 d-flex align-items-center">
										<div class="left">
											<img class="rounded-circle" src="../assets_admin/img/profiles/avatar-12.jpg" width="120" alt="Ryan Taylor">
										</div>
										<div class="right">
											<h5>Linda Barrett</h5>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										</div>
									</div>
								</div>
							</div>
							<!-- /About Author -->

						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\template\resources\views/admin/blog-details.blade.php ENDPATH**/ ?>