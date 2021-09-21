@extends('layout.mainlayout_admin')
@section('content')		
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
										@if($blog_details)

											@foreach($blog_details as $row)
											<div class="col-12 col-md-6 col-xl-4">
												<div class="course-box blog grid-blog">
													<div class="blog-image mb-0">
														<a href="blog-details"><img class="img-fluid" src="{{asset($row->blog_image) }}" alt="Post Image"></a>
													</div>
													<div class="course-content">
														<span class="date">{{ $row->created_at->format('M j, Y') }}</span>
														<span class="course-title">{{$row->blog_title}}</span>
														<p>{{substr($row->description,0,250)}}</p>
														<div class="row">
															<div class="col">
																<a href="/admin/edit-blog/{{$row->blog_id}}" class="text-success"><i class="far fa-edit"></i> Edit</a>
															</div>
															<div class="col text-right">
																<a href="/admin/view-blog/{{$row->blog_id}}" class="text-danger">
																	<i class="far fa-eye"></i> View
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											@endforeach
											
											@else

											<p>No blogs</p>

											@endif
										
									<!-- /Blog list -->

								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
@endsection