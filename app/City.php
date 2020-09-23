<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Country};

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name','country_id'
    ];

    public function country ()
    {
        return $this->belongsTo(Country::class);
    }
}
