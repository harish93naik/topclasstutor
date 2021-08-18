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

        $user_counts = $users->count();

        $view_data = ['user_counts' => $user_counts,'appointment_counts'=>$appointment_counts];
        
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

    public function blogList(){
        $blog_details = Blog::all();
        $view_data = ['blog_details' => $blog_details];
        return view('admin.blog',$view_data);
    }

    public function blogView(Request $request,Blog $blog)
    {

        /*$view_data=[];

        $user_detail=auth()->user();*/


        $comment_details = Comment::where([['blog_id',$blog->blog_id],['parent_comment_id',null]])->get()->all();

        $mentor_details=Mentor::where('mentor_id',$blog->mentor_id)->first();

        $user_detail = User::where('id',$mentor_details->user_id)->first();

        $view_data=['user_detail'=>$user_detail,'mentor_details'=>$mentor_details,'blog'=>$blog,'comment_details'=>$comment_details];
        
        return view('admin.blog-details',$view_data);
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
}
