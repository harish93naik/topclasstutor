
<?php $__env->startSection('content'); ?>		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Bookings</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index_admin">Dashboard</a></li>
									<li class="breadcrumb-item active">Bookings</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Mentor Name</th>
													<th>Course</th>
													<th>Mentee Name</th>
													<th>Booking Time</th>
													<th>Status</th>
													<th class="text-right">Amount</th>
												</tr>
											</thead>
											<tbody>
												<?php $__currentLoopData = $booking_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="/admin/mentor-profile/<?php echo e($row->mentor_id); ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo e(asset($row->mentor->user->profile_image)); ?>" alt="User Image"></a>
															<a href="/admin/mentor-profile/<?php echo e($row->mentor_id); ?>"><?php echo e($row->mentor->user->first_name); ?>&nbsp;<?php echo e($row->mentor->user->last_name); ?></a>
														</h2>
													</td>
													<td><?php echo e($row->mentor->user->category_description); ?></td>
													<td>
														<h2 class="table-avatar">
															<a href="/admin/mentee-profile/<?php echo e($row->mentee_id); ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo e(asset($row->mentee->user->profile_image)); ?>" alt="User Image"></a>
															<a href="/admin/mentee-profile/<?php echo e($row->mentee_id); ?>"><?php echo e($row->mentee->user->first_name); ?>&nbsp;<?php echo e($row->mentee->user->last_name); ?></a>
														</h2>
													</td>
													<td><?php echo e($row->schedule_date); ?> <span class="text-primary d-block"><?php echo e($row->schedule_time); ?></span></td>
													<td>
														<div class="status-toggle">
															<input type="checkbox" id="status_1" class="check" checked>
															<label for="status_1" class="checktoggle">checkbox</label>
														</div>
													</td>
													<td class="text-center">
														$200
													</td>
												</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\template\resources\views/admin/booking-list.blade.php ENDPATH**/ ?>