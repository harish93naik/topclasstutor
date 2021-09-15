<?php $page="invoice";?>

<?php $__env->startSection('content'); ?>	
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/mentee/index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Invoices</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Invoices</h2>
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
								<div class="pro-avatar"><?php echo e(auth()->user()->first_name[0]); ?><?php echo e(auth()->user()->last_name[0]); ?></div>
								<!-- <div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
								</div> -->
								<div class="user-info-cont">
									<h4 class="usr-name"><?php echo e(auth()->user()->first_name); ?>&nbsp;<?php echo e(auth()->user()->last_name); ?></h4>
									<!-- <p class="mentor-type">English Literature (M.A)</p> -->
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
									<li><a href="dashboard" ><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="bookings-mentee"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="chat-mentee"><i class="fas fa-comments"></i>Messages <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="favourites"><i class="fas fa-star"></i>Favourites <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="/mentee/mentor"><i class="fas fa-star"></i>Mentors <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="/mentee/invoices" class="active"><i class="fas fa-file-invoice"></i>Invoices <span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="/mentee/blog"><i class="fas fa-star"></i>Blog<span><i class="fas fa-chevron-right"></i></span></a></li>
									<li><a href="profile"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
									<!-- <li><a href="login"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li> -->
								</ul>
							</div>
						</div>
						<!-- /Sidebar -->

						</div>
						
					<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card card-table">
								<div class="card-body">
								
									<!-- Invoice Table -->
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Invoice No</th>
													<th>Mentor</th>
													<th>Amount</th>
													<th>Paid On</th>
													<!-- <th></th> -->
												</tr>
											</thead>
											<tbody>
												<?php $__currentLoopData = $invoice_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td>
														<a href="invoice-view/<?php echo e($row->invoice_id); ?>">#INV-<?php echo e($row->invoice_id); ?></a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="/profile/<?php echo e($row->booking->mentor->mentor_id); ?>" class="avatar avatar-sm mr-2">
																<img class="avatar-img rounded-circle" src="<?php echo e($row->booking->mentor->user->profile_image); ?>" alt="User Image">
															</a>
															<a href="/profile/<?php echo e($row->booking->mentor->mentor_id); ?>"><?php echo e($row->booking->mentor->user->first_name); ?>&nbsp;<?php echo e($row->booking->mentor->user->last_name); ?></a>
														</h2>
													</td>
													<td>$<?php echo e($row->amount); ?></td>
													<td><?php echo e($row->created_at); ?></td>
													<!-- <td class="text-right">
														<div class="table-action">
															<a href="invoice-view/<?php echo e($row->invoice_id); ?>" class="btn btn-sm bg-info-light">
																<i class="far fa-eye"></i> View
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-primary-light" download>
																<i class="fas fa-print"></i> Print
															</a>
														</div>
													</td> -->
												</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												
											</tbody>
										</table>
									</div>
									<!-- /Invoice Table -->
									
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\template\resources\views/mentee/invoices.blade.php ENDPATH**/ ?>