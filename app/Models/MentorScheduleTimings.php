<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class MentorScheduleTimings extends Model
{

    use SoftDeletes;
    protected $table = 'mentor_schedule_timings';
    protected $fillable = [
                    'mentor_id','title','start','end','start_recur','end_recur'
        ];
   // protected $hidden = ['password'];
    protected $primaryKey = 'event_id';

    public function mentor()
    {
        return $this->belongsTo('App\Models\Mentor', 'mentor_id', 'mentor_id');
    }

   
   

}
   