<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Review;


class Review extends Model
{

    use SoftDeletes;
    protected $table = 'review';
    protected $fillable = [
                    'mentee_id','mentor_id','rating','review',
        ];
   // protected $hidden = ['password'];
    protected $primaryKey = 'review_id';

    public function mentor()
    {
        return $this->belongsTo('App\Models\Mentor', 'mentor_id', 'mentor_id');
    }
    public function mentee()
    {
        return $this->belongsTo('App\Models\Mentee', 'mentee_id', 'mentee_id');
    }

    public static function getRating($id){

        $rating_details = Review::where('mentor_id',$id)->pluck('rating')->toArray();

        

        return $rating_details;

    }
    public static function getMentee($mentor_id){

        $user = auth()->user()->id;

        $mentee = Mentee::where('user_id',$user)->first();



        $mentee_details = Review::where([['mentee_id',$mentee->mentee_id],['mentor_id',$mentor_id]])->first();

        

        return $mentee_details;

    }

    

}
   