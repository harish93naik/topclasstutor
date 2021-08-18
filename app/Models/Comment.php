<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{

    use SoftDeletes;
    protected $table = 'comment';
    protected $fillable = [
                    'blog_id','comment','parent_comment_id','commentor_email','commentor_name'
        ];
   // protected $hidden = ['password'];
    protected $primaryKey = 'comment_id';

    public function blog()
    {
        return $this->belongsTo('App\Models\Blog', 'blog_id', 'blog_id');
    }

    public static function getReplies($comment_id){

        $replies=Comment::where('parent_comment_id',$comment_id)->get()->all();

        return $replies;
    }

    

}
   