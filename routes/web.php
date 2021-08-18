<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$middleware = ['auth'];



Route::post('/register', 'Auth\RegisterController@create')->name('register');


/*---------------comment routes starts----------------*/

Route::post('/comment-save/{blog}','Guest\CommentController@save');

/*---------------comment routes ends----------------*/

/*--------------Stripe payment route starts--------------------*/

Route::get('/stripe-payment','Mentee\StripeController@handleGet');
Route::post('/stripe-payment','Mentee\StripeController@handlePost')->name('stripe.payment');

/*--------------Stripe payment ends--------------------*/


/*-----------Admin Route Starts---------------*/

 Route::middleware($middleware)->get('/video-chat', function () {
        // fetch all users apart from the authenticated user
        $users = User::where('id', '<>', Auth::id())->get();
        return view('video-chat', ['users' => $users]);
    });

    // Endpoints to alert call or receive call.
    Route::middleware($middleware)->post('/video/call-user', 'App\Http\Controllers\VideoChatController@callUser');
    Route::middleware($middleware)->post('/video/accept-call', 'App\Http\Controllers\VideoChatController@acceptCall');
Route::middleware($middleware)->get('/video-call/{user}','VideoChatController@videoCall')->name('video-call');

Route::middleware($middleware)->prefix('admin')->group(function(){

Route::get('dashboard','Admin\AdminController@index');

Route::get('index','Admin\AdminController@index');

Route::get('mentor','Admin\AdminController@mentorList');

Route::get('mentee','Admin\AdminController@menteeList');

Route::get('booking-list','Admin\AdminController@bookingList');

Route::get('invoice-report','Admin\AdminController@invoiceList');

Route::get('profile','Admin\AdminController@profileView');

Route::post('profile/update','Admin\AdminController@profileUpdate');

Route::get('blog','Admin\AdminController@blogList');

Route::get('view-blog/{blog}','Admin\AdminController@blogView');

Route::post('password-reset','Admin\AdminController@resetPassword');




});

/*-----------Admin Route Ends---------------*/



/*-----------Mentor Route Starts---------------*/

Route::middleware($middleware)->prefix('mentor')->group(function(){

    Route::get('dashboard','Mentor\MentorController@index');
    Route::get('index','Mentor\MentorController@index');



/*-----------Appointements Route Starts---------------*/

Route::get('appointments','Mentor\MentorController@bookingList');

Route::get('appointments/{booking}/{postdata}','Mentor\MentorController@bookingStatus');

/*-----------Appointements Route Ends---------------*/




/*-----------Schedule Timings Route Starts---------------*/

Route::get('schedule-timings','Mentor\MentorController@scheduleTimings');

Route::post('schedule-timings/save','Mentor\MentorController@scheduleTimingsSave');

Route::get('schedule-timings/delete/{scheduleTimings}','Mentor\MentorController@scheduleTimingsDelete');

/*-----------Schedule Timings Route Ends---------------*/



/*-----------Profile Route Starts---------------*/

Route::get('profile','Mentor\MentorController@profileView');

Route::post('profile/update','Mentor\MentorController@profileUpdate');

Route::get('profile-settings','Mentor\MentorController@profileEdit');

/*-----------Profile Route Ends---------------*/



/*-----------Blog Route Starts---------------*/

Route::get('blog','Mentor\MentorController@blogList');

Route::get('add-blog','Mentor\MentorController@blogCreate');

Route::get('edit-blog/{blog}','Mentor\MentorController@blogEdit');

Route::get('update-blog/{blog}','Mentor\MentorController@blogUpdate');

Route::get('view-blog/{blog}','Mentor\MentorController@blogView');

Route::post('save-blog','Mentor\MentorController@blogSave');

/*-----------Blog Route Ends---------------*/


/*-----------Invoice route starts----------*/


Route::get('invoices','Mentor\MentorController@invoiceList');

Route::get('invoice-view/{invoice}','InvoiceController@invoiceView');


/*-----------Invoice route ends----------*/





});


/*-----------Mentor Route Ends---------------*/

/*-----------Mentee Route Starts---------------*/

