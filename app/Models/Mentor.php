<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mentor extends Model
{

    use SoftDeletes;
    protected $table = 'mentor';
    protected $fillable = [
                    'dob','course_name','address1','address2','city','state','zipcode','country','profile_img','course','price','description','gender','user_id'
        ];
   // protected $hidden = ['password'];
    protected $primaryKey = 'mentor_id';

    public function user()
    {
        return $this->belongsTo('App\Models\user', 'user_id', 'id');
    }

    

}
   