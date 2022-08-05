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
        'first_name','last_name','category','degree','phone_number','email', 'password','status','role','profile_image','segment','description','resume'
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

    public function getSegmentDescriptionAttribute(){

        $segment=$this->segment;
        if ($segment=='primary'){
            return 'Primary';
        }
        elseif ($segment=='secondary'){
            return 'Secondary';
        }
        elseif ($segment=='trade_school'){
            return 'Trade & Apprenticeships';
        }
         elseif ($segment=='graduate'){
            return 'Graduate';
        }
        elseif ($segment=='post_graduate'){
            return 'Post Graduate';
        }
         elseif ($segment=='doctorate'){
            return 'Doctorate';
        }
       else{
        return '';
       }
    }

    

    public static function getPaymentAmount($segment){

        $segment = strtoupper($segment);

        switch($segment){


            case 'PRIMARY': 
                             return 35;
                             break;
            case 'SECONDARY': 
                            return 45;
                            break;
            case 'TRADE_SCHOOL': 
                            return 50;
                            break;
            case 'GRADUATE':
                            return 58;
                            break;
             case 'POST_GRADUATE': 
                            return 70;
                            break;
            case 'DOCTORATE':
                            return 85;
                            break;

            default: return 0;
                    break;
        }
    }
   
}
