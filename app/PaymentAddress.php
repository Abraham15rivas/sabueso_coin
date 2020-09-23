<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentAddress extends Model
{
    protected $fillable = ['company_id','payment_id','address'];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
