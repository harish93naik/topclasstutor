
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
															<a href="/admin/mentor-profile/<?php echo e($row->mentor_id); ?>" class="avatar avatar-sm mr-2">
																<?php if($row->mentor->user->profile_image!=null): ?>
																<img class="avatar-img rounded-circle" src="<?php echo e(asset($row->mentor->user->profile_image)); ?>" alt="User Image">
																<?php else: ?>
																<img class="rounded-circle" src="/assets/img/user/user.png" width="30" alt="<?php echo e($row->mentor->user->first_name); ?>">
																<?php endif; ?>
																</a>
															<a href="/admin/mentor-profile/<?php echo e($row->mentor_id); ?>"><?php echo e($row->mentor->user->first_name); ?>&nbsp;<?php echo e($row->mentor->user->last_name); ?></a>
														</h2>
													</td>
													<td><?php echo e($row->mentor->user->category_description); ?></td>
													<td>
														<h2 class="table-avatar">
															<a href="/admin/mentee-profile/<?php echo e($row->mentee_id); ?>" class="avatar avatar-sm mr-2">
																<?php if($row->mentee->user->profile_image!=null): ?>
																<img class="avatar-img rounded-circle" src="<?php echo e(asset($row->mentee->user->profile_image)); ?>" alt="User Image">
															<?php else: ?>
																<img class="rounded-circle" src="/assets/img/user/user.png" width="30" alt="<?php echo e($row->mentee->user->first_name); ?>">
															<?php endif; ?>
															</a>
															<a href="/admin/mentee-profile/<?php echo e($row->mentee_id); ?>"><?php echo e($row->mentee->user->first_name); ?>&nbsp;<?php echo e($row->mentee->user->last_name); ?></a>
														</h2>
													</td>
													<td><?php echo e($row->schedule_date); ?> <span class="text-primary d-block"><?php echo e($row->schedule_time); ?></span></td>
													<td>
														<div class="appointment-action">
										<?php if($row->status=="accept"): ?>
										<a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
											<i class="far fa-eye"></i> View
										</a>
										<!-- <a href="/admin/appointments/<?php echo e($row->booking_id); ?>/accept" class="btn btn-sm bg-success-light">
											<i class="fas fa-check"></i> Accept
										</a> -->
										<a href="/admin/appointments/<?php echo e($row->booking_id); ?>/reject" class="btn btn-sm bg-danger-light">
											<i class="fas fa-times"></i> Cancel
										</a>
										<?php else: ?>
										<a class="<?php echo e($row->status); ?>"><?php echo e($row->status_description); ?></a>
										<?php endif; ?>
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
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\topclasstutor\resources\views/admin/booking-list.blade.php ENDPATH**/ ?>