<?php $page="add-blog";?>

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
					
			
			<!-- Page Content -->
			<!-- <div class="content">
				<div class="container-fluid"> -->

					<div class="row">
						
						
						<div class="col-md-7 col-lg-8 col-xl-9 custom-edit-service">
							
							<div class="row">
								<div class="col-12">
									<div class="card">
										<div class="card-body">	
											<h3 class="pb-3">Add Blog</h3>
							
											<form method="POST" action="/admin/save-blog" enctype="multipart/form-data">
												<?php echo csrf_field(); ?>
												<div class="service-fields mb-3">
													<h4 class="heading-2">Service Information</h4>
													<div class="row">
														<div class="col-lg-12">
															<div class="form-group">
																<label>Blog Title <span class="text-danger">*</span></label>
																<input class="form-control" type="text" name="form[blog_title]" value="">
															</div>
														</div>
													</div>
												</div>
												
												<div class="service-fields mb-3">
													<h4 class="heading-2">Blog Category</h4>
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<label>Category <span class="text-danger">*</span></label>
																<select class="form-control select" name="form[blog_category]"> 
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
														
													</div>
												</div>
												
												<div class="service-fields mb-3">
													<h4 class="heading-2">Blog Details</h4>
													<div class="row">
														<div class="col-lg-12">
															<div class="form-group">
																<label>Descriptions <span class="text-danger">*</span></label>
																<textarea id="about" class="form-control service-desc" name="form[description]"></textarea>
																<input type="hidden" name="form[admin_info_id]" value="<?php echo e($admin_info->admin_info_id); ?>">
															</div>
														</div>
													</div>
												</div>
												
												<div class="service-fields mb-3">
													<h4 class="heading-2">Blog Images </h4>
													<div class="row">
														<div class="col-lg-12">
															<div class="service-upload">
																<i class="fas fa-cloud-upload-alt"></i>
																<span>Upload Blog Image *</span>
																<input type="file" name="content_file" id="images" required>
															
															</div>	
															<!-- <div id="uploadPreview">
																<ul class="upload-wrap">
																	<li>
																		<div class="upload-images">

																			<img alt="" src="assets/img/blog/blog-thumb-01.jpg">
																		</div>
																	</li>
																	<li>
																		<div class="upload-images">

																			<img alt="" src="assets/img/blog/blog-thumb-02.jpg">
																		</div>
																	</li>
																	<li>
																		<div class="upload-images">

																			<img alt="" src="assets/img/blog/blog-thumb-03.jpg">
																		</div>
																	</li>
																</ul>
															</div> -->
															
														</div>
													</div>
												</div>
												<div class="submit-section">
													<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
												</div>
											</form>

										</div>
									</div>
								</div>


							</div>

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\topclasstutor\resources\views/admin/add-blog.blade.php ENDPATH**/ ?>