<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Event extends Model
{

    use SoftDeletes;
    protected $table = 'event';
    protected $fillable = [
                    'title','start','end'];
   // protected $hidden = ['password'];
    protected $primaryKey = 'id';

    /*public function booking()
    {
        return $this->belongsTo('App\Models\Booking', 'booking_id', 'booking_id');
    }*/

    

}
   