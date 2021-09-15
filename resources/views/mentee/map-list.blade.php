<?php $page="map-list";?>
@extends('layout.mainlayout')
@section('content')	
<!-- Page Content -->
<div class="content">
				<div class="container-fluid">

	            <div class="row">
					<div class="col-xl-7 col-lg-12 order-md-last order-sm-last order-last map-left">
				
						<div class="row align-items-center mb-4">
							<div class="col-md-6 col">
								<h4 id="mentor-result-heading"></h4>
							</div>
							

							<div class="col-md-6 col-auto">
								<div class="view-icons">
									<a href="map-grid" class="grid-view"><i class="fas fa-th-large"></i></a>
									<a href="map-list" class="list-view active"><i class="fas fa-bars"></i></a>
								</div>
								<div class="sort-by d-sm-block d-none">
									<span class="sortby-fliter">
										<select class="select">
											<option>Sort by</option>
											<option class="sorting">Rating</option>
											<option class="sorting">Popular</option>
											<option class="sorting">Latest</option>
											<option class="sorting">Free</option>
										</select>
									</span>
								</div>
							</div>
						</div>

						

						<div class="container">
   <div class="wrapper">
    <ul id="results"></ul>
     <div class="ajax-loading"><img src="{{ asset('images/loader.gif') }}" /></div>
   </div>
  </div>

						
							
					<div class="load-more text-center">
						<a class="btn btn-primary btn-sm" onclick="load_page()">Load More</a>	
					</div>
	            </div>
	            <!-- /content-left-->
	            <div class="col-xl-5 col-lg-12 map-right">
	                <div id="map" class="map-listing"></div>
	                <!-- map-->
	            </div>
	            <!-- /map-right-->
	        </div>

	        <!-- /row-->	
@endsection
