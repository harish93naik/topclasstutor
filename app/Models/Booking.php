<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Booking extends Model
{

    use SoftDeletes;
    protected $table = 'booking';
    protected $fillable = [
                    'mentor_id','mentee_id','slot_id','schedule_time','schedule_date','status'
        ];
   // protected $hidden = ['password'];
    protected $primaryKey = 'booking_id';

    public function mentor()
    {
        return $this->belongsTo('App\Models\Mentor', 'mentor_id', 'mentor_id');
    }

    public function mentee()
    {
        return $this->belongsTo('App\Models\Mentee', 'mentee_id', 'mentee_id');
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
   