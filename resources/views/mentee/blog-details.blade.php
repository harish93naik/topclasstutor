<?php $page="blog-details";?>
@php use App\Models\Comment; 
		use App\Models\Blog;
@endphp
@extends('layout.mainlayout')
@section('content')		
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
							<h2 class="breadcrumb-title">Blog Details</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
				
					<div class="row">
						<div class="col-lg-8 col-md-12">
							<div class="blog-view">
								<div class="blog blog-single-post">
									<div class="blog-image">
										<a href="javascript:void(0);"><img alt="" src="{{asset($blog->blog_image) }}" class="img-fluid"></a>
									</div>
									<h3 class="blog-title">{{$blog->blog_title}}</h3>
									<div class="blog-info clearfix">
										<div class="post-left">
											<ul>
												<li>
													<div class="post-author">
														<a href="/profile/{{$blog->mentor->mentor_id}}"><img src="{{$blog->mentor->user->profile_image}}" alt="Post Author"> <span>{{$blog->mentor->user->first_name}} &nbsp;{{$blog->mentor->user->last_name}}</span></a>
													</div>
												</li>
												<li><i class="far fa-calendar"></i>{{ $blog->created_at->format('M j, Y') }}</li>
												<li><i class="far fa-comments"></i>@php $count = Blog::getCount($blog->blog_id)@endphp({{$count}})Comments</li>
												<li><i class="fa fa-tags"></i></li>
											</ul>
										</div>
									</div>
									<div class="blog-content">
										<p>{{$blog->description}}</p>
									</div>
								</div>
								
								<div class="card blog-share clearfix">
									<div class="card-header">
										<h4 class="card-title">Share the post</h4>
									</div>
									<div class="card-body">
										<ul class="social-share">
											<li><a href="#" title="Facebook"><i class="fab fa-facebook"></i></a></li>
											<li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
											<li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
											<li><a href="#" title="Google Plus"><i class="fab fa-google-plus"></i></a></li>
											<li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="card author-widget clearfix">
								<div class="card-header">
									<h4 class="card-title">About Author</h4>
									</div>
								<div class="card-body">
									<div class="about-author">
										<div class="about-author-img">
											<div class="author-img-wrap">
												<a href="profile"><img class="img-fluid rounded-circle" alt="" src="assets/img/user/user1.jpg"></a>
											</div>
										</div>
										<div class="author-details">
											<a href="profile" class="blog-author-name">{{$blog->mentor->user->first_name}}&nbsp;{{$blog->mentor->user->last_name}}</a>
											<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
										</div>
									</div>
								</div>
								</div>
								<div class="card blog-comments clearfix">
									<div class="card-header">
										@php $comment_no = sizeof($comment_details)@endphp
										<h4 class="card-title">Comments ({{$comment_no}})</h4>
									</div>
									<div class="card-body pb-0">
									<ul class="comments-list">
										@foreach($comment_details as $row)
										<li>

											<div class="comment">
												<div class="comment-author">
													<img class="avatar" alt="" src="assets/img/user/user4.jpg">
												</div>
												<div class="comment-block">
													<span class="comment-by">
														<span class="blog-author-name">{{$row->commentor_name}}</span>
													</span>
													<p>{{$row->comment}}</p>
													<p class="blog-date">{{$row->created_at}}</p>
													<a class="comment-btn" onclick="getCommentId(this)" data-comment="{{$row->comment_id}}" href="#comment-div">
														<i class="fas fa-reply"></i> Reply
													</a>
												</div>
											</div>
											@php 
												$replies = Comment::getReplies($row->comment_id);

											@endphp
											@if($replies)
												
											<ul class="comments-list reply">
												@foreach($replies as $reply)
												<li>
													<div class="comment">
														<div class="comment-author">
															<img class="avatar" alt="" src="assets/img/user/user5.jpg">
														</div>
														<div class="comment-block">
															<span class="comment-by">
																<span class="blog-author-name">{{$reply->commentor_name}}</span>
															</span>
															<p>{{$reply->comment}}</p>
															<p class="blog-date">{{$reply->created_at}}</p>
													<a class="comment-btn" onclick="getCommentId(this)" data-comment="{{$row->comment_id}}" href="#comment-div">
														<i class="fas fa-reply"></i> Reply
													</a>
														</div>
													</div>
												</li>
												@endforeach
												
											</ul> 	
											@endif
										</li>
										@endforeach
										
									</ul>
								</div>
								</div>
								
								<div class="card new-comment clearfix" id="comment-div">
									<div class="card-header">
										<h4 class="card-title">Leave Comment</h4>
									</div>
									<div class="card-body">
										<form action="/comment-save/{{$blog->blog_id}}" method="POST">
											@csrf
											<div class="form-group">
												<label>Name <span class="text-danger">*</span></label>
												<input type="text" name="form[commentor_name]" class="form-control">
											</div>
											<input type="hidden" id="parent-commentor-id" name="parent_comment_id" value="">
											<div class="form-group">
												<label>Your Email Address <span class="text-danger">*</span></label>
												<input type="email" name="form[commentor_email]" class="form-control">
											</div>
											<div class="form-group">
												<label>Comments</label>
												<textarea rows="4" name="form[comment]" class="form-control"></textarea>
											</div>
											<div class="submit-section">
												<button class="btn btn-primary submit-btn" type="submit">Submit</button>
											</div>
										</form>
									</div>
								</div>
								
							</div>
						</div>
					
						<!-- Blog Sidebar -->
						<div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

							<!-- Search -->
							<div class="card search-widget">
								<div class="card-body">
									<form class="search-form">
										<div class="input-group">
											<input type="text" placeholder="Search..." class="form-control">
											<div class="input-group-append">
												<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- /Search -->

							<!-- Latest Posts -->
							<div class="card post-widget">
								<div class="card-header">
									<h4 class="card-title">Latest Posts</h4>
								</div>
								<div class="card-body">
									<ul class="latest-posts">
										@foreach($blog_details as $row)
										<li>
											<div class="post-thumb">
												<a href="/blog-details/{{$row->blog_id}}">
													<img class="img-fluid" src="{{asset($row->blog_image) }}" alt="">
												</a>
											</div>
											<div class="post-info">
												<h4>
													<a href="/blog-details/{{$row->blog_id}}">{{substr($row->description,0,20)}}</a>
												</h4>
												<p>{{ $row->created_at->format('M j, Y') }}</p>
											</div>
										</li>
										@endforeach
										
									</ul>
								</div>
							</div>
							<!-- /Latest Posts -->

							<!-- Categories -->
							<!-- <div class="card category-widget">
								<div class="card-header">
									<h4 class="card-title">Blog Categories</h4>
								</div>
								<div class="card-body">
									<ul class="categories">
										<li><a href="#">HTML <span>(62)</span></a></li>
										<li><a href="#">Css <span>(27)</span></a></li>
										<li><a href="#">Java Script <span>(41)</span></a></li>
										<li><a href="#">Photoshop <span>(16)</span></a></li>
										<li><a href="#">Wordpress <span>(55)</span></a></li>
										<li><a href="#">VB <span>(07)</span></a></li>
									</ul>
								</div>
							</div> -->
							<!-- /Categories -->

							<!-- Tags -->
							<!-- <div class="card tags-widget">
								<div class="card-header">
									<h4 class="card-title">Tags</h4>
								</div>
								<div class="card-body">
									<ul class="tags">
										<li><a href="#" class="tag">HTML</a></li>
										<li><a href="#" class="tag">Css</a></li>
										<li><a href="#" class="tag">Java Script</a></li>
										<li><a href="#" class="tag">Jquery</a></li>
										<li><a href="#" class="tag">Wordpress</a></li>
										<li><a href="#" class="tag">Php</a></li>
										<li><a href="#" class="tag">Angular js</a></li>
										<li><a href="#" class="tag">React js</a></li>
										<li><a href="#" class="tag">Vue js</a></li>
										<li><a href="#" class="tag">Photoshop</a></li>
										<li><a href="#" class="tag">Ajax</a></li>
										<li><a href="#" class="tag">Json</a></li>
										<li><a href="#" class="tag">C</a></li>
										<li><a href="#" class="tag">C++</a></li>
										<li><a href="#" class="tag">Vb</a></li>
										<li><a href="#" class="tag">Vb.net</a></li>
										<li><a href="#" class="tag">Asp.net</a></li>
									</ul>
								</div>
							</div> -->
							<!-- /Tags -->
							
						</div>
						<!-- /Blog Sidebar -->
						
                </div>
				</div>

			</div>		
			<!-- /Page Content -->
@endsection