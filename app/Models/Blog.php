<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Comment;


class Blog extends Model
{

    use SoftDeletes;
    protected $table = 'blog';
    protected $fillable = [
                    'mentor_id','blog_category','blog_title','description','blog_image','status'
        ];
   // protected $hidden = ['password'];
    protected $primaryKey = 'blog_id';

    public function mentor()
    {
        return $this->belongsTo('App\Models\Mentor', 'mentor_id', 'mentor_id');
    }

    public static function getCount($id){

        $comments = Comment::where('blog_id',$id)->get();

        $count = $comments->count();

        return $count;

    }

    

}
   