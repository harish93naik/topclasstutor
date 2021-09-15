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
        $mentor_details = Mentor::all();

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
        
        $user_detail = User::whereIn('segment',$form)->pluck('id')->toArray();

        $mentor_count = sizeof($user_detail);

        $mentor_details = Mentor::whereIn('user_id',$user_detail)->paginate(2);
      

        }

        //var_dump($mentor_details);

        elseif($request->input('category'))
        {
        $category = $request->input('category');

        $user_detail = [];
        $user_detail = User::where('category',$category)->pluck('id')->toArray();

         $mentor_count = sizeof($user_detail);

        $mentor_details = Mentor::whereIn('user_id',$user_detail)->paginate(2);
    }

        elseif($request->input('segment'))
        {
        $segment = $request->input('segment');

        $user_detail = [];
        $user_detail = User::where('segment',$segment)->pluck('id')->toArray();

         $mentor_count = sizeof($user_detail);

        $mentor_details = Mentor::whereIn('user_id',$user_detail)->paginate(2);
    }

    else
    {
        $mentor_details = Mentor::paginate(2);

        $mentor_result_count = Mentor::all();

        $mentor_count = sizeof($mentor_result_count);
    }
   //var_dump($mentor_details);

    $data = '';
   
        if ($request->ajax()) {
            foreach ($mentor_details as $mentor) {

                     $star = '';
    $default_star = '';
    $appointment_btn = "";
                          
                                          $rating = Review::getRating($mentor->mentor_id);
                                                    $count = sizeof($rating);
                                                    $avg = ($count!=0)?ceil(array_sum($rating)/$count):1;
                                                for ($i=0;$i<$avg;$i++) { 
                                                   $star.='<i class="fas fa-star filled"></i>';
                                                }
                                                for ($i=0;$i<5-$avg;$i++) { 
                                                   $default_star.='<i class="fas fa-star"></i>';
                                                }
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
                                            <a class="apt-btn" href="/login">Book Appointment</a>
                                        </div>';
                }

                $data.='<div class="card">
                            <div class="card-body">
                                <div class="mentor-widget">
                                    <div class="user-info-left">
                                        <div class="mentor-img">
                                            <a href="profile/'.$mentor->mentor_id.'">
                                                <img src="'.$mentor->user->profile_image.'" class="img-fluid" alt="User Image">
                                            </a>
                                        </div>
                                        <div class="user-info-cont">
                                            <h4 class="usr-name"><a href="profile/'.$mentor->mentor_id.'">'.$mentor->user->first_name.' &nbsp;'.$mentor->user->last_name.'</a></h4>
                                            <p class="mentor-type">'.$mentor->user->category_description.'('.$mentor->user->degree.')</p>
                                            <div class="rating">'.$star.$default_star.'
                                                

                                               
                                               
                                                <span class="d-inline-block average-rating">('.$count.')</span>
                                            </div>
                                            <div class="mentor-details">
                                                <p class="user-location"><i class="fas fa-map-marker-alt"></i>'.$mentor->state.','.$mentor->country.' </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-info-right">
                                        <div class="user-infos">
                                        <input type="hidden" value="'.$mentor_count.'" id="mentor-result"/>
                                            <ul>
                                                <li><i class="far fa-comment"></i> 17 Feedback</li>
                                                <li><i class="fas fa-map-marker-alt"></i>'.$mentor->state.','.$mentor->country.'</li>
                                                <li><i class="far fa-money-bill-alt"></i>$500<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li>
                                            </ul>
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
}
