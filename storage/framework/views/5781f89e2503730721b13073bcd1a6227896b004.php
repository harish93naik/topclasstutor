
<?php $__env->startSection('content'); ?>	

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Mentee</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index_admin">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
									<li class="breadcrumb-item active">Mentee</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Mentee Name</th>
													<th>E-mail</th>
													<!-- <th>Member Since</th> -->
													<!-- <th>College Certificate</th> -->
													<th class="text-center">Account Status</th>
													
												</tr>
											</thead>
											<tbody>
												<?php $__currentLoopData = $mentee_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td>
														<h2 class="table-avatar">

															<a href="/admin/mentee-profile/<?php echo e($row->mentee_id); ?>" class="avatar avatar-sm mr-2"><?php if($row->user->profile_image!=null): ?>
									<img class="rounded-circle" src="<?php echo e(asset($row->user->profile_image)); ?>" width="31" alt="<?php echo e($row->user->first_name); ?>">
									<?php else: ?>
									<img class="rounded-circle" src="/assets/img/user/user.png" width="31" alt="<?php echo e($row->user->first_name); ?>">
									<?php endif; ?><!-- <img class="avatar-img rounded-circle" src="<?php echo e(asset($row->user->profile_image)); ?>" alt="User Image"> --></a>
															<a href="/admin/mentee-profile/<?php echo e($row->mentee_id); ?>"><?php echo e($row->user->first_name); ?>&nbsp;<?php echo e($row->user->last_name); ?></a>
														</h2>
													</td>
													<td><?php echo e($row->user->email); ?></td>

												
													
													<!-- <td><?php echo e($row->created_at->format('M j, Y')); ?><br></td> -->
													
													
													
													<td>
														<div class="status-toggle d-flex justify-content-center">
															<?php if($row->user->status=="active"): ?>
															<input type="checkbox" id="status_<?php echo e($row->mentee_id); ?>" data-id="<?php echo e($row->user->id); ?>"onchange="updateStatus(this);" class="check" checked>
															<?php else: ?>
															<input type="checkbox" id="status_<?php echo e($row->mentee_id); ?>"  data-id="<?php echo e($row->user->id); ?>"onchange="updateStatus(this);" class="check">
															<?php endif; ?>
															<label for="status_<?php echo e($row->mentee_id); ?>" class="checktoggle">checkbox</label>
														</div>
													</td>
												</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\topclasstutor\resources\views/admin/mentee.blade.php ENDPATH**/ ?>