<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ZoomMeeting extends Model
{

    use SoftDeletes;
    protected $table = 'zoom_meeting';
    protected $fillable = [
                    'meeting_id','booking_id','start_time','end_time'
        ];
   // protected $hidden = ['password'];
    protected $primaryKey = 'meeting_id';

   /* public function user()
    {
        return $this->belongsTo('App\Models\user', 'user_id', 'id');
    }
*/
    

}
   