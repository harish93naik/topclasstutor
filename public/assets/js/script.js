/*
Author       : Dreamguys
Template Name: Mentoring - Bootstrap Template
Version      : 1.0
*/



(function($) {
    "use strict";

    
		
	if($('.toggle-password').length > 0) {
		$(document).on('click', '.toggle-password', function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $(".pass-input");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}






	// Stick Sidebar
	
	if ($(window).width() > 767) {
		if($('.theiaStickySidebar').length > 0) {
			$('.theiaStickySidebar').theiaStickySidebar({
			  // Settings
			  additionalMarginTop: 30
			});
		}
	}
	
	// Sidebar
	
	//if($(window).width() <= 991){
	var Sidemenu = function() {
		this.$menuItem = $('custom-sidebar-nav a');
	};
	
	function init() {
		var $this = Sidemenu;
		$('.custom-sidebar-nav a').on('click', function(e) {
			if($(this).parent().hasClass('submenu')) {
				e.preventDefault();
			}
			if(!$(this).hasClass('submenu')) {
				$('ul', $(this).parents('ul:first')).slideUp(350);
				$('a', $(this).parents('ul:first')).removeClass('submenu');
				$(this).next('ul').slideDown(350);
				$(this).addClass('subdrop');
				$(this).addClass('submenu');
			} else if($(this).hasClass('submenu')) {
				$(this).removeClass('submenu');
				$(this).removeClass('subdrop');
				$(this).next('ul').slideUp(350);
			}
		});
	}

	// Sidebar Initiate
	init();
	//}
	
	// Select 2
	
	if($('.select').length > 0) {
		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
	}
	
	// Date Time Picker
	
	if($('.datetimepicker').length > 0) {
		$('.datetimepicker').datetimepicker({
			format: 'DD/MM/YYYY',
			icons: {
				up: "fas fa-chevron-up",
				down: "fas fa-chevron-down",
				next: 'fas fa-chevron-right',
				previous: 'fas fa-chevron-left'
			}
		});
	}

	if($('.datepicker').length > 0) {
		$('.datepicker').datetimepicker({
			format: 'DD/MM/YYYY',
			minDate: new Date(),
        		
        
			icons: {
				up: "fas fa-chevron-up",
				down: "fas fa-chevron-down",
				next: 'fas fa-chevron-right',
				previous: 'fas fa-chevron-left'
			}
		}).on('dp.change', function(e) {
    //
    // on date change get current date and format as weekday
    //
    //$('#weekDay').val(e.date.format('dddd'));

    var day = e.date.format('dddd');

    var mentor_id = $("#mentor-id").val();

    var date= e.date.format('DD-MM-YYYY');

    //alert(date);



    $.ajax({
				type: "GET",
				url: '/mentee/booking-slot/' + day+'/'+mentor_id+'/'+date,
				dataType: 'json' // This is what I have updated

			}).done(function (view_data) {
				$('#day-slot').empty();
				if(view_data.length !=0){
				
				//$('#day-slot').append($('<option>').text("Select"));
				$.each(view_data, function (i, obj) {
					/*$('#select_province').append($('<option>').text(obj.CountryProvinceName).attr('value', obj.CountryProvinceType_ID));
*/					
					$('#day-slot').append(`<ul class="clearfix"><li><a data-slot=${obj.slot_id} class="timing" onclick="getSelected(this)" href="#" value="${obj.start_time}-${obj.end_time}">
															<span>${obj.start_time}</span>-<span>${obj.end_time}</span>
														</a></li></ul>`
                                  );
				


				});
				}
				else{

					$('#day-slot').append(`<span class="no-slots">Sorry!! No Slots Available</span>`);
				}


			});


});
	}
	
	







	
	// Floating Label

	if($('.floating').length > 0 ){
		$('.floating').on('focus blur', function (e) {
		$(this).parents('.form-focus').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
		}).trigger('blur');
	}
	
	// Mobile menu sidebar overlay
	
	$('.header-fixed').append('<div class="sidebar-overlay"></div>');
	$(document).on('click', '#mobile_btn', function() {
		$('main-wrapper').toggleClass('slide-nav');
		$('.sidebar-overlay').toggleClass('opened');
		$('html').addClass('menu-opened');
		return false;
	});
	
	$(document).on('click', '.sidebar-overlay', function() {
		$('html').removeClass('menu-opened');
		$(this).removeClass('opened');
		$('main-wrapper').removeClass('slide-nav');
	});
	
	$(document).on('click', '#menu_close', function() {
		$('html').removeClass('menu-opened');
		$('.sidebar-overlay').removeClass('opened');
		$('main-wrapper').removeClass('slide-nav');
	});
	
	// Tooltip
	
	if($('[data-toggle="tooltip"]').length > 0 ){
		$('[data-toggle="tooltip"]').tooltip();
	}

	//Home popular mentor slider
	if($('.owl-carousel').length > 0 ){
		var owl = $('.owl-carousel');
	      	owl.owlCarousel({
	        margin: 30,
	        nav : false,
	        nav: true,
	        loop: true,
	        responsive: {
	          	0: {
	            	items: 1
	          	},
	          	768 : {
	            	items: 3
	          	},
	          	1170: {
	            	items: 4
	          	}
	        }
	    });
    }

	// Add More Hours
	
    $(".hours-info").on('click','.trash', function () {
		$(this).closest('.hours-cont').remove();
		return false;
    });

    $(".add-hours").on('click', function () {
		
		var hourscontent = '<div class="row form-row hours-cont">' +
			'<div class="col-12 col-md-10">' +
				'<div class="row form-row">' +
					'<div class="col-12 col-md-6">' +
						'<div class="form-group">' +
							'<label>Start Time</label>' +
							'<select class="form-control">' +
								'<option>Select</option>' +
								'<option>12.00 am</option>' +
								'<option>1.00 am</option>' + 
								'<option>2.00 am</option>' +
								'<option>3.00 am</option>' +
								'<option>4.00 am</option>' +
								'<option>5.00 am</option>' +
								'<option>6.00 am</option>' +
								'<option>7.00 am</option>' +
								'<option>8.00 am</option>' +
								'<option>9.00 am</option>' +
								'<option>10.00 am</option>' +
								'<option>11.00 am</option>' +
								'<option>1.00 pm</option>' + 
								'<option>2.00 pm</option>' + 
								'<option>3.00 pm</option>' + 
								'<option>4.00 pm</option>' + 
								'<option>5.00 pm</option>' + 
								'<option>6.00 pm</option>' + 
								'<option>7.00 pm</option>' + 
								'<option>8.00 pm</option>' + 
								'<option>9.00 pm</option>' + 
								'<option>10.00 pm</option>' + 
								'<option>11.00 pm</option>' + 
							'</select>' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6">' +
						'<div class="form-group">' +
							'<label>End Time</label>' +
							'<select class="form-control">' +
								'<option>Select</option>' +
								'<option>12.00 am</option>' +
								'<option>1.00 am</option>' + 
								'<option>2.00 am</option>' +
								'<option>3.00 am</option>' +
								'<option>4.00 am</option>' +
								'<option>5.00 am</option>' +
								'<option>6.00 am</option>' +
								'<option>7.00 am</option>' +
								'<option>8.00 am</option>' +
								'<option>9.00 am</option>' +
								'<option>10.00 am</option>' +
								'<option>11.00 am</option>' +
								'<option>1.00 pm</option>' + 
								'<option>2.00 pm</option>' + 
								'<option>3.00 pm</option>' + 
								'<option>4.00 pm</option>' + 
								'<option>5.00 pm</option>' + 
								'<option>6.00 pm</option>' + 
								'<option>7.00 pm</option>' + 
								'<option>8.00 pm</option>' + 
								'<option>9.00 pm</option>' + 
								'<option>10.00 pm</option>' + 
								'<option>11.00 pm</option>' + 
							'</select>' +
						'</div>' +
					'</div>' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
		'</div>';
		
        $(".hours-info").append(hourscontent);
        return false;
    });
	
	// Content div min height set
	
	function resizeInnerDiv() {
		var height = $(window).height();	
		var header_height = $(".header").height();
		var footer_height = $(".footer").height();
		var setheight = height - header_height;
		var trueheight = setheight - footer_height;
		$(".content").css("min-height", trueheight);
	}
	
	if($('.content').length > 0 ){
		resizeInnerDiv();
	}

	$(window).resize(function(){
		if($('.content').length > 0 ){
			resizeInnerDiv();
		}

	});

	
	
	// Date Range Picker
	if($('.bookingrange').length > 0) {
		var start = moment().subtract(6, 'days');
		var end = moment();

		function booking_range(start, end) {
			$('.bookingrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		}

		$('.bookingrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, booking_range);

		booking_range(start, end);
	}
	// Chat

	var chatAppTarget = $('.chat-window');
	(function() {
		if ($(window).width() > 991)
			chatAppTarget.removeClass('chat-slide');
		
		$(document).on("click",".chat-window .chat-users-list a.media",function () {
			if ($(window).width() <= 991) {
				chatAppTarget.addClass('chat-slide');
			}
			return false;
		});
		$(document).on("click","#back_user_list",function () {
			if ($(window).width() <= 991) {
				chatAppTarget.removeClass('chat-slide');
			}	
			return false;
		});
	})();
	
	// Preloader
	
	$(window).on('load', function () {
		if($('#loader').length > 0) {
			$('#loader').delay(350).fadeOut('slow');
			$('body').delay(350).css({ 'overflow': 'visible' });
		}
	})



	
})(jQuery);

function getSelected(t){debugger;

//$(".timing").on("click",function(){

		

		$("#scheduled-time-id").val(t.innerText);

		$("#slot_id").val($(t)[0].dataset['slot']);
		$(t).toggleClass('selected');
		var str = t.className;
		if(str.includes("selected")){
			$("#proceed-btn").prop('disabled', false);
		} 
		else{
			$("#proceed-btn").prop('disabled', true);
		}
		


	//});
	
	}

function getCommentId(t){
	$("#parent-commentor-id").val($(t).attr('data-comment'));
}

function getURL(){debugger;
	var radioValue = $("input[name='payment-type']:checked").val();
            if(radioValue == "Paypal"){
            	$("#payment-form").attr("action","/paypal");
            	$("#payment-form").submit();
              
            }
            else{


            	$("#payment-form").attr("action","/stripe-payment");
            	
            	//$("#payment-form").attr("method","GET");

            	$("form[name='payment-submit-form']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      
      form:"required",
      /*email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: 5
      }
    },*/
    // Specify validation error messages
    messages: {
      firstname:"Enter Mandatory fields"
    }
},
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }

  });


            	
            		
            	//$("#payment-form").submit();
            }
            
}

function reviewSubmit(){debugger;

	var rating_star = $("#mentor_review").val();
	var mentor_id = $("#mentor_id").val();
	var feedback = $("#review-area").val();

    $.ajax({
				type: "GET",
				url: '/mentor-review/'+mentor_id+'/'+rating_star+'/'+feedback,
				dataType: 'json' // This is what I have updated

			}).done(function (view_data) {
				console.log(view_data);

				$("#mySidenav").hide();
				window.location.reload();

			});

}


