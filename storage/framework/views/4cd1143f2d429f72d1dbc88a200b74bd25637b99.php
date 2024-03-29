<!-- jQuery -->

<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
		<!-- Select2 JS -->
		<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>


		<!-- Datetimepicker JS -->
		<script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/bootstrap-datetimepicker.min.js')); ?>"></script>
		

		<script src="<?php echo e(asset('assets/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
		<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
		<!-- Owl Carousel -->
		<script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>		
		<!-- Sticky Sidebar JS -->
        <script src="<?php echo e(asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')); ?>"></script>
        <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
    type="text/javascript"></script>
       

		<!-- Circle Progress JS -->
		<!-- <script src="assets/js/circle-progress.min.js"></script> -->
		<!-- Custom JS -->
		<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>





		<script>
        window.Laravel = {
            csrfToken: "<?php echo e(csrf_token()); ?>"
        };
</script>


		<?php if(Route::is(['video-call','voice-call'])): ?>
		

		<!--  <script src="https://cdn.agora.io/sdk/release/AgoraRTCSDK-3.3.1.js"></script> -->
		 
	
		<script type="text/javascript">


			$(document).ready(function(){

			//$(".call-btn").hide();
			
		//$(".call-btn")[0].click();

		});
		</script>
		<?php endif; ?>

		<?php if(\Route::current()->getName() == "edit-blog" || \Route::current()->getName() == "mentor-profile-setting"): ?>

		<script>
			$(document).ready(
    function(){debugger;
        var theValue = $('#category_id').val();
        var category = "";
         $("#category_select option[value="+theValue+"]").attr('selected', 'selected');
         category = $( "#category_select option:selected" ).text();

         $("#select2-category_select-container").attr('title',category);
         $("#select2-category_select-container").text(category);
    });
		</script>
		<?php endif; ?>


		

			<?php if(\Route::current()->getName() == 'mentor-list'): ?>
 			
 				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I"></script>
		<script src="<?php echo e(asset('assets/js/map.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/ajax-loader.js')); ?>"></script>

		<?php endif; ?>

	<!--google pay integration js file for checkout page-->

	<?php if(\Route::current()->getName() == 'payment-page'): ?>

	<script src="<?php echo e(asset('assets/js/google-pay.js')); ?>"></script>



	<script src="https://js.stripe.com/v3/"></script>

	<script src="<?php echo e(asset('assets/js/apple-pay.js')); ?>"></script>

	<script src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded()"></script>


<?php endif; ?>
	<!--google pay integration js file for checkout page ends-->

<?php if(\Route::current()->getName() == 'search'): ?>
 			
 				
		<script src="<?php echo e(asset('assets/js/mentor-search.js')); ?>"></script>


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



</script>

<?php if(\Route::current()->getName() == 'profile'): ?>

<script type="text/javascript">

	$(document).ready(function(){


	
const ratingStars = [...document.getElementsByClassName("rating__star")];
const ratingResult = document.querySelector(".rating__result");
$('#btn1').click(function() {
  // reset modal if it isn't visible
  if (!($('.modal.in').length)) {
    $('.modal-dialog').css({
      top: 0,
      left: 0
    });
  }
  $('#myModal').modal({
    backdrop: false,
    show: true
  });

  $('.modal-dialog').draggable({
    handle: ".modal-header"
  });
});

$("#about").hover(function(){
	$("#mentor-review-form").css("right","-20%");
	$("#about").css("right","-80%");
});

$('#review-cls-btn').click(function () {
      $("#mentor-review-form").css("right","-80%");
      $("#about").css("right","-50%");
     }
 ).mouseleave();

printRatingResult(ratingResult);



executeRating(ratingStars, ratingResult);

});
function executeRating(stars, result) {
   const starClassActive = "rating__star fas fa-star";
   const starClassUnactive = "rating__star far fa-star";
   const starsLength = stars.length;
   let i;
   stars.map((star) => {
      star.onclick = () => {
         i = stars.indexOf(star);

         if (star.className.indexOf(starClassUnactive) !== -1) {
            printRatingResult(result, i + 1);
            for (i; i >= 0; --i) stars[i].className = starClassActive;
         } else {
            printRatingResult(result, i);
            for (i; i < starsLength; ++i) stars[i].className = starClassUnactive;
         }
      };
   });
}


function printRatingResult(result, num = 0) {
   //result.textContent = `${num}/5`;
   $("#mentor_review").val(`${num}`);
}

</script>

<?php endif; ?><?php /**PATH G:\topclasstutor\resources\views/layout/partials/footer-scripts.blade.php ENDPATH**/ ?>