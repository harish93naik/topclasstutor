<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AdminInfo extends Model
{

    use SoftDeletes;
    protected $table = 'admin_info';
    protected $fillable = [
                    'dob','address','city','state','zipcode','country','profile_img','user_id'
        ];
   // protected $hidden = ['password'];
    protected $primaryKey = 'admin_info_id';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    

}
   