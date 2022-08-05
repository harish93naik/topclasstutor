<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\Mentee;
use App\Models\Blog;
use App\Models\User;
use Symfony\Component\Console\Input\Input;
use App\Models\Comment;
use App\Models\Review;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

use Session;

use File;


use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $view_data = [];
        $user_details = User::where('status','active')->pluck('id')->toArray();
        $mentor_details = Mentor::whereIn('user_id',$user_details)->get()->all();

        $blog_details = Blog::all()->take(4)->sortByDesc('created_at');


        $view_data = ['mentor_details'=>$mentor_details,'blog_details'=>$blog_details];
        
        return view('index',$view_data);
    }

     public function search(Request $request)
    {

        $view_data = [];

        $form = [];

        if($request->input('categories'))
        {
            //\View::make('search.empty');
            //$data="";
            $myString = $request->input('categories');
            $form = explode(',', $myString);

        //$form = $request->input('categories');
        
        $user_detail = User::whereIn('segment',$form)->where('status','active')->pluck('id')->toArray();

        $mentor_count = sizeof($user_detail);

        $mentor_details = Mentor::whereIn('user_id',$user_detail)->paginate(2);
      

        }

        //var_dump($mentor_details);

        elseif($request->input('category'))
        {
        $category = $request->input('category');

        $user_detail = [];
        $user_detail = User::where([['category',$category],['status','active']])->pluck('id')->toArray();

         $mentor_count = sizeof($user_detail);

        $mentor_details = Mentor::whereIn('user_id',$user_detail)->paginate(2);
    }

        elseif($request->input('segment'))
        {
        $segment = $request->input('segment');

        $user_detail = [];
        $user_detail = User::where([['segment',$segment],['status','active']])->pluck('id')->toArray();

         $mentor_count = sizeof($user_detail);

        $mentor_details = Mentor::whereIn('user_id',$user_detail)->paginate(2);
    }

    else
    {
       $user_detail = User::where('status','active')->pluck('id')->toArray(); 

        $mentor_details = Mentor::whereIn('user_id',$user_detail)->paginate(2);

        $mentor_result_count = Mentor::whereIn('user_id',$user_detail)->get()->all();

        $mentor_count = sizeof($mentor_result_count);
    }
   //var_dump($mentor_details);

    $data = '';
   
        if ($request->ajax()) {
            foreach ($mentor_details as $mentor) {

                   /*  $star = '';
    $default_star = '';*/
    $appointment_btn = "";
    $profile_img ="";
    if($mentor->user->profile_image!=null){
      $profile_img = '<img src="'.$mentor->user->profile_image.'" class="img-fluid" alt="'.$mentor->user->first_name.'">';

    }
    else{

        $profile_img= '<img  src="/assets/img/user/home_page_user.jpg" class="img-fluid" alt="'.$mentor->user->first_name.'">';
    }
                          
                                          /*$rating = Review::getRating($mentor->mentor_id);
                                                    $count = sizeof($rating);
                                                    $avg = ($count!=0)?ceil(array_sum($rating)/$count):1;
                                                for ($i=0;$i<$avg;$i++) { 
                                                   $star.='<i class="fas fa-star filled"></i>';
                                                }
                                                for ($i=0;$i<5-$avg;$i++) { 
                                                   $default_star.='<i class="fas fa-star"></i>';
                                                }*/
                if(auth()->user()){

                    if(auth()->user()->role=="mentee")
                    {
                        $appointment_btn =  '<div class="mentor-booking">
                                            <a class="apt-btn" href="/mentee/booking/'.$mentor->mentor_id.'">Book Appointment</a>
                                        </div>';
                    }
                }
                else{
                     $appointment_btn = '<div class="mentor-booking">
                                            <a class="apt-btn" href="/login-topclasstutors">Book Appointment</a>
                                        </div>';
                }

                $data.='<div class="card">
                            <div class="card-body">
                                <div class="mentor-widget">
                                    <div class="user-info-left">
                                        <div class="mentor-img">
                                            <a href="profile/'.$mentor->mentor_id.'">
                                                '.$profile_img.'
                                            </a>
                                        </div>
                                        <div class="user-info-cont">
                                            <h4 class="usr-name"><a href="profile/'.$mentor->mentor_id.'">'.$mentor->user->first_name.' &nbsp;'.$mentor->user->last_name.'</a></h4>
                                            <p class="mentor-type">'.$mentor->user->degree.'</p>
                                            
                                            <div class="mentor-details">
                                                <p class="user-location"><i class="fas fa-map-marker-alt"></i>'.$mentor->state.','.$mentor->country.' </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-info-right">
                                        <div class="user-infos">
                                        <input type="hidden" value="'.$mentor_count.'" id="mentor-result"/>
                                           
                                        </div>'.$appointment_btn.'
                                      
                                    </div>
                                </div>
                            </div>
                        </div>';
            }

            return $data;
        }

        return view('search',compact('mentor_details'));



       // $blog_details = Blog::all()->take(4)->sortByDesc('created_at');;

      
    }

    public function blogList(){

        $view_data = [];

        $blog_details = Blog::paginate(2);

        $latest_blog = Blog::get()->take(5)->sortByDesc('created_at');

        //return view('blog-list', compact('blog_details'));

        $view_data = ['blog_details'=>$blog_details,'latest_blog'=>$latest_blog];

        return view('blog-list',$view_data);
    }
    public function blogDetail(Request $request, Blog $blog){

        $view_data = [];

        $blog_details = Blog::where('blog_id','<>',$blog->blog_id)->get()->take(5)->sortByDesc('created_at');

        $comment_details = Comment::where([['blog_id',$blog->blog_id],['parent_comment_id',null]])->get()->all();

        $view_data = ['blog'=>$blog,'comment_details' =>$comment_details,'blog_details'=>$blog_details];

        return view('blog-details',$view_data);
    }
    public function profileView(Request $request, Mentor $mentor){

        $view_data = [];
        
        /*$blog_details = Blog::where('blog_id','<>',$blog->blog_id)->get()->take(5)->sortByDesc('created_at');

        $comment_details = Comment::where([['blog_id',$blog->blog_id],['parent_comment_id',null]])->get()->all();*/

        $view_data = ['mentor'=>$mentor];

        return view('profile',$view_data);
    }
     
    public function searchcat()
    
