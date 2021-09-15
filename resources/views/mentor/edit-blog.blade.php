<?php $page="edit-blog";?>
@extends('layout.mainlayout')
@php use App\Models\Review;
	use App\Models\Mentor;
 @endphp
@section('content')		
	<!-- Breadcrumb -->
    <div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/mentor/index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Edit Blog</h2>
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
									<div class="pro-avatar">{{auth()->user()->first_name[0]}}{{auth()->user()->last_name[0]}}</div>
									<div class="rating">
										@php
													$mentor_details = Mentor::where('user_id',auth()->user()->id)->first();
													$rating = Review::getRating($mentor_details->mentor_id);
													$count = sizeof($rating);
													$avg = ($count!=0)?ceil(array_sum($rating)/$count):1;
													@endphp

													@for($i=0;$i<$avg;$i++)
													<i class="fas fa-star filled"></i>
													<!-- <i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i> -->
													@endfor
													@for($i=0;$i<5-$avg;$i++)
													<i class="fas fa-star"></i>
													@endfor
									</div>
									<div class="user-info-cont">
										<h4 class="usr-name">{{$user_detail->first_name}}&nbsp;{{$user_detail->last_name}}</h4>
										<p class="mentor-type">{{auth()->user()->course_name}}</p>
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
										<li><a href="/mentor/reviews"><i class="fas fa-eye"></i>Reviews <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/blog"  class="active"><i class="fab fa-blogger-b"></i>Blog <span><i class="fas fa-chevron-right"></i></span></a></li>
										<li><a href="/mentor/profile"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
										
									</ul>
								</div>
							</div>
							<!-- /Sidebar -->

						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9 custom-edit-service">
							
							<div class="row">
								<div class="col-12">
									<div class="card">
										<div class="card-body">	
											<h3 class="pb-3">Edit Blog</h3>
							
											<form method="POST" action="/mentor/update-blog/{{$blog->blog_id}}"  enctype="multipart/form-data">
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