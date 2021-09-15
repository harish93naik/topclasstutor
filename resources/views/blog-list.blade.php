<?php $page="blog-list";?>
@extends('layout.mainlayout')
@php
use App\Models\Blog;
@endphp
@section('content')		
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Blog</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Blog List</h2>
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

							<!-- Blog Post -->
							@foreach($blog_details as $row)
							<div class="blog">
								<div class="blog-image">
									<a href="blog-details/{{$row->blog_id}}"><img class="img-fluid" src="{{asset($row->blog_image) }}" alt="Post Image"></a>
								</div>
								<h3 class="blog-title"><a href="blog-details">{{$row->blog_title}}</a></h3>
								<div class="blog-info clearfix">
									<div class="post-left">
										<ul>
											<li>
												<div class="post-author">
													<a href="profile"><img src="{{$row->mentor->user->profile_image}}" alt="Post Author"> <span>{{$row->mentor->user->first_name}}&nbsp;{{$row->mentor->user->last_name}}</span></a>
												</div>
											</li>
											<li><i class="far fa-clock"></i>{{ $row->created_at->format('M j, Y') }}</li>
											<li><i class="far fa-comments"></i>@php $count = Blog::getCount($row->blog_id)@endphp({{$count}})Comments</li>
											<li><i class="fa fa-tags"></i>{{$row->blog_category}}</li>
										</ul>
									</div>
								</div>
								<div class="blog-content">
									<p>
            	{{substr($row->description,0,250)}}</p>
									<a href="blog-details/{{$row->blog_id}}" class="read-more">Read More</a>
								</div>
							</div>
							@endforeach


							<!-- /Blog Post -->

							
							<!-- Blog Pagination -->
							<div class="row">
								<div class="col-md-12">
									<div class="blog-pagination">
										<div class="d-flex justify-content-center">
    								{!! $blog_details->links() !!}
										</div>
									</div>
								</div>
							</div>
							<!-- /Blog Pagination -->
							
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
										@foreach($latest_blog as $row)
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