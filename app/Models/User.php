<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','category','degree','phone_number','email', 'password','status','role','profile_image','segment'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function getCategoryDescriptionAttribute(){

        $category=$this->category;
        if ($category=='english'){
            return 'English';
        }
        elseif ($category=='mathematics'){
            return 'Mathematics';
        }
        elseif ($category=='physics'){
            return 'Physics';
        }
         elseif ($category=='chemistry'){
            return 'Chemistry';
        }
        elseif ($category=='technology'){
            return 'Technology Education';
        }
         elseif ($category=='science'){
            return 'Science';
        }
        elseif ($category=='education'){
            return 'Education';
        }
         elseif ($category=='sports'){
            return 'Sports';
        }
        elseif ($category=='geography'){
            return 'Geography';
        }
        else{
            return "History";
        }
    }
}
