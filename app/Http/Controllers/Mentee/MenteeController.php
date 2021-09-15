<?php

namespace App\Http\Controllers\Mentee;

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

use App\Models\Comment;

use App\Models\Review;

use File;

use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Hash;
class MenteeController extends Controller
{
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

         $logged_user=auth()->user();

        $mentee_details=Mentee::where('user_id',$logged_user->id)->first();

        $appointments = Booking::where([['status','<>','reject'],['mentor_id',$mentee_details->mentee_id]])->get();

        $appointment_counts = $appointments->count();

        if($mentee_details)
        {

        $booking_details=Booking::where('mentee_id',$mentee_details->mentee_id)->get()->all();

}
else
{
    $booking_details=[];
}
        $view_data=['booking_details'=> $booking_details,'appointment_counts'=>$appointment_counts];

        return view('mentee.dashboard-mentee',$view_data);
    }

    /*----Schedule timing functions starts----*/

    public function scheduleTimings()
    {

        $view_data=[];

        $logged_user=auth()->user();


         $mentor_details=Mentor::where('user_id',$logged_user->id)->first();

         if($mentor_details)
         {
            $schedule_details=ScheduleTimings::where('mentor_id',$mentor_details->mentor_id)->get()->all();
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


         $mentor_details=Mentor::where('user_id',$logged_user->id)->first();

         $form=$request->form;

         $form['mentor_id']=$mentor_details->mentor_id;

         $schedule_details = ScheduleTimings::create($form);
      

        $view_data=['schedule_details'=>$schedule_details];
        
        return redirect('/mentor/schedule-timings');
    }

    /*----Schedule timing functions Ends----*/



    /*----Mentee functions Starts----*/

     public function mentorList(Request $request)
    {
/*
        $view_data=[];

        $mentor_details=Mentor::all();


        $view_data=['mentor_details'=>$mentor_details];
        
        return view('mentee.map-list',$view_data);*/
        $no_of_mentors = Mentor::all();
        $count_of_mentors = sizeof($no_of_mentors);
        $mentors = Mentor::paginate(2);        
        $data = '';
        if ($request->ajax()) {
            foreach ($mentors as $mentor) {
                 $star = '';
    $default_star = '';
                                                $rating = Review::getRating($mentor->mentor_id);
                                                    $count = sizeof($rating);
                                                    $avg = ($count!=0)?ceil(array_sum($rating)/$count):1;
                                                for ($i=0;$i<$avg;$i++) { 
                                                   $star.='<i class="fas fa-star filled"></i>';
                                                }
                                                for ($i=0;$i<5-$avg;$i++) { 
                                                   $default_star.='<i class="fas fa-star"></i>';
                                                }
                $data.='<div class="card">
                            <div class="card-body">
                                <div class="mentor-widget">
                                    <div class="user-info-left">
                                        <div class="mentor-img">
                                            <a href="/profile/'.$mentor->mentor_id.'">
                                                <img src="'.$mentor->user->profile_image.'" class="img-fluid" alt="User Image">
                                            </a>
                                        </div>
                                        <div class="user-info-cont">
                                            <h4 class="usr-name"><a href="/profile/'.$mentor->mentor_id.'">'.$mentor->user->first_name.' &nbsp;'.$mentor->user->last_name.'</a></h4>
                                            <p class="mentor-type">'.$mentor->user->category_description.'</p>
                                            <div class="rating">
                                               '.$star.$default_star.'
                                                <span class="d-inline-block average-rating">('.$count.')</span>
                                            </div>
                                            <div class="mentor-details">
                                                <p class="user-location"><i class="fas fa-map-marker-alt"></i>'.$mentor->state.','.$mentor->country.' </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-info-right">
                                        <div class="user-infos">
                                            <ul>
                                                <input type="hidden" value="'.$count_of_mentors.'" id="mentor-result"/>
                                                <li><i class="far fa-comment"></i> 17 Feedback</li>
                                                <li><i class="fas fa-map-marker-alt"></i>'.$mentor->state.','.$mentor->country.'</li>
                                                <li><i class="far fa-money-bill-alt"></i>$500<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li>
                                            </ul>
                                        </div>
                                        <div class="mentor-booking">
                                            <a class="apt-btn" href="/mentee/booking/'.$mentor->mentor_id.'">Book Appointment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
            }
            return $data;
        }

        return view('mentee.map-list',compact('mentors'));

    }

    /*----Mentee functions Ends----*/


    /*----Booking List functions Starts----*/

    public function bookingList()
    {

        $view_data=[];

        $logged_user=auth()->user();

        $mentee_details=Mentee::where('user_id',$logged_user->id)->first();

        if($mentee_details)
        {

        $booking_details=Booking::where('mentee_id',$mentee_details->mentee_id)->get()->all();

}
else
{
    $booking_details=[];
}
        $view_data=['booking_details'=> $booking_details];
        
        return view('mentee.bookings-mentee',$view_data);
    }

    public function bookingForm(Request $request, Mentor $mentor)
    {

        $view_data=[];

        $schedule_details = ScheduleTimings::where('mentor_id',$mentor->mentor_id)->get()->all();

        $view_data = ['schedule_details'=> $schedule_details,'mentor'=>$mentor];
        
        return view('mentee.booking',$view_data);
    }

     public function bookingDay($postData,$mentor_id,$postdate)
    {

        $view_data=[];



        $schedule_details = ScheduleTimings::getDayNumber($postData,$mentor_id,$postdate);

        //$schedule_details = ScheduleTimings::where('mentor_id',$mentor->mentor_id)->get()->all();

        //$view_data = ['schedule_details'=> $schedule_details];

        return json_encode($schedule_details);
        
        //return view('mentee.booking',$view_data);
    }

    public function paymentPage(Request $request)
    {

        $view_data=[];

        $form=$request->form;

        $mentor_details = Mentor::where('mentor_id',$request->mentor_id)->first();

        $view_data=['scheduled_date'=>$request->scheduled_date,'scheduled_time'=>$request->scheduled_time,'mentor_details'=>$mentor_details,'amount'=>$request->amount,'slot_id'=>$request->slot_id];




        //$schedule_details = ScheduleTimings::getDayNumber($postData,$mentor_id);

        //$schedule_details = ScheduleTimings::where('mentor_id',$mentor->mentor_id)->get()->all();

        //$view_data = ['schedule_details'=> $schedule_details];

        
        return view('mentee.checkout',$view_data);
    }

    public function bookingSuccess(Request $request, Invoice $invoice){

        $view_data=['invoice'=>$invoice];

        return view('mentee.booking-success',$view_data);
    }

    public function bookingInvoice(Request $request, Booking $booking){

        $view_data=['booking'=>$booking];

        return view('mentee.invoice-view',$view_data);
    }

    /*----Booking List functions Ends----*/


     /*----Invoice List functions Starts----*/

    public function invoiceList()
    {

        $view_data=[];

        $mentee_details = Mentee::where('user_id',auth()->user()->id)->first();

        $booking_ids = Booking::where('mentee_id',$mentee_details->mentee_id)->pluck('booking_id')->toArray();

        $invoice_details = Invoice::whereIn('booking_id',$booking_ids)->get()->all();




        $view_data=['invoice_details'=>$invoice_details];
        
        return view('mentee.invoices',$view_data);
    }


    /*----Profile functions Starts----*/

    public function profileView()
    {
        $view_data=[];

        $logged_user=auth()->user();

        $user_detail=User::where('id',$logged_user->id)->first();

        $mentee_details=Mentee::where('user_id',$logged_user->id)->first();

        $view_data=['mentee_details'=>$mentee_details,'user_detail'=>$user_detail];
        
        return view('mentee.profile',$view_data);
    }

    public function profileEdit(Request $request)
    {

        $user=auth()->user();

        $user_detail=User::where('id',$user->id)->first();

        $mentee_details=Mentee::where('user_id',$user->id)->first();
       
        $view_data=['mentee_details'=>$mentee_details,'user_detail'=>$user_detail];
        
        return view('mentee.profile-settings',$view_data);
    }

    public function profileUpdate(Request $request)
    {

        $user=auth()->user();

        
        $user_detail_form = $request->user_form;

        

        $mentee_details=Mentee::where('user_id',$user->id)->first();

        if(!$mentee_details){
            $form=$request->mentee_form;
           // $form['user_id']=$user->id;
            $mentee_details=Mentee::create($form);
        }
        else{
            $form = $request->mentee_form;
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
            $mentee_details->update($form);
        }


       
        
        return redirect('/mentee/profile');
    }

    /*----Profile functions Ends----*/


    /*----Blog functions Starts----*/


    public function blogList()
    {

        $view_data=[];

        $blog_details=Blog::all();

        $view_data=['blog_details'=>$blog_details];
        
        return view('mentee.blog',$view_data);
    }

    

    public function blogView(Request $request,Blog $blog)
    {

        $view_data=[];

        $blog_details = Blog::where('blog_id','<>',$blog->blog_id)->get()->take(5)->sortByDesc('created_at');

        $comment_details = Comment::where([['blog_id',$blog->blog_id],['parent_comment_id',null]])->get()->all();

        $view_data=['blog'=>$blog,'comment_details'=>$comment_details,'blog_details'=>$blog_details];
        
        return view('mentee.blog-details',$view_data);
    }


    


    /*----Blog functions Ends----*/
}
