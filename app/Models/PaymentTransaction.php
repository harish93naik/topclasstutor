<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PaymentTransaction extends Model
{

    use SoftDeletes;
    protected $table = 'transaction';
    protected $fillable = [
                    'payer_id','payment_id','token','amount','booking_id'
        ];
   // protected $hidden = ['password'];
    protected $primaryKey = 'transaction_id';

    /*public function mentor()
    {
        return $this->belongsTo('App\Models\Mentor', 'mentor_id', 'mentor_id');
    }

    public function mentee()
    {
        return $this->belongsTo('App\Models\Mentee', 'mentee_id', 'mentee_id');
    }*/

    

}
   