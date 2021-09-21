<?php $page="edit-blog";?>
@extends('layout.mainlayout_admin')
@section('content')	
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
						
						
						<div class="col-md-7 col-lg-8 col-xl-9 custom-edit-service">
							
							<div class="row">
								<div class="col-12">
									<div class="card">
										<div class="card-body">	
											<h3 class="pb-3">Edit Blog</h3>
							
											<form method="POST" action="/admin/update-blog/{{$blog->blog_id}}"  enctype="multipart/form-data">
												@csrf
												<div class="service-fields mb-3">
													<h4 class="heading-2">Service Information</h4>
													<div class="row">
														<div class="col-lg-12">
															<div class="form-group">
																<label>Blog Title <span class="text-danger">*</span></label>
																<input class="form-control" type="text" name="form[blog_title]" value="{{$blog->blog_title}}">
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
																<input type="hidden" id="category_id" value="{{$blog->blog_category}}">
																<select class="form-control select" name="form[blog_category]" id="category_select"> 
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
																<textarea id="about" class="form-control service-desc" name="form[description]">{{$blog->description}}</textarea>
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
																<input type="file" name="content_file" id="images">
															
															</div>	
															
															
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
@endsection