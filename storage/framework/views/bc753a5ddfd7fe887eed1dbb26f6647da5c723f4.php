<?php $page="mentor-register";?>

<?php $__env->startSection('content'); ?>		
	<!-- Page Content -->
    <div class="content">
				<div class="container-fluid">
					<div class="row">
                        <?php
                           var_dump($booking_array);
                        ?>

						 <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Date of Birth')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                               <div class="cal-icon">
                                                        <input type="text" id="date_of_birth" name="mentee_form[dob]" class="form-control datetimepicker" value="">
                                                    </div>

                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                   <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\topclasstutor\resources\views/meeting.blade.php ENDPATH**/ ?>