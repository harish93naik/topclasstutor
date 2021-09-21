<?php $page="mentor-register";?>

<?php $__env->startSection('content'); ?>		
	<!-- Page Content -->
    <div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
						
							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Mentee Register</h3>
										</div>

                                         <?php if(session('message-success')): ?>

                                <p>&nbsp;</p>

                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('message-success')); ?>

                            </div>

                        <?php endif; ?>

                        <?php if(session('message-info')): ?>

                                <p>&nbsp;</p>

                            <div class="alert alert-info" role="alert">
                                <?php echo e(session('message-info')); ?>

                            </div>

                        <?php endif; ?>

                        <?php if(session('message-alert')): ?>

                                <p>&nbsp;</p>

                            <div class="alert alert-danger" role="alert">
                                <?php echo e(session('message-alert')); ?>

                            </div>

                        <?php endif; ?>
										
										<!-- Register Form -->
										 <form method="POST" action="/mentee/save" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <fieldset id="basic-info">

                        <h3>Basic Info</h3>



                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('First Name')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="first_name" type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_form[first_name]" value="<?php echo e(old('first_name')); ?>" required autocomplete="first_name" autofocus onkeypress='return onlyCharacters(event,this)'>

                                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                       

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Last Name')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="last_name" type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_form[last_name]" value="<?php echo e(old('last_name')); ?>" required autocomplete="form[last_name]" onkeypress='return onlyCharacters(event,this)'>

                                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Date of Birth')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                               <div class="cal-icon">
                                                        <input type="text" id="date_of_birth" name="mentee_form[dob]" class="form-control datetimepicker" value="">
                                                    </div>

                                <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Mobile Number')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="phone_number" type="text" class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_form[phone_number]" value="<?php echo e(old('phone_number')); ?>" required autocomplete="phone_number" onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'>

                                <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row">

                         <div class="col-sm-8">
                                    <span class="mandatory-fields"></span>
                                </div>
                                    <div class="col-sm-4 text-right">
                                        <button  class="btn btn-primary mt-2" onclick="return basicInfoToggle()">Next</button>
                                    </div>
                                </div>
                    </fieldset>

                    <fieldset id="login-info">

                    	<h3>Login Info</h3>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_form[email]" value="<?php echo e(old('email')); ?>" required autocomplete="email" onfocusout ='emailVerify()' onkeypress='emailMessageClear()'>

                              <span id="email-id"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_form[password]" required autocomplete="new-password" onfocusout ='passwordVerify()' onkeypress='passwordMessageClear()'>

                               <span id="password-message"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="user_form[password_confirmation]" required autocomplete="new-password" onfocusout ='confirmPasswordVerify()' onkeypress='confirmPasswordMessageClear()'>
                                <span id="pwd-message"></span>
                            </div>

                        </div>
                        <div class="row">
                             <div class="col-sm-8">
                                    <span class="login-fields"></span>
                                </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-4">
                                        <button class="btn btn-primary mt-2" onclick="loginInfoPreviousToggle()">Previous</button>
                                    </div>
                                    <div class="col-sm-4">

                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <button  class="btn btn-primary mt-2" onclick="loginInfoNextToggle()">Next</button>
                                    </div>
                                    </div>
                    </fieldset>

                    <fieldset id="address-info">
                    	<h3>Address Info</h3>

                         <div class="form-group row">
                            <label for="address1" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Address1')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="address1" type="text" class="form-control <?php $__errorArgs = ['address1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mentee_form[address1]" value="<?php echo e(old('address1')); ?>" required>

                                <?php $__errorArgs = ['address1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="address2" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Address2')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="address2" type="text" class="form-control <?php $__errorArgs = ['address2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mentee_form[address2]" value="<?php echo e(old('address2')); ?>" required>

                                <?php $__errorArgs = ['address2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right"><?php echo e(__('City')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="city" type="text" class="form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mentee_form[city]" value="<?php echo e(old('city')); ?>" required onkeypress='return onlyCharacters(event,this)'>

                                <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right"><?php echo e(__('State')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="state" type="text" class="form-control <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mentee_form[state]" value="<?php echo e(old('state')); ?>" required onkeypress='return onlyCharacters(event,this)'>

                                <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="Zipcode" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Zipcode')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="zipcode" type="text" class="form-control <?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mentee_form[zipcode]" value="<?php echo e(old('zipcode')); ?>" required onkeypress='return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57'>

                                <?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Country')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="country" type="text" class="form-control <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mentee_form[country]" value="<?php echo e(old('country')); ?>" required onkeypress='return onlyCharacters(event,this)'>

                                <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                          <!-- <input type="hidden" name="user_form[status]" value="inactive">
 -->
                            <input type="hidden" name="user_form[role]" value="mentee">
                             <div class="row">
                             <div class="col-sm-8">
                                    <span class="address-fields"></span>
                                </div>
                        </div>
                            <div class="row">
                             <div class="col-sm-4">
                                        <button class="btn btn-primary mt-2" onclick="addressInfoPreviousToggle()">Previous</button>
                                    </div>
                                    <div class="col-sm-4">

                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <button  class="btn btn-primary mt-2" onclick="addressInfoNextToggle()">Next</button>
                                    </div>
                                </div>
                        </fieldset>


                       




                         
                             

                           <fieldset id="qualification-info"> 
                        <h3>Qualification</h3>
                          <div class="form-group row">
                            <label for="degree" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Degree')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="degree" type="text" class="form-control <?php $__errorArgs = ['degree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_form[degree]" value="<?php echo e(old('degree')); ?>" required>

                                

                                <?php $__errorArgs = ['degree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                         <!--   <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Subject Category')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                               <select class="form-control select" name="user_form[category]" id="category_select" required> 
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
                                <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div> -->
                       

                         <!-- <div class="form-group row">
                            <label for="segment" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Segments')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                               <select class="form-control select" name="user_form[segment]" id="segment_select" required> 
                                                                    <option value="">Select Segment..</option>
                                                                    <option value="primary">Primary(Y 2-6)</option>
                                                                    <option value="intermediate">Intermediate(Y7 & Y8)</option>
                                                                    <option value="secondary">Secondary(Y9-Y13)</option>
                                                                    <option value="under_graduate">Under Graduate(Y14- Y7)</option>
                                                                    <option value="graduate">Graduate(Level 4- Level 7)</option>
                                                                    <option value="post_graduate">Post-Graduate</option>
                                                                    <option value="doctorate">Doctoral Study to PHD</option>
                                                                  
                                                                    
                                                                </select>
                                <?php $__errorArgs = ['segments'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right"><?php echo e(__('About You')); ?><span class="mandatory_fields">*</span></label>

                            <div class="col-md-8">
                                <input id="description" type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_form[description]" value="<?php echo e(old('description')); ?>" required>

                                

                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="resume" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Upload College Certificate')); ?><span class="mandatory_fields" required>*</span></label>

                            <div class="col-md-8">
                                <input type="file" id="resume" name="content_file" accept="application/pdf" class="upload">

                                

                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="row">
                                    <div class="col-sm-4">
                                        <button class="btn btn-primary mt-2" onclick="qualificationPreviousInfoToggle()">Previous</button>
                                    </div>
                                    <div class="col-sm-4">

                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <button type="submit"  class="btn btn-primary mt-2">Register</button>
                                    </div>
                                </div>

                      <!--   <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Register')); ?>

                                </button>
                            </div>
                        </div> -->
                    </fieldset>
                    </form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Account Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\topclasstutor\resources\views/mentee-register.blade.php ENDPATH**/ ?>