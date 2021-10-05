<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\User;

use App\Models\Mentor;

use App\Models\Mentee;

use App\Models\ScheduleTimings;

use App\Models\Booking;

use App\Models\Invoice;

use App\Models\AdminInfo;

use App\Models\Blog;

use App\Models\Review;

use App\Models\Comment;

use File;

use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Hash;

use Stripe;

use Session;

use App\Models\PaymentTransaction;

class MentorController extends Controller
{
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $logged_user=auth()->user();

        $mentor_details=Mentor::where('user_id',$logged_user->id)->first();

        $appointments = Booking::where([['status','<>','reject'],['mentor_id',$mentor_details->mentor_id]])->get();

        $appointment_counts = $appointments->count();

        if($mentor_details)
        {

        $booking_details=Booking::where([['mentor_id',$mentor_details->mentor_id],['status','accept']])->get()->all();

}
else
{
    $booking_details=[];
}
        $view_data=['booking_details'=> $booking_details,'appointment_counts'=>$appointment_counts];

        return view('mentor.dashboard',$view_data);
    }

    /*----Schedule timing functions starts----*/

    public function scheduleTimings()
    {

        $view_data=[];

        $logged_user=auth()->user();


         $mentor_details=Mentor::where('user_id',$logged_user->id)->first();

         if($mentor_details)
         {
            $schedule_details=ScheduleTimings::where([['mentor_id',$mentor_details->mentor_id],['deleted_at',null]])->get()->all();
         }
         else{
            $schedule_details=[];
         }


        

        $view_data=['schedule_details'=>$schedule_details];
        
        return view('mentor.schedule-timings',$view_data);
    }

    public function scheduleTimingsSave(Request $request)
    {

        $view_data=[];

        $logged_user=auth()->user();

        $start_time = $request->form['start_time'];

        $end_time = $request->form['end_time'];

        $week_day = $request->form['week_day'];


         $mentor_details=Mentor::where('user_id',$logged_user->id)->first();

         $mentor_id = $mentor_details->mentor_id;

         $form=$request->form;

         //checking for Slots 

        $start_time_check = ScheduleTimings::where([['mentor_id',$mentor_id],['start_time',$start_time],['week_day',$week_day]])->get()->all();
        if(!$start_time_check){

             $end_time_check = ScheduleTimings::where([['mentor_id',$mentor_id],['end_time',$start_time],['week_day',$week_day]])->get()->all();

             if(!$end_time_check){
                 $slot_check = ScheduleTimings::where([['mentor_id',$mentor_details->mentor_id],['start_time',$start_time],['end_time',$start_time],['week_day',$week_day]])->get()->all();
                 if(!$slot_check){

                     $form['mentor_id']=$mentor_details->mentor_id;

                     $schedule_details = ScheduleTimings::create($form);

                    $message = "Slot added successfully"; 
                    session()->flash('message-success', $message); 
                 }
                 else{

                    $message = "Slot already entered"; 
                 session()->flash('message-alert', $message); 
                 }
             }
             else{
                $message = "Slot already entered"; 
                 session()->flash('message-alert', $message); 
             }
        }
         else{
            $message = "Slot already entered"; 
            session()->flash('message-alert', $message); 
         }
      

        //$view_data=['schedule_details'=>$schedule_details];
        
        return redirect('/mentor/schedule-timings');
    }

    public function scheduleTimingsDelete(Request $request,ScheduleTimings $scheduleTimings){

        $scheduleTimings->delete();
        return redirect('/mentor/schedule-timings');
    }

    /*----Schedule timing functions Ends----*/



    /*----Mentee functions Starts----*/

     public function menteeList()
    {

        $view_data=[];

        $mentee_details=Mentee::all();

        $view_data=['mentee_details'=>$mentee_details];
        
        return view('admin.mentee',$view_data);
    }

    /*----Mentee functions Ends----*/


    /*----Booking List functions Starts----*/

    public function bookingList()
    {

        $view_data=[];

        $logged_user=auth()->user();

        $mentor_details=Mentor::where('user_id',$logged_user->id)->first();

        if($mentor_details)
        {

        $booking_details=Booking::where([['mentor_id',$mentor_details->mentor_id],['status','accept']])->paginate(5);
        //$booking_details=Booking::where('mentor_id',$mentor_details->mentor_id)->paginate(5);

}
else
{
    $booking_details=[];
}
        $view_data=['booking_details'=> $booking_details];
        
        return view('mentor.appointments',$view_data);
    }

    public function bookingStatus(Request $request,Booking $booking,$postdata){

        $form=[];

        $booking->status=$postdata;


        //$booking->mentor_id = $booking->mentor_id;

        $booking->save();

        if($postdata == "reject"){

              $stripe = new \Stripe\StripeClient(
  'sk_test_51JJxjTSA5lh0TiF1uJs4FZud97yTEoUKzIzyGx4tXJY9ZhqEICOXhQnxkAWx7HWgqwP7bSXmWuaVQx7EwHnWJG7500GGAjuFzY'
);

       $payer_id = PaymentTransaction::where("booking_id",$booking->booking_id)->first();

       if($payer_id->payment_method == "stripe")
       {

       $response =  $stripe->refunds->create([
  'charge' =>$payer_id->payer_id,
]);
        }

        if($payer_id->payment_method == "paypal")
       {

       $response =  $stripe->refunds->create([
  'charge' =>$payer_id->payer_id,
]);
        }

    }

        return redirect('/mentor/appointments');
    }

    




    /*----Booking List functions Ends----*/


    /*----Invoice List functions Starts----*/

    public function invoiceList()
    {

        $view_data=[];

        $mentor_details = Mentor::where('user_id',auth()->user()->id)->first();

        $booking_ids = Booking::where([['mentor_id',$mentor_details->mentor_id],['status','accept']])->pluck('booking_id')->toArray();

        $invoice_details = Invoice::whereIn('booking_id',$booking_ids)->get()->all();




        $view_data=['invoice_details'=>$invoice_details];
        
        return view('mentor.invoices',$view_data);
    }

    /*----Invoice List functions Ends----*/


    /*----Profile functions Starts----*/

    public function profileView()
    {
        $view_data=[];

        $logged_user=auth()->user();

        $user_detail=User::where('id',$logged_user->id)->first();

        $mentor_details=Mentor::where('user_id',$logged_user->id)->first();

        $view_data=['mentor_details'=>$mentor_details,'user_detail'=>$user_detail];
        
        return view('mentor.profile',$view_data);
    }

    public function profileEdit(Request $request)
    {

        $user=auth()->user();

        $user_detail=User::where('id',$user->id)->first();

        $mentor_details=Mentor::where('user_id',$user->id)->first();
       
        $view_data=['mentor_details'=>$mentor_details,'user_detail'=>$user_detail];
        
        return view('mentor.profile-settings',$view_data);
    }

    public function profileUpdate(Request $request)
    {

        $user=auth()->user();

        $user_detail_form = $request->user_form;

        

        $mentor_details=Mentor::where('user_id',$user->id)->first();

        if(!$mentor_details){
            $form=$request->mentor_form;
           // $form['user_id']=$user->id;
            $mentor_details=Mentor::create($form);
        }
        else{
            $form = $request->mentor_form;
            if($request->content_file)
        {
            $content_file=$request->file('content_file');
            $uploads_dir = storage_path('app/public/').'/'.$user->first_name.$user->id;//public_path().'/storage/'.$content->multi_tenant_uuid.'/'.$content->hash_id;
            if(!File::isDirectory($uploads_dir)){
            File::makeDirectory($uploads_dir);

            
                }
   
          //  $uploads_dir=storage_path('public').'/'.$content->multi_tenant_uuid.'/'.$content->hash_id;
            // set
            $filename = $content_file->hashName();
            $filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);
            $original_filename = $content_file->getClientOriginalName();
            $file_ext = $content_file->getClientOriginalExtension();
            $file_realpath = $content_file->getRealPath();
            $thumb_filename = $filename_without_ext.'-thumb.'.$file_ext;

                //dd($uploads_dir)

            // save file
            //$request->content_file->store($uploads_dir, 'public');

            // read image from temporary file
            $img = Image::make($content_file);

            // resize image
           $img->fit(1280, 720)->save($uploads_dir.'/'.$filename);

            $img_path='/storage/'.$user->first_name.$user->id.'/'.$filename;
             //$form['profile_image']=$img_path;
             $user_detail_form['profile_image'] = $img_path;

           }
            $user->update($user_detail_form);
            $mentor_details->update($form);
        }


       
        
        return redirect('/mentor/profile');
    }

    /*----Profile functions Ends----*/


    /*----Blog functions Starts----*/


    public function blogList()
    {

        $view_data=[];

        $user_detail=auth()->user();

        $mentor_details=Mentor::where('user_id',$user_detail->id)->first();

        $blog_details=Blog::where('mentor_id',$mentor_details->mentor_id)->get()->all();

        $view_data=['blog_details'=>$blog_details,'user_detail'=>$user_detail,'mentor_details'=>$mentor_details];
        
        return view('mentor.blog',$view_data);
    }

    public function blogCreate()
    {

        $view_data=[];

        $user_detail=auth()->user();

        $mentor_details=Mentor::where('user_id',$user_detail->id)->first();


        $view_data=['user_detail'=>$user_detail,'mentor_details'=>$mentor_details];
        
        return view('mentor.add-blog',$view_data);
    }

    public function blogSave(Request $request)
    {

        $view_data=[];

        $user = auth()->user();

        $form = $request->form;

        if($request->content_file)
        {
            $content_file=$request->file('content_file');
            $uploads_dir = storage_path('app/public/blogs');//public_path().'/storage/'.$content->multi_tenant_uuid.'/'.$content->hash_id;
            if(!File::isDirectory($uploads_dir)){
            File::makeDirectory($uploads_dir);

            
                }
            $uploads_dir = storage_path('app/public/blogs').'/'.$user->first_name.$user->id;//public_path().'/storage/'.$content->multi_tenant_uuid.'/'.$content->hash_id;
            if(!File::isDirectory($uploads_dir)){
            File::makeDirectory($uploads_dir);

            
                }
   
          //  $uploads_dir=storage_path('public').'/'.$content->multi_tenant_uuid.'/'.$content->hash_id;
            // set
            $filename = $content_file->hashName();
            $filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);
            $original_filename = $content_file->getClientOriginalName();
            $file_ext = $content_file->getClientOriginalExtension();
            $file_realpath = $content_file->getRealPath();
            $thumb_filename = $filename_without_ext.'-thumb.'.$file_ext;

                //dd($uploads_dir)

            // save file
            //$request->content_file->store($uploads_dir, 'public');

            // read image from temporary file
            $img = Image::make($content_file);

            // resize image
           $img->fit(1280, 720)->save($uploads_dir.'/'.$filename);

            $img_path='/storage/blogs/'.$user->first_name.$user->id.'/'.$filename;
             //$form['profile_image']=$img_path;
             $form['blog_image'] = $img_path;

           }

        $blog=Blog::create($form);
        
        return redirect('mentor/view-blog/'.$blog->blog_id);
    }

    public function blogView(Request $request,Blog $blog)
    {

        $view_data=[];

        $user_detail=auth()->user();

        $comment_details = Comment::where([['blog_id',$blog->blog_id],['parent_comment_id',null]])->get()->all();

        

        $mentor_details=Mentor::where('user_id',$user_detail->id)->first();

        $blog_details = Blog::where([['blog_id','<>',$blog->blog_id],['mentor_id',$mentor_details->mentor_id]])->get()->take(5)->sortByDesc('created_at');

        $view_data=['user_detail'=>$user_detail,'mentor_details'=>$mentor_details,'blog'=>$blog,'comment_details'=>$comment_details,'blog_details'=>$blog_details];
        
        return view('mentor.blog-details',$view_data);
    }


    public function blogEdit(Request $request, Blog $blog)
    {

        $view_data=[];

        $user_detail=auth()->user();

        $mentor_details=Mentor::where('user_id',$user_detail->id)->first();

        $view_data=['user_detail'=>$user_detail,'mentor_details'=>$mentor_details,'blog'=>$blog];
        
        return view('mentor.edit-blog',$view_data);
    }

     public function blogUpdate(Request $request, Blog $blog)
    {

        $view_data=[];

        $user = auth()->user();

        $form = $request->form;

        if($request->content_file)
        {
            $content_file=$request->file('content_file');
            $uploads_dir = storage_path('app/public/blogs');//public_path().'/storage/'.$content->multi_tenant_uuid.'/'.$content->hash_id;
            if(!File::isDirectory($uploads_dir)){
            File::makeDirectory($uploads_dir);

            
                }
            $uploads_dir = storage_path('app/public/blogs').'/'.$user->first_name.$user->id;//public_path().'/storage/'.$content->multi_tenant_uuid.'/'.$content->hash_id;
            if(!File::isDirectory($uploads_dir)){
            File::makeDirectory($uploads_dir);

            
                }
   
          //  $uploads_dir=storage_path('public').'/'.$content->multi_tenant_uuid.'/'.$content->hash_id;
            // set
            $filename = $content_file->hashName();
            $filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);
            $original_filename = $content_file->getClientOriginalName();
            $file_ext = $content_file->getClientOriginalExtension();
            $file_realpath = $content_file->getRealPath();
            $thumb_filename = $filename_without_ext.'-thumb.'.$file_ext;

                //dd($uploads_dir)

            // save file
            //$request->content_file->store($uploads_dir, 'public');

            // read image from temporary file
            $img = Image::make($content_file);

            // resize image
           $img->fit(1280, 720)->save($uploads_dir.'/'.$filename);

            $img_path='/storage/blogs/'.$user->first_name.$user->id.'/'.$filename;
             //$form['profile_image']=$img_path;
             $form['blog_image'] = $img_path;

           }

        $blog->update($form);
        
        return redirect('mentor/view-blog/'.$blog->blog_id);
    }

    /*----Blog functions Ends----*/

    public function review(){

        $view_data=[];

        $mentor = Mentor::where('user_id',auth()->user()->id)->first();
        $review_details =  Review::where('mentor_id',$mentor->mentor_id)->paginate(5);

        $view_data =['review_details'=>$review_details];

        return view('mentor.reviews',$view_data);
    }
}
