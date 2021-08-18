<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $__env->make('layout.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>
  <?php if(Route::is(['map-grid'])): ?>
  <body class="map-page">
  <?php endif; ?>
  <?php if(Route::is(['mentor-register','login','register','mentee-register'])): ?>
  <body class="account-page">
  <?php endif; ?>
  <?php if(Route::is(['chat-mentee','chat'])): ?>
  <body class="chat-page">
  <?php endif; ?>
  <?php if(Route::is(['voice-call','video-call'])): ?>
  <body class="call-page">
  <?php endif; ?>
  <?php if(!Route::is(['login','register','forgot-password'])): ?>
<?php echo $__env->make('layout.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->yieldContent('content'); ?>
<?php if(!Route::is(['chat','chat-mentee','voice-call','video-call','login','register','forgot-password'])): ?>
<?php echo $__env->make('layout.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->make('layout.partials.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html><?php /**PATH C:\xampp\htdocs\Mentoring_laravel\template\resources\views/layout/mainlayout.blade.php ENDPATH**/ ?>