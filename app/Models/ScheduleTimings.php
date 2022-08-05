<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Mentor;
use App\Models\Booking;


class ScheduleTimings extends Model
{

    use SoftDeletes;
    protected $table = 'schedule_timing';
    protected $fillable = [
                    'mentor_id','start_time','end_time','week_day'
        ];
   // protected $hidden = ['password'];
    protected $primaryKey = 'slot_id';

    public function mentor()
    {
        return $this->belongsTo('App\Models\Mentor', 'mentor_id', 'mentor_id');
    }

    public static function getSlot($day){

        $user=auth()->user();

        $mentor_details=Mentor::where('user_id',$user->id)->first();

        return $slots=ScheduleTimings::where([['mentor_id',$mentor_details->mentor_id],['week_day',$day]])->get()->all();

   }

   public static function getDayNumber($day,$mentor,$postdate){

        $day_number=$day;

       /* switch($day){

            case 'Sunday': $day_number=1;
                            break;

            case 'Monday': $day_number=2;
                           break;
            case 'Tuesday': $day_number=3;
                            break;

            case 'Wednesday': $day_number=4;
                            break;

            case 'Thursday': $day_number=5;
                           break;
            case 'Friday': $day_number=6;
                            break;

            case 'Saturday': $day_number=7;
                            break;
        }*/

       $time = strtotime($postdate);

       $newformat = date('d/m/Y',$time);


       //return $newformat;
       $slot_details = Booking::where([['mentor_id',$mentor],['schedule_date',$newformat],['slot_id','<>',null]])->pluck('slot_id')->toArray();

       $slots =ScheduleTimings::whereNotIn('slot_id',$slot_details)->where([['mentor_id',$mentor],['week_day',$day_number]])->get();


       return $slots;
   }
   

}
   