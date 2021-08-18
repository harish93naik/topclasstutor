
<?php $__env->startSection('content'); ?>		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Blog</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index_admin">Dashboard</a></li>
									<li class="breadcrumb-item active">Blog</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">

									<!-- Blog list -->
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
																<a href="/admin/view-blog/<?php echo e($row->blog_id); ?>" class="text-danger">
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
										
									<!-- /Blog list -->

								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\template\resources\views/admin/blog.blade.php ENDPATH**/ ?>