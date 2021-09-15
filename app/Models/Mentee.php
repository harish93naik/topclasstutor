<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mentee extends Model
{

    use SoftDeletes;
    protected $table = 'mentee';
    protected $fillable = [
                    'dob','address1','address2','city','state','zipcode','country','profile_image','gender','user_id'
        ];
   // protected $hidden = ['password'];
    protected $primaryKey = 'mentee_id';

    public function user()
    {
        return $this->belongsTo('App\Models\user', 'user_id', 'id');
    }

    

}
   