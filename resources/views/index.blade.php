@extends('layout.mainlayout')
@php use App\Models\Review @endphp
@section('content')		
		<!-- Home Banner -->
		<section class="section section-search">
				<div class="container">
					<div class="banner-wrapper m-auto text-center">
						<div class="banner-header">
							<h1>Search Teacher in <span>Mentoring Appointment</span></h1>
							<p>Discover the best Mentors & institutions the city nearest to you.</p>
						</div>
                         
						<!-- Search -->
					<!-- 	<div class="search-box">
							<form action="search">
								<div class="form-group search-location">
									<input type="text" class="form-control" placeholder="Search Location">
								</div>
								<div class="form-group search-info">
									<input type="text" class="form-control" placeholder="Search School, Online educational centers, etc">
								</div>
								<button type="submit" class="btn btn-primary search-btn"><i><img src="assets/img/search-submit.png" alt=""></i> <span>Search</span></button>
							</form>
						</div> -->
						<!-- /Search -->
						
					</div>
				</div>
			</section>
			<!-- /Home Banner -->

			<section class="section how-it-works">
				<div class="container">
					<div class="section-header text-center">
						<span>Mentoring Flow</span>
						<h2>How does it works ?</h2>
						<p class="sub-title">Are you looking to join online institutions? Now it's very simple, Sign up with mentoring</p>
					</div>
					<div class="row">
						<div class="col-12 col-md-6 col-lg-4">
							<div class="feature-box text-center">					
								<div class="feature-header">
									<div class="feature-icon">
										<span class="circle"></span>
										<i><img src="assets/img/icon-1.png" alt=""></i>
									</div>		
									<div class="feature-cont">	
										<div class="feature-text">Sign up</div>
									</div>
								</div>
								<p class="mb-0">Are you looking to join online Learning? Now it's very simple, Now Sign up</p>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="feature-box text-center">					
								<div class="feature-header">
									<div class="feature-icon">
										<span class="circle"></span>
										<i><img src="assets/img/icon-2.png" alt=""></i>
									</div>	
									<div class="feature-cont">
										<div class="feature-text">Collaborate</div>
									</div>
								</div>
								<p class="mb-0">Collaborate on your own timing, by scheduling with mentor booking</p>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="feature-box text-center">					
								<div class="feature-header">
									<div class="feature-icon">
										<span class="circle"></span>
										<i><img src="assets/img/icon-3.png" alt=""></i>
									</div>	
									<div class="feature-cont">
										<div class="feature-text">Improve & Get Back</div>
									</div>
								</div>
								<p class="mb-0">you can gather different skill set, and you can become mentor too</p>
							</div>
						</div>
						
					</div>
				</div>
			</section>

			<section class="section popular-courses">
				<div class="container">
					<div class="section-header text-center">
						<span>Mentoring Goals</span>
						<h2>Popular Mentors</h2>
						<p class="sub-title">Do you want to move on next step? Choose your most popular leaning mentors, it will help you to achieve your professional goals.</p>
					</div>
					<div class="owl-carousel owl-theme">

						@foreach($mentor_details as $row)
				
						<div class="course-box">
							<div class="product">
								<div class="product-img">
									<a href="/profile/{{$row->mentor_id}}">
										<img class="img-fluid" alt="" src="{{asset($row->user->profile_image)}}" width="600" height="300">
									</a>
								</div>
								<div class="product-content">
									<h3 class="title"><a href="/profile/{{$row->mentor_id}}">{{$row->user->first_name}}&nbsp;{{$row->user->last_name}}</a></h3>
									<div class="author-info">
										<div class="author-name">
											{{$row->user->category_description}}({{$row->user->degree}})
										</div>
									</div>
									<div class="rating">							
										@php
													$rating = Review::getRating($row->mentor_id);
													$count = sizeof($rating);
													$avg = ($count!=0)?ceil(array_sum($rating)/$count):1;
													@endphp

													@for($i=0;$i<$avg;$i++)
													<i class="fas fa-star filled"></i>
													
													@endfor
													@for($i=0;$i<5-$avg;$i++)
													<i class="fas fa-star"></i>
													@endfor
										<span class="d-inline-block average-rating">{{$avg}}</span>
									</div>
									<div class="author-country">
										<p class="mb-0"><i class="fas fa-map-marker-alt"></i>{{$row->state}}, {{$row->country}}</p>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
					
					</div>
				</div>
			</section>

			<!-- Path section start -->
			<!-- <section class="section path-section">
				<div class="section-header text-center">
					<div class="container">
						<span>Choose the</span>
						<h2>Different All Learning Paths</h2>
						<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
					</div>
				</div>
				<div class="learning-path-col">
					<div class="container">
						<div class="row">
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?segment=intermediate" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/english.png" alt="">
											<div class="text-col">
												<h5>Primary</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?category=mathematics" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/mathematics.jpeg" alt="">
											<div class="text-col">
												<h5>Mathematics</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?category=physics" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/physics.png" alt="">
											<div class="text-col">
												<h5>Physics</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?category=chemistry" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/chemistry.jpg" alt="">
											<div class="text-col">
												<h5>Chemistry</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?category=technology" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/edtech.png" alt="">
											<div class="text-col">
												<h5>Technology-Education</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?category=science" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/science.jpg" alt="">
											<div class="text-col">
												<h5>Science</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?category=sports" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/sports.jpg" alt="">
											<div class="text-col">
												<h5>Sports</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?category=geography" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/geography.jpg" alt="">
											<div class="text-col">
												<h5>Geography</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="view-all text-center"><a href="search" class="btn btn-primary">View All</a></div>						
					</div>
				</div>
			</section> -->

			<section class="section path-section">
				<div class="section-header text-center">
					<div class="container">
						<span>Choose the</span>
						<h2>Different All Learning Paths</h2>
						
					</div>
				</div>
				<div class="learning-path-col">
					<div class="container">
						<div class="row">
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?segment=primary" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/english.png" alt="">
											<div class="text-col">
												<h5>Primary</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?segment=intermediate" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/mathematics.jpeg" alt="">
											<div class="text-col">
												<h5>Intermediate</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?segment=secondary" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/physics.png" alt="">
											<div class="text-col">
												<h5>Secondary</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?segment=under_graduate" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/chemistry.jpg" alt="">
											<div class="text-col">
												<h5>Under Graduate</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?segment=graduate" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/edtech.png" alt="">
											<div class="text-col">
												<h5>Graduate</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?segment=post_graduate" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/science.jpg" alt="">
											<div class="text-col">
												<h5>Post Graduate</h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-4 col-lg-3">
								<div class="large-col">
									<a href="search?segment=doctorate" class="large-col-image">
										<div class="image-col-merge">
											<img src="assets/img/sports.jpg" alt="">
											<div class="text-col">
												<h5>Doctoral Study </h5>
											</div>
										</div>
									</a>
								</div>
							</div>
							
						</div>
						<div class="view-all text-center"><a href="search" class="btn btn-primary">View All</a></div>						
					</div>
				</div>
			</section>
			<!-- Path section end -->


			
			<!-- Blog Section -->
		   <section class="section section-blogs">
				<div class="container">
				
					<!-- Section Header -->
					<div class="section-header text-center">
						
						<h2>The Blogs & News</h2>
						
					</div>
					<!-- /Section Header -->
					
					<div class="row blog-grid-row">
						@foreach($blog_details as $row)
						<div class="col-md-6 col-lg-3 col-sm-12">
						
							<!-- Blog Post -->
							
							<div class="blog grid-blog">
								<div class="blog-image">
									<a href="/blog-details/{{$row->blog_id}}"><img class="img-fluid" src="{{asset($row->blog_image) }}" alt="Post Image"></a>
								</div>
								<div class="blog-content">
									<ul class="entry-meta meta-item">
										<li>
											<div class="post-author">
												<a href="/profile/{{$row->mentor_id}}"><span>{{$row->mentor->user->first_name}}&nbsp;{{$row->mentor->user->last_name}}</span></a>
											</div>
										</li>
										<li><i class="far fa-clock"></i>{{ $row->created_at->format('M j, Y') }}</li>
									</ul>
									<h3 class="blog-title"><a href="/blog-details/{{$row->blog_id}}">{{$row->blog_title}}</a></h3>
									<p class="mb-0">{{$row->blog_description}}</p>
								</div>
							</div>
							
							<!-- /Blog Post -->
							
						</div>
						@endforeach
						
					</div>
					<div class="view-all text-center"> 
						<a href="blog-list" class="btn btn-primary">View All</a>
					</div>
				</div>
			</section>
			<!-- /Blog Section -->	

			<!-- Statistics Section -->
			<section class="section statistics-section">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-4">
							<div class="statistics-list text-center">
								<span>500+</span>
								<h3>Happy Clients</h3>
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div class="statistics-list text-center">
								<span>120+</span>
								<h3>Online Appointments</h3>
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div class="statistics-list text-center">
								<span>100%</span>
								<h3>Job Satisfaction</h3>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Statistics Section -->
	   @endsection
	  