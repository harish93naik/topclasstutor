<?php $page="search";?>

<?php use App\Models\Review ?>
<?php $__env->startSection('content'); ?>		

			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Search</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title"></h2>
						</div>
						<!-- <div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">Sort by</span>
								<span class="sortby-fliter">
									<select class="select">
										<option>Select</option>
										<option class="sorting">Rating</option>
										<option class="sorting">Popular</option>
										<option class="sorting">Latest</option>
										<option class="sorting">Free</option>
									</select>
								</span>
							</div>
						</div> -->
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
								<div class="card-body">
								<!-- <div class="filter-widget">
									<div class="cal-icon">
										<input type="text" class="form-control datetimepicker" placeholder="Select Date">
									</div>			
								</div> -->
								<!-- <form action="search">
									<?php echo csrf_field(); ?> -->
								<!-- <div class="filter-widget">
									<h4>Gender</h4>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type">
											<span class="checkmark"></span> Male
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type">
											<span class="checkmark"></span> Female
										</label>
									</div>
								</div> -->
								<div class="filter-widget">
									<!-- <h4>Select Courses</h4>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="english" name="select_specialist[]">
											<span class="checkmark"></span> English

										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="mathematics" name="select_specialist[]">
											<span class="checkmark"></span> Mathematics
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="physics" name="select_specialist[]">
											<span class="checkmark"></span> Physics
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="chemistry" name="select_specialist[]">
											<span class="checkmark"></span> Chemistry
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="technology" name="select_specialist[]">
											<span class="checkmark"></span>Technology Education
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="science" name="select_specialist[]">
											<span class="checkmark"></span>Science
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="sports" name="select_specialist[]">
											<span class="checkmark"></span>Sports
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="geography" name="select_specialist[]">
											<span class="checkmark"></span>Geography
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="history" name="select_specialist[]">
											<span class="checkmark"></span>History
										</label>
									</div> -->
									<h4>Select Segment</h4>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="primary" name="select_segment[]">
											<span class="checkmark"></span> Primary

										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="intermediate" name="select_segment[]">
											<span class="checkmark"></span> Intermediate
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="secondary" name="select_segment[]">
											<span class="checkmark"></span> Secondary
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="under_graduate" name="select_segment[]">
											<span class="checkmark"></span> Under Graduate
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="graduate" name="select_segment[]">
											<span class="checkmark"></span>Graduate
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="post_graduate" name="select_segment[]">
											<span class="checkmark"></span>Post Graduate
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" value="doctorate" name="select_segment[]">
											<span class="checkmark"></span>Doctoral Study
										</label>
									</div>
									<!-- <div>
										<label class="custom_check">
											<input type="checkbox" value="geography" name="select_specialist[]">
											<span class="checkmark"></span>Geography
										</label>
									</div> -->
									<!-- <div>
										<label class="custom_check">
											<input type="checkbox" value="history" name="select_specialist[]">
											<span class="checkmark"></span>History
										</label>
									</div> -->
								</div>

								<form action="/search"  id="sidebar-filter-form">
									<?php echo csrf_field(); ?>
									<input type="hidden" name="categories" value="" id="categories"/>

							

									<div class="btn-search">
										<button type="button" class="btn btn-block" onclick="filter_category()" >Search</button>
									</div>	
										</form>
								<!-- </form> -->
								</div>
							</div>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9">
							<div class="col-md-6 col align-items-center">
								<h4 id="mentor-result-heading"></h4>
							</div>

							<div id="mentor-list">

							<!-- Mentor Widget -->
							

						</div>
						<div class="ajax-loading"><img src="<?php echo e(asset('images/loader.gif')); ?>" /></div>

						
							<div class="load-more text-center">
						<a class="btn btn-primary btn-sm" onclick="load_mentor_page()">Load More</a>	
					</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\template\resources\views/search.blade.php ENDPATH**/ ?>