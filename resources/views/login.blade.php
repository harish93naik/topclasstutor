@extends('layout.mainlayout')
@section('content')	
<!-- Page Content -->
<div class="bg-pattern-style">
				<div class="content">
							
					<!-- Login Tab Content -->
					<div class="account-content">
						<div class="account-box">
							<div class="login-right">
								<div class="login-header">

									<h3>Login</h3>
									<!-- <h3>Login <span>Mentoring</span></h3>
									<p class="text-muted">Access to our dashboard</p> -->
								</div>
								<div class="card-body">
                    @if (session('error'))
   <div class="alert alert-danger">
        {{ session('error') }}
   </div>
@endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    
                    <p class="login-note-p"><strong>Note:&nbsp;&nbsp;</strong><span class="login-note">Not yet registered? Please register.</span></p>
								<!-- <form action="index">
									<div class="form-group">
										<label class="form-control-label">Email Address</label>
										<input type="email" class="form-control">
									</div>
									<div class="form-group">
										<label class="form-control-label">Password</label>
										<div class="pass-group">
											<input type="password" class="form-control pass-input">
											<span class="fas fa-eye toggle-password"></span>
										</div>
									</div>
									<div class="text-right">
										<a class="forgot-link" href="forgot-password">Forgot Password ?</a>
									</div>
									<button class="btn btn-primary login-btn" type="submit">Login</button>
									<div class="text-center dont-have">Don’t have an account? <a href="register">Register</a></div>
								</form> -->
							</div>
						</div>
					</div>
					<!-- /Login Tab Content -->

				</div>

			</div>		
			<!-- /Page Content -->	
@endsection