@extends('layout.mainlayout_admin')
@section('content') 
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
                
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">List of Mentor</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index_admin">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                                    <li class="breadcrumb-item active">Mentor</li>
                                </ul>
                            </div>
                        </div>
                      
                </div>
                    <!-- /Page Header -->
                    
                   <form method="POST" action="/admin/mentor/save">
                        @csrf

                        <h3>Basic Info</h3>



                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="user_form[first_name]" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="form[last_name]" type="text" class="form-control @error('last_name') is-invalid @enderror" name="user_form[last_name]" value="{{ old('last_name') }}" required autocomplete="form[last_name]">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                               <div class="cal-icon">
                                                        <input type="text" name="mentor_form[dob]" class="form-control datetimepicker" value="">
                                                    </div>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="address1" class="col-md-4 col-form-label text-md-right">{{ __('Address1') }}</label>

                            <div class="col-md-6">
                                <input id="address1" type="text" class="form-control @error('address1') is-invalid @enderror" name="mentor_form[address1]" value="{{ old('address1') }}" required>

                                @error('address1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="address2" class="col-md-4 col-form-label text-md-right">{{ __('Address2') }}</label>

                            <div class="col-md-6">
                                <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="mentor_form[address2]" value="{{ old('address2') }}" required>

                                @error('address2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="mentor_form[city]" value="{{ old('city') }}" required>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="mentor_form[state]" value="{{ old('state') }}" required>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="Zipcode" class="col-md-4 col-form-label text-md-right">{{ __('Zipcode') }}</label>

                            <div class="col-md-6">
                                <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="mentor_form[zipcode]" value="{{ old('zipcode') }}" required>

                                @error('zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="mentor_form[country]" value="{{ old('country') }}" required>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="user_form[phone_number]" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                           <input type="hidden" name="user_form[status]" value="active">

                            <input type="hidden" name="user_form[role]" value="mentor">

                           <h3>Login Info</h3>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="user_form[email]" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="user_form[password]" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="user_form[password_confirmation]" required autocomplete="new-password">
                            </div>
                        </div>

                        <h3>Qualification</h3>
                          <div class="form-group row">
                            <label for="degree" class="col-md-4 col-form-label text-md-right">{{ __('Degree') }}</label>

                            <div class="col-md-6">
                                <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="user_form[degree]" value="{{ old('degree') }}" required>

                                

                                @error('degree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Subject Category') }}</label>

                            <div class="col-md-6">
                               <select class="form-control select" name="user_form[category]" id="category_select"> 
                                                                    <option value="">Select Category..</option>
                                                                    <option value="english">English</option>
                                                                    <option value="mathematics">Mathematics</option>
                                                                    <option value="physics">Physics</option>
                                                                    <option value="chemistry">Chemistry</option>
                                                                    <option value="technology">Technology-Education</option>
                                                                    <option value="science">Science</option>
                                                                    <option value="education">Education</option>
                                                                    <option value="sports">Sports</option>
                                                                    <option value="geography">Geography</option>
                                                                    <option value="history">History</option>
                                                                    
                                                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       

                         <div class="form-group row">
                            <label for="segment" class="col-md-4 col-form-label text-md-right">{{ __('Segments') }}</label>

                            <div class="col-md-6">
                               <select class="form-control select" name="user_form[segment]" id="segment_select"> 
                                                                    <option value="">Select Segment..</option>
                                                                    <option value="primary">Primary(Y 2-6)</option>
                                                                    <option value="intermediate">Intermediate(Y7 & Y8)</option>
                                                                    <option value="secondary">Secondary(Y9-Y13)</option>
                                                                    <option value="under_graduate">Under Graduate(Y14- Y7)</option>
                                                                    <option value="graduate">Graduate(Level 4- Level 7)</option>
                                                                    <option value="post_graduate">Post-Graduate</option>
                                                                    <option value="doctorate">Doctoral Study to PHD</option>
                                                                  
                                                                    
                                                                </select>
                                @error('segments')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>          
            </div>
            <!-- /Page Wrapper -->  
@endsection
                
           
