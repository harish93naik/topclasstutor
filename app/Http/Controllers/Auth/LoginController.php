<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

   // protected $user="mentor";
    //protected $redirectTo=RouteServiceProvider::HOME;
    //$user ="mentor";//auth()->user()->role;

    public function authenticated($request , $user){
          /*if($user->status=="inactive"){
            
           Auth::guard('web')->logout();

        $request->session()->invalidate();

        //$request->session()->regenerateToken();

      

        return redirect()->route('login-topclasstutors')->with('error', 'Your Account need to be approved by the Admin');
}*/
    if($user->role=='admin'){
        return redirect('/admin/dashboard');
    }elseif($user->role=='mentor'){
          
      

     return redirect('/mentor/dashboard');
    
    }
    else{
        return redirect('/mentee/dashboard');
    }
}
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