{
    $categories = \Input::get('categories');

    $vacancies = User::whereIn('category', $categories)->get();

    return \View::make('search.empty')->with('vacancies', $vacancies); 
}
public function mentorReview(Request $request,Mentor $mentor,$postdata,$feedback){

    $mentee = Mentee::where('user_id',auth()->user()->id)->first();
    $form = [];
    $form['mentee_id'] = $mentee->mentee_id;
    $form['rating'] = $postdata;
    $form['review'] = $feedback;
    $form['mentor_id'] = $mentor->mentor_id;
    $review_details = Review::create($form);

    return json_encode($review_details);
}
  protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','required_with:password_confirmation', 'same:password_confirmation'],
             'password_confirmation' => ['required', 'string', 'min:6', 'max:50'],
           //'role'=>['required'],
        'phone_number'=>['required'],

        ]);
    }
 public function mentorSave(Request $request){

        $form = [];
        $form = $request->form;

        $this->validator($request->user_form)->validate();

         /* if($request->content_file)
        {

            $content_file=$request->file('content_file');
            if ($content_file->getClientMimeType() !== 'application/pdf')
{
    $message = "Please upload the Pdf file only"; 
                 session()->flash('message-alert', $message); 
   return redirect('/mentor-register');
}
}
else{
     $message = "Please attach your Resume"; 
                 session()->flash('message-alert', $message); 
  return redirect('/mentor-register');
}*/

 $request = $request->merge([
                'user_form' => array_merge($request->user_form, ['password' => Hash::make($request->user_form['password'])])
            ]);

  $user=User::create($request->user_form);

   $mentor_details = $request->mentor_form;
    $mentor_details['user_id']=$user->id;
    $mentor=Mentor::create($mentor_details);
   
//Resume Upload     
  $resume_dir = $user->first_name.$user->id.'/Resume';
  $resumePath = Mentor::uploadFilePath($request->content_file,$resume_dir);
  $user->resume = '/storage/app/public/'.$resumePath;

//Profile Image
  $profile_file=$request->file('profile_image');
            $profile_dir = storage_path('app/public/').$user->first_name.$user->id.'/profile';//public_path().'/storage/'.$content->multi_tenant_uuid.'/'.$content->hash_id;
            if(!File::isDirectory($profile_dir)){
            File::makeDirectory($profile_dir);

            
                }
   
          //  $uploads_dir=storage_path('public').'/'.$content->multi_tenant_uuid.'/'.$content->hash_id;
            // set
            $filename = $profile_file->hashName();
            $filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);
            $original_filename = $profile_file->getClientOriginalName();
            $file_ext = $profile_file->getClientOriginalExtension();
            $file_realpath = $profile_file->getRealPath();
            $thumb_filename = $filename_without_ext.'-thumb.'.$file_ext;

                //dd($uploads_dir)

            // save file
            //$request->content_file->store($uploads_dir, 'public');

            // read image from temporary file
            $img = Image::make($profile_file);

            // resize image
           $img->fit(1280, 720)->save($profile_dir.'/'.$filename);

            $img_path='/storage/app/public/'.$user->first_name.$user->id.'/profile/'.$filename;
             //$form['profile_image']=$img_path;
             $user->profile_image = $img_path;




