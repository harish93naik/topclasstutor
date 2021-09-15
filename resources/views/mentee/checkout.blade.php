<?php $page="checkout";?>
@extends('layout.mainlayout')
@section('content')		
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/mentee/index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Checkout</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Checkout</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
								
									<!-- Checkout Form -->
									<form id="payment-form" name="payment-submit-form" method="POST" class="stripe-validation">
										@csrf
									
									<!--Booking Information values -->
									<input type="hidden" name="mentor_id" value="{{$mentor_details->mentor_id}}">
									<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
									<input type="hidden" name="scheduled_date" value="{{$scheduled_date}}">
									<input type="hidden" name="scheduled_time" value="{{$scheduled_time}}">
									<input type="hidden" name="slot_id" value="{{$slot_id}}">
									<input type="hidden" name="amount" value="{{$amount}}">

									<!--Booking information values-->
									
										<!-- Personal Information -->
										<div class="info-widget">
											<h4 class="card-title">Personal Information</h4>
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>First Name</label>
														<input class="form-control"  type="text" value="{{auth()->user()->first_name}}">

													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Last Name</label>
														<input class="form-control" type="text" value="{{auth()->user()->last_name}}">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Email</label>
														<input class="form-control" type="email" value="{{auth()->user()->email}}">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Phone</label>
														<input class="form-control" type="text" value="{{auth()->user()->phone_number}}">
													</div>
												</div>
											</div>
											<div class="exist-customer">Existing Customer? <a href="#">Click here to login</a></div>
										</div>
										<!-- /Personal Information -->
										
										<div class="payment-widget">
											<h4 class="card-title">Payment Method</h4>
											
											<!-- Credit Card Payment -->
											<div class="payment-list">
												<label class="payment-radio credit-card-option">
													<input type="radio" name="payment-type" checked value="stripe">
													<span class="checkmark"></span>
													Stripe
												</label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_name">Name on Card</label>
															<input class="form-control" id="card_name" name="form[name_on_card]" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_number">Card Number</label>
															<input autocomplete="off" class="form-control" name="form[card_number]" id="card_number" placeholder="1234  5678  9876  5432" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_month">Expiry Month</label>
															<input class="form-control" name="form[month]" id="expiry_month" placeholder="MM" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_year">Expiry Year</label>
															<input class="form-control" name="form[year]" id="expiry_year" placeholder="YYYY" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="cvv">CVV</label>
															<input autocomplete="off" class="form-control" name="form[cvv]" id="cvv" type="text">
														</div>
													</div>
													
												</div>
											</div>
											<!-- /Credit Card Payment -->
											
											<!-- Paypal Payment -->
											<div class="payment-list">

												<!-- <div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Amount</label>
														<input class="form-control" type="text" name="amount" value="{{$amount}}">
													</div>
												</div> -->
												<label class="payment-radio paypal-option">
													<input type="radio" name="payment-type" value="Paypal">
													<span class="checkmark"></span>
													Paypal
												</label>
											</div>
											<!-- /Paypal Payment -->
											
											<!-- Terms Accept -->
											<div class="terms-accept">
												<div class="custom-checkbox">
												   <input type="checkbox" id="terms_accept">
												   <label for="terms_accept">I have read and accepted <a href="#">Terms &amp; Conditions</a></label>
												</div>
											</div>
											<!-- /Terms Accept -->
											
											<!-- Submit Section -->
											<div class="submit-section mt-4">
												<button onclick="getURL()" class="btn btn-primary submit-btn">Confirm and Pay</button>
											</div>
											<!-- /Submit Section -->
											
										</div>
									</form>
									<!-- /Checkout Form -->
									
								</div>
							</div>
							
						</div>
						
						<div class="col-md-5 col-lg-4 theiaStickySidebar">
						
							<!-- Booking Summary -->
							<div class="card booking-card">
								<div class="card-header">
									<h4 class="card-title">Booking Summary</h4>
								</div>
								<div class="card-body">
								
									<!-- Booking Mentee Info -->
									<div class="booking-user-info">
										<a href="payment-mentee" class="booking-user-img">
											<img src="assets/img/user/user2.jpg" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="payment-mentee">{{$mentor_details->user->first_name}}&nbsp;{{$mentor_details->user->last_name}}</a></h4>
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">35</span>
											</div>
											<div class="mentor-details">
												<p class="user-location"><i class="fas fa-map-marker-alt"></i>{{$mentor_details->state}}, {{$mentor_details->country}}</p>
											</div>
										</div>
									</div>
									<!-- Booking Mentee Info -->
									
									<div class="booking-summary">
										<div class="booking-item-wrap">
											<ul class="booking-date">
												<li>Date <span>{{$scheduled_date}}</span></li>
												<li>Time <span>{{$scheduled_time}}</span></li>
											</ul>
											<ul class="booking-fee">
												<li>Consulting Fee <span>$100</span></li>
												<li>Booking Fee <span>$10</span></li>
												<li>Video Call <span>$50</span></li>
											</ul>
											<div class="booking-total">
												<ul class="booking-total-list">
													<li>
														<span>Total</span>
														<span class="total-cost">$160</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Booking Summary -->
							
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
@endsection