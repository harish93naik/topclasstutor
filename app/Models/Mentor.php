<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;


class Mentor extends Model
{

    use SoftDeletes;
    protected $table = 'mentor';
    protected $fillable = [
                    'dob','course_name','address1','address2','city','state','zipcode','country','profile_img','course','price','description','gender','user_id','trn_no','exp_date','tutoring_exp','acc_no','mileage_report','lesson_plan','resource_lesson_plan','language_spoken','ird_no'
        ];
   // protected $hidden = ['password'];
    protected $primaryKey = 'mentor_id';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public static function uploadFilePath($file,$path){
         $fileName = time().'_'.$file->getClientOriginalName();
         $filePath = $file->storeAs($path, $fileName,'public');

         return $filePath;
    }

    

}
   