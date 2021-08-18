<?php

namespace App\Http\Controllers\Guest;

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

class CommentController extends Controller
{

   public function save(Request $request,Blog $blog)
    {

        $view_data=[];

        $form=$request->form;
        if($request->parent_comment_id){
        	$form['parent_comment_id']=$request->parent_comment_id;
        }
        $form['blog_id']=$blog->blog_id;

        $comment=Comment::create($form);
        
        return redirect('mentor/view-blog/'.$blog->blog_id);
    }


  }

