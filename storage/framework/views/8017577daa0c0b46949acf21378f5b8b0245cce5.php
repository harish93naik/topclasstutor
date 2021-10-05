<?php $page="video-call";?>

<?php $__env->startSection('content'); ?>
  <agora-chat :allusers="<?php echo e($users); ?>" authuserid="<?php echo e(auth()->user()->id); ?>" authuser="<?php echo e(auth()->user()->first_name); ?>"
        agora_id="<?php echo e(env('AGORA_APP_ID')); ?>" />
         
         


			<!-- /Page Content -->	
			

			
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\topclasstutor\resources\views/video-call.blade.php ENDPATH**/ ?>