Route::middleware($middleware)->prefix('mentee')->group(function(){

    Route::get('dashboard','Mentee\MenteeController@index');

    Route::get('index','Mentee\MenteeController@index');

    Route::get('mentor','Mentee\MenteeController@mentorList')->name('mentor-list');

    Route::get('booking/{mentor}','Mentee\MenteeController@bookingForm');

Route::get('booking-slot/{postdata}/{mentor_id}/{postdate}','Mentee\MenteeController@bookingDay');

Route::post('payment-page','Mentee\MenteeController@paymentPage');

Route::get('booking-success/{invoice}','Mentee\MenteeController@bookingSuccess');

/*-----------Profile Route Starts---------------*/

Route::get('profile','Mentee\MenteeController@profileView');

Route::post('profile/update','Mentee\MenteeController@profileUpdate');

Route::get('profile-settings','Mentee\MenteeController@profileEdit');


/*-----------Profile Route Ends---------------*/


/*----------Booking route starts-------------*/

Route::get('bookings-mentee','Mentee\MenteeController@bookingList');
 
/*----------Booking route ends-------------*/

/*----------Invoice route starts------------*/

Route::get('invoices','Mentee\MenteeController@invoiceList');
Route::get('invoice-view/{invoice}','InvoiceController@invoiceView');

/*----------Invoice route ends------------*/

/*----------Favorites route starts-------------*/

Route::get('favourites', function () {
    return view('mentee.favourites');
})->name('favourites');



/*----------Favorites route ends-------------*/

/*----------messages route starts-------------*/

Route::get('chat-mentee', function () {
    return view('mentee.chat-mentee');
})->name('chat-mentee');



/*----------messages route ends-------------*/


/*-----------Blog Route Starts---------------*/

Route::get('blog','Mentee\MenteeController@blogList');

Route::get('view-blog/{blog}','Mentee\MenteeController@blogView');



/*-----------Blog Route Ends---------------*/





});



/*-----------Mentee List Ends---------------*/


/*-----------Invoice route starts------------*/

Route::middleware($middleware)->get('/invoice-view/{invoice}','InvoiceController@invoiceView');

/*-------------Invoice Route Ends------------*/


Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'Mentee\PaypalController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'Mentee\PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'Mentee\PaypalController@getPaymentStatus',));




Route::get('/', function () {
        return view('index');
    })->name('pagee');
    
    Route::get('/home', function () {
        return view('index');
    })->name('pagee');

Route::get('/index', function () {
    return view('index');
})->name('pagee');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/bookings', function () {
    return view('bookings');
})->name('bookings');
Route::get('/schedule-timings', function () {
    return view('schedule-timings');
})->name('schedule-timings');
Route::get('/mentee-list', function () {
    return view('mentee-list');
})->name('mentee-list');
Route::get('/profile-mentee', function () {
    return view('profile-mentee');
})->name('profile-mentee');
Route::get('/blog', function () {
    return view('blog');
})->name('blog');
Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');
Route::get('/add-blog', function () {
    return view('add-blog');
})->name('add-blog');
Route::get('/edit-blog', function () {
    return view('edit-blog');
})->name('edit-blog');
Route::get('/chat', function () {
     $users = User::where('id', '<>', Auth::id())->get();
    return view('chat', ['users' => $users] );
})->name('chat');
Route::get('/invoices', function () {
    return view('invoices');
})->name('invoices');
Route::get('/profile-settings', function () {
    return view('profile-settings');
})->name('profile-settings');
Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');
Route::get('/mentor-register', function () {
    return view('mentor-register');
})->name('mentor-register');
Route::get('/map-grid', function () {
    return view('map-grid');
})->name('map-grid');
Route::get('/map-list', function () {
    return view('map-list');
})->name('map-list');
Route::get('/search', function () {
    return view('search');
})->name('search');
Route::get('/profile', function () {
    return view('profile');
})->name('profile');
Route::get('/bookings-mentee', function () {
    return view('bookings-mentee');
})->name('bookings-mentee');
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
Route::get('/booking-success', function () {
    return view('booking-success');
})->name('booking-success');
Route::get('/dashboard-mentee', function () {
    return view('dashboard-mentee');
})->name('dashboard-mentee');
Route::get('/favourites', function () {
    return view('favourites');
})->name('favourites');
Route::get('/chat-mentee', function () {
    return view('chat-mentee');
})->name('chat-mentee');
Route::get('/profile-settings-mentee', function () {
    return view('profile-settings-mentee');
})->name('profile-settings-mentee');
Route::get('/change-password', function () {
    return view('change-password');
})->name('change-password');
Route::get('/voice-call', function () {
    return view('voice-call');
})->name('voice-call');

