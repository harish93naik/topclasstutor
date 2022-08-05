<?php $page="profile";?>
@extends('layout.mainlayout')
@php use App\Models\Review @endphp
@section('content')		
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Mentor Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Mentor Profile</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-10">

							<!-- Mentor Widget -->
							<div class="card">
								<div class="card-body">
									<div class="mentor-widget">
										<div class="user-info-left align-items-center">
											<div class="mentor-img d-flex flex-wrap justify-content-center">
												<div class="pro-avatar">{{$mentor->user->first_name[0]}}{{$mentor->user->last_name[0]}}</div>
												
												<div class="mentor-details m-0">
													<p class="user-location m-0"><i class="fas fa-map-marker-alt"></i> {{$mentor->state}}, {{$mentor->country}}</p>
												</div>
											</div>
											<div class="user-info-cont">
												<h4 class="usr-name">{{$mentor->user->first_name}}&nbsp;{{$mentor->user->last_name}}</h4>
												<p class="mentor-type">{{$mentor->user->degree}}</p>
											
											</div>
										</div>
										<div class="user-info-right d-flex align-items-end flex-wrap">
											<div class="hireme-btn text-center">
												<span class="hire-rate">$500 / Hour</span>

<br />
												<!-- <a class="blue-btn-radius" href="booking">Hire Me</a> -->
											</div>
										</div>
									</div>
								</div>
							</div>
							
							
							<!-- Mentor Details Tab -->
							<div class="card">
								<div class="card-body custom-border-card pb-0">

									
							

								
									<!-- About Details -->
									<div class="widget about-widget custom-about mb-0">
										<h4 class="widget-title">About Me</h4>
										<hr/>
										<p>{{$mentor->user->description}}</p>
									</div>
									<!-- /About Details -->
								</div>
							</div>

							<div class="card">
								<div class="card-body custom-border-card pb-0">

									<!-- Personal Details -->
									<div class="widget education-widget mb-0">
										<h4 class="widget-title">Personal Details</h4>
										<hr/>
										<div class="experience-box">
											<ul class="experience-list profile-custom-list">
												
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Date of Birth</span>
															<div class="row-result">{{$mentor->dob}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Phone Number</span>
															<div class="row-result">{{$mentor->user->phone_number}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>E-mail</span>
															<div class="row-result">{{$mentor->user->email}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Category</span>
															<div class="row-result mentor-category">{{$mentor->user->category}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Language Spoken/Written</span>
															<div class="row-result mentor-language-known">{{$mentor->language_spoken}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Bank A/c Number</span>
															<div class="row-result">{{$mentor->acc_no}}</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<!-- /Personal Details -->

								</div>
							</div>

							<div class="card">
								<div class="card-body custom-border-card pb-0">

									 Qualification Details 
									<div class="widget experience-widget mb-0">
										<h4 class="widget-title">Qualification</h4>
										<hr/>
										<div class="experience-box">
											<ul class="experience-list profile-custom-list">
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Degree</span>
															<div class="row-result">{{$mentor->user->degree}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Teacher Registration No</span>
															<div class="row-result">{{$mentor->trn_no}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Teacher Registration No Expiry Date</span>
															<div class="row-result">{{$mentor->exp_date}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Tutoring Experience</span>
															<div class="row-result">{{$mentor->tutoring_exp}}</div>
														</div>
													</div>
												</li>

												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>IRD No</span>
															<div class="row-result">{{$mentor->ird_no}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Mileage Report</span>
															<div class="row-result">@if($mentor->mileage_report!=null)

													<a href="{{asset($mentor->mileage_report)}}" target="_blank">View</a>|<a href="{{asset($mentor->mileage_report)}}" download>Download</a>
													@else
													No Preview
													@endif</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Lesson Plan</span>
															<div class="row-result">@if($mentor->lesson_plan!=null)

													<a href="{{asset($mentor->lesson_plan)}}" target="_blank">View</a>|<a href="{{asset($mentor->lesson_plan)}}" download>Download</a>
													@else
													No Preview
													@endif</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Supporting Resource to Lesson Plan</span>
															<div class="row-result">@if($mentor->lesson_plan!=null)

													<a href="{{asset($mentor->resource_lesson_plan)}}" target="_blank">View</a>|<a href="{{asset($mentor->resource_lesson_plan)}}" download>Download</a>
													@else
													No Preview
													@endif</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>resume</span>
															<div class="row-result">@if($mentor->user->resume!=null)

													<a href="{{asset($mentor->user->resume)}}" target="_blank">View</a>|<a href="{{asset($mentor->user->resume)}}" download>Download</a>
													@else
													No Preview
													@endif</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<!-- Qualification Details -->

								</div>
							</div>

							<div class="card">
								<div class="card-body pb-1 custom-border-card">

									<!-- Location Details -->
									<div class="widget awards-widget m-0">
										<h4 class="widget-title">Location</h4>
										<hr/>
										<div class="experience-box">
											<ul class="experience-list profile-custom-list">
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Address 1</span>
															<div class="row-result">{{$mentor->address1}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Address 2</span>
															<div class="row-result">{{$mentor->address2}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Country</span>
															<div class="row-result">{{$mentor->country}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>City</span>
															<div class="row-result">{{$mentor->city}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>State</span>
															<div class="row-result">{{$mentor->state}}</div>
														</div>
													</div>
												</li>
												<li>
													<div class="experience-content">
														<div class="timeline-content">
															<span>Postal Code</span>
															<div class="row-result">{{$mentor->zipcode}}</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<!-- /Location Details -->

								</div>
							</div>
							

							<!-- /Mentor Details Tab -->

						</div>
					</div>
				</div>
			</div>	
			




			<!-- /Page Content -->
   
@endsection