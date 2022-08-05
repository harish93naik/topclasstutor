<?php $page="mentor-register";?>
@extends('layout.mainlayout')
@section('content')		
	<!-- Page Content -->
    <div class="content">
				<div class="container-fluid">
					<div class="row">
                        @php
                           var_dump($booking_array);
                        @endphp

						 <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}<span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                               <div class="cal-icon">
                                                        <input type="text" id="date_of_birth" name="mentee_form[dob]" class="form-control datetimepicker" value="">
                                                    </div>

                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                   @endsection