Route::get('/components', function () {
    return view('components');
})->name('components');
Route::get('/invoice-view', function () {
    return view('invoice-view');
})->name('invoice-view');
Route::get('/blank-page', function () {
    return view('blank-page');
})->name('blank-page');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');
Route::get('/blog-list', function () {
    return view('blog-list');
})->name('blog-list');
Route::get('/blog-grid', function () {
    return view('blog-grid');
})->name('blog-grid');
Route::get('/appointments', function () {
    return view('appointments');
})->name('appointments');
Route::get('/booking', function () {
    return view('booking');
})->name('booking');
Route::get('/mentee-register', function () {
    return view('mentee-register');
})->name('mentee-register');



/*****************ADMIN ROUTES*******************/



Route::Group(['prefix' => 'admin'], function () { 
Route::get('/index_admin', function () {
return view('admin.index_admin');
})->name('page');
/*Route::get('/mentor', function () {
return view('admin.mentor');
})->name('mentor');*/

/*Route::get('/booking-list', function () {
return view('admin.booking-list');
})->name('booking-list');*/
Route::get('/categories', function () {
return view('admin.categories');
})->name('categories');
Route::get('/transactions-list', function () {
return view('admin.transactions-list');
})->name('transactions-list');
Route::get('/settings', function () {
return view('admin.settings');
})->name('settings');
/*Route::get('/invoice-report', function () {
return view('admin.invoice-report');
})->name('invoice-report');*/
/*Route::get('/profile', function () {
return view('admin.profile');
})->name('profile');*/
/*Route::get('/blog', function () {
return view('admin.blog');
})->name('blog');*/
/*Route::get('/blog-details', function () {
return view('admin.blog-details');
})->name('blog-details');*/
Route::get('/add-blog', function () {
return view('admin.add-blog');
})->name('add-blog');
Route::get('/edit-blog', function () {
return view('admin.edit-blog');
})->name('edit-blog');
/*Route::get('/login', function () {
return view('admin.login');
})->name('login');*/
/*Route::get('/register', function () {
return view('admin.register');
})->name('register');*/
Route::get('/forgot-password', function () {
return view('admin.forgot-password');
})->name('forgot-password');
Route::get('/lock-screen', function () {
return view('admin.lock-screen');
})->name('lock-screen');
Route::get('/error-404', function () {
return view('admin.error-404');
})->name('error-404');
Route::get('/error-500', function () {
return view('admin.error-500');
})->name('error-500');
Route::get('/blank-page', function () {
return view('admin.blank-page');
})->name('blank-page');
Route::get('/components', function () {
return view('admin.components');
})->name('components');
Route::get('/form-basic-inputs', function () {
return view('admin.form-basic-inputs');
})->name('form-basic-inputs');
Route::get('/form-input-groups', function () {
return view('admin.form-input-groups');
})->name('form-input-groups');
Route::get('/form-horizontal', function () {
return view('admin.form-horizontal');
})->name('form-horizontal');
Route::get('/form-vertical', function () {
return view('admin.form-vertical');
})->name('form-vertical');
Route::get('/form-mask', function () {
return view('admin.form-mask');
})->name('form-mask');
Route::get('/form-validation', function () {
return view('admin.form-validation');
})->name('form-validation');
Route::get('/tables-basic', function () {
return view('admin.tables-basic');
})->name('tables-basic');
Route::get('/data-tables', function () {
return view('admin.data-tables');
})->name('data-tables');
Route::get('/invoice', function () {
return view('admin.invoice');
})->name('invoice');
});
/********************ADMIN ROUTES END******************************/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
