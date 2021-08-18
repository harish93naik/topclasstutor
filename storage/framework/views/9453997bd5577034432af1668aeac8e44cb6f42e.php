<?php $page="video-call";?>

<?php $__env->startSection('content'); ?>
<video-chat :allusers="<?php echo e($users); ?>" :authUserId="<?php echo e(auth()->id()); ?>" turn_url="<?php echo e(env('TURN_SERVER_URL')); ?>"
        turn_username="<?php echo e(env('TURN_SERVER_USERNAME')); ?>" turn_credential="<?php echo e(env('TURN_SERVER_CREDENTIAL')); ?>" />
         
         


			<!-- /Page Content -->	

			
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\template\resources\views/video-call.blade.php ENDPATH**/ ?>