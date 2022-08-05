<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BookingTimings extends Model
{

    use SoftDeletes;
    protected $table = 'booking_timings';
    protected $fillable = [
                    'mentor_id','mentee_id','event_id',/*,'schedule_time','schedule_date',*/'meeting_url','meeting_id','meeting_uuid','status'
        ];
   // protected $hidden = ['password'];
    protected $primaryKey = 'event_booking_id';

    public function mentor()
    {
        return $this->belongsTo('App\Models\Mentor', 'mentor_id', 'mentor_id');
    }

    public function mentee()
    {
        return $this->belongsTo('App\Models\Mentee', 'mentee_id', 'mentee_id');
    }

    public function events(){
        return $this->belongsTo('App\Models\MentorScheduleTimings','event_id','event_id');
    }

     public function getStatusDescriptionAttribute(){

        $status=$this->status;
        if ($status=='reject'){
            return 'Cancelled';
        }
        elseif ($status=='accept'){
            return 'Approved';
        }
        else{
            return "Pending";
        }
    }

   

    

}
   