//LessonPlan Upload     
  $lesson_plan_dir = $user->first_name.$user->id.'/LessonPlan';
  $lessonPath = Mentor::uploadFilePath($request->lesson_plan_file,$lesson_plan_dir);
  $mentor->lesson_plan = '/storage/app/public/'.$lessonPath;

//Mileage Upload     
  $mileage_dir = $user->first_name.$user->id.'/MileageReport';
  $mileagePath = Mentor::uploadFilePath($request->mileage_report_file,$mileage_dir);
  $mentor->mileage_report = '/storage/app/public/'.$mileagePath;

 //Resource plan Upload     
  $resource_lesson_plan_dir = $user->first_name.$user->id.'/Lesson-Resoure-Plan';
  $resourcePath = Mentor::uploadFilePath($request->resource_lesson_plan_file,$resource_lesson_plan_dir);
  $mentor->resource_lesson_plan = '/storage/app/public/'.$resourcePath;





    $mentor->save();
    $user->save();
         

        $message ="Thank you for registering. You will get a activation e-mail from the Admin.";

        session()->flash('message-success',$message); 
    return  redirect('/login-topclasstutors');

      
}
/*Mentee Save */
public function menteeSave(Request $request){

        $form = [];
        $form = $request->form;

        $this->validator($request->user_form)->validate();
        $request = $request->merge([
                'user_form' => array_merge($request->user_form, ['password' => Hash::make($request->user_form['password'])])
            ]);
        $user=User::create($request->user_form);

          /*if($request->content_file)
        {

            $content_file=$request->file('content_file');
            if ($content_file->getClientMimeType() !== 'application/pdf')
{
    $message = "Please upload the Pdf file only"; 
                 session()->flash('message-alert', $message); 
   return redirect('/mentee-register');
}
}
else{
     $message = "Please attach your College Certificate"; 
                 session()->flash('message-alert', $message); 
  return redirect('/mentee-register');
}*/

 /*

 
        
  $uploads_dir = $user->first_name.$user->id;//public_path().'/storage/'.$content->multi_tenant_uuid.'/'.$content->hash_id;
           


        $fileName = time().'_'.$request->content_file->getClientOriginalName();
            $filePath = $request->file('content_file')->storeAs($uploads_dir, $fileName,'public');
        
       
        $mentee_details['certificate'] = '/storage/'.$filePath;*/
         $mentee_details = $request->mentee_form;
        $mentee_details['user_id']=$user->id;
        Mentee::create($mentee_details);

        $message ="Thank you for Registering. You will get a activation e-mail from the Admin.";

        session()->flash('message-success', $message); 
    return  redirect('/login-topclasstutors');

      
}
public function emailCheck($postData)
    {
        // data
      if(auth()->user()){
        if(auth()->user()->email!=$postData){
           /*$emails = User::where('email','<>',auth()->user()->email)->pluck('email')->toArray();*/
           $email_check=User::where('email',$postData)->get()->all();
      }
       
     }
       else{
          $email_check=User::where('email',$postData)->get()->all();
       }
       
        if($email_check!=null)
        {
            return 0;
        }
        else
        {
            return 1;
        }

    }

/*About Page */
public function about(){
    return view('about');
}

/*Contact Page */
public function contact(){
    return view('contact');
}

public function hashGenerator(){
  $hash_generator = Hash::make('12345678');

  $view_data = ['hash_generator'=>$hash_generator];

  return view('hash-generator',$view_data);
  
}

}
