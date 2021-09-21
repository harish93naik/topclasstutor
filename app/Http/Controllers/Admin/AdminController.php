<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\User;

use App\Models\Mentor;

use App\Models\Mentee;

use App\Models\Booking;

use App\Models\Invoice;

use App\Models\AdminInfo;

use App\Models\Blog;

use App\Models\Comment;

use Session;

use File;

use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;

use App\Mail\StatusUpdateMail;

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $view_data=[];
        $users = User::where('role','<>','admin')->get();

        $appointments = Booking::where('status','<>','reject')->get();

        $appointment_counts = $appointments->count();

        $mentor_list = Mentor::all()->take(5);

        $mentee_list = Mentee::all()->take(5);

        $user_counts = $users->count();

        $booking_list = Booking::all()->take(5)->sortByDesc('created_at');

        $view_data = ['user_counts' => $user_counts,'appointment_counts'=>$appointment_counts,'mentor_list'=>$mentor_list,'mentee_list'=>$mentee_list,'booking_list'=>$booking_list];
        
        return view('admin.index_admin',$view_data);
    }

    public function mentorList()
    {

        $view_data=[];

        $mentor_details=Mentor::all();

        $view_data=['mentor_details'=>$mentor_details];
        
        return view('admin.mentor',$view_data);
    }

     public function menteeList()
    {

        $view_data=[];

        $mentee_details=Mentee::all();

        $view_data=['mentee_details'=>$mentee_details];
        
        return view('admin.mentee',$view_data);
    }

    public function bookingList()
    {

        $view_data=[];

        $booking_details=Booking::all();

        $view_data=['booking_details'=> $booking_details];
        
        return view('admin.booking-list',$view_data);
    }

    public function invoiceList()
    {

        $view_data=[];

        $invoice_details=Invoice::all();

        $view_data=['invoice_details'=>$invoice_details];
        
        return view('admin.invoice-report',$view_data);
    }

    public function profileView()
    {
        $view_data=[];

        $logged_user=auth()->user();

        $user_detail=User::where('id',$logged_user->id)->first();

        $admin_info=AdminInfo::where('user_id',$logged_user->id)->first();

        $view_data=['admin_info'=>$admin_info,'user_detail'=>$user_detail];
        
        return view('admin.profile',$view_data);
    }

    public function profileUpdate(Request $request)
    {

        $user=auth()->user();

        $user_detail_form = $request->user_form;

        $admin_info=AdminInfo::where('user_id',$user->id)->first();


        if(!$admin_info){
            $form=$request->info_form;
            $form['user_id']=$user->id;
            $admin_info=AdminInfo::create($form);
        }
        else{


            $admin_info->update($request->info_form);


        }

         
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


       
       
        return redirect('/admin/profile');
    }

    

    public function resetPassword(Request $request){

        $user=auth()->user();

         request()->validate([
                'new_password' => ['required', 'string', 'min:6', 'max:50', 'required_with:confirm_password', 'same:confirm_password'],
                'confirm_password' => ['required', 'string', 'min:6', 'max:50']
            ],[],[
            'new_password'=>'New Password',
            'confirm_password'=>'Confirm Password']);

        if(Hash::check($request->current_password, $user->password)) {


                $user->password=Hash::make($request->new_password);
                $user->save();
                $message = "changed";
                 session()->flash('message-success', $message);   

        }
                else{
                $message = "Not changed"; 
                 session()->flash('message-alert', $message);           
        }
        

        // redirect
        return redirect('/admin/profile/');

    }

    public function menteeProfileView(Request $request,Mentee $mentee){

        $view_data = [];

        $view_data = ['mentee'=>$mentee];

        return view('admin.mentee-profile',$view_data);
    }
     public function mentorProfileView(Request $request,Mentor $mentor){

        $view_data = [];

        $view_data = ['mentor'=>$mentor];

        return view('admin.mentor-profile',$view_data);
    }

    public function mentorAdd(Request $request){

         return view('admin.mentor-add');
       /*  $user=User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'role' => $data['role'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'status' => $data['status'],
      
        ]);*/
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

        //$this->validator($request->mentor_form)->validate();


        /* request()->validate($form,[
            'first_name' => ['required', 'max:150'],
            'last_name' => ['required', 'max:150'],
           'email' =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'max:50', 'required_with:password_confirmation', 'same:password_confirmation'],
            'password_confirmation' => ['required', 'string', 'min:6', 'max:50'],
          
        ], [], [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'E-Mail',
            'password' => 'Password',
        ]);
*/


        // update
        $request = $request->merge([
                'form' => array_merge($request->user_form, ['password' => Hash::make($request->user_form['password'])])
            ]);
        

 // Hash::make($request->form['password']);





        $user=User::create($request->user_form);
        $mentor_details = $request->mentor_form;
        $mentor_details['user_id']=$user->id;
        Mentor::create($mentor_details);

         
       /*  $user=User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'role' => $data['role'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'status' => $data['status'],
        ]);*/

        return redirect('/admin/mentor');
    }

    public function mentorStatusUpdate($postdata,$status){
        if(Auth()->user()->role=="admin"){
        $user = User::where('id',$postdata)->first();
        $user->status = $status;
        $user->save();
        $username = $user->first_name;
       Mail::to("harishknaik93@gmail.com")->send(new StatusUpdateMail($username,$status,$user->email));

        return true;
    }
    else
    {
        return view("security");
    }
}

 public function blogList()
    {

        $view_data=[];

        $user_detail=auth()->user();

        $admin_info = AdminInfo::where('user_id',$user_detail->id)->first();
        

        $blog_details=Blog::all();

        $view_data=['blog_details'=>$blog_details,'user_detail'=>$user_detail,'admin_info'=>$admin_info];
        
        return view('admin.blog',$view_data);
    }

    public function blogCreate()
    {

        $view_data=[];

        $user_detail=auth()->user();

        $admin_info = AdminInfo::where('user_id',$user_detail->id)->first();

        if($user_detail->role=="admin")
        {

        
        $view_data=['user_detail'=>$user_detail,'admin_info'=>$admin_info];

       // var_dump($admin_info);
        
        return view('admin.add-blog',$view_data);
    }
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

            $img_path='/storage/app/public/blogs/'.$user->first_name.$user->id.'/'.$filename;
             //$form['profile_image']=$img_path;
             $form['blog_image'] = $img_path;

           }

        $blog=Blog::create($form);
        
        return redirect('admin/view-blog/'.$blog->blog_id);
    }

    public function blogView(Request $request,Blog $blog)
    {

        $view_data=[];

        $user_detail=auth()->user();

        $comment_details = Comment::where([['blog_id',$blog->blog_id],['parent_comment_id',null]])->get()->all();

        

        $admin_info=AdminInfo::where('user_id',$user_detail->id)->first();

        $blog_details = Blog::where('blog_id','<>',$blog->blog_id)->get()->take(5)->sortByDesc('created_at');

        $view_data=['user_detail'=>$user_detail,'admin_info'=>$admin_info,'blog'=>$blog,'comment_details'=>$comment_details,'blog_details'=>$blog_details];
        
        return view('admin.blog-details',$view_data);
    }


    public function blogEdit(Request $request, Blog $blog)
    {

        $view_data=[];

        $user_detail=auth()->user();

        if($user_detail->role=="admin")
        {

        //$mentor_details=Mentor::where('user_id',$user_detail->id)->first();

        $view_data=['user_detail'=>$user_detail,'blog'=>$blog];
        
        return view('admin.edit-blog',$view_data);
    }
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

            $img_path='/storage/app/public/blogs/'.$user->first_name.$user->id.'/'.$filename;
             //$form['profile_image']=$img_path;
             $form['blog_image'] = $img_path;

           }

        $blog->update($form);
        
        return redirect('admin/view-blog/'.$blog->blog_id);
    }

    /*----Blog functions Ends----*/

}
