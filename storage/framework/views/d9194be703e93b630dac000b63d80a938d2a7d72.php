<!-- jQuery -->

<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
		<!-- Select2 JS -->
		<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
		<!-- Datetimepicker JS -->
		<script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/bootstrap-datetimepicker.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
		<!-- Owl Carousel -->
		<script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>		
		<!-- Sticky Sidebar JS -->
        <script src="<?php echo e(asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')); ?>"></script>
		<!-- Circle Progress JS -->
		<!-- <script src="assets/js/circle-progress.min.js"></script> -->
		<!-- Custom JS -->
		<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>


		<?php if(Route::is(['video-call','voice-call'])): ?>

		<script type="text/javascript">

			$(document).ready(function(){

			//$(".call-btn").hide();
			
			$(".call-btn")[0].click();

		});
		</script>
		<?php endif; ?>


		

			<?php if(\Route::current()->getName() == 'mentor-list'): ?>
 			
 				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I"></script>
		<script src="<?php echo e(asset('assets/js/map.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/ajax-loader.js')); ?>"></script>

		<?php endif; ?>

		
		
		<?php if(Route::is(['map-grid','map-list','mentee/mentor'])): ?>
		
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I"></script>
		<script src="<?php echo e(asset('assets/js/map.js')); ?>"></script>
		<!-- <script src="<?php echo e(asset('assets/js/ajax-loader.js')); ?>"></script> -->

		<?php endif; ?>
		<script type="text/javascript">
			
			$(".edit-link").click(function(){

				$("#week-day").val($(this).attr('data-value'));

				
			})

</script><?php /**PATH G:\template\resources\views/layout/partials/footer-scripts.blade.php ENDPATH**/ ?>