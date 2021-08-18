<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Invoice extends Model
{

    use SoftDeletes;
    protected $table = 'invoice';
    protected $fillable = [
                    'booking_id','amount','status'];
   // protected $hidden = ['password'];
    protected $primaryKey = 'invoice_id';

    public function booking()
    {
        return $this->belongsTo('App\Models\Booking', 'booking_id', 'booking_id');
    }

    

}
   