<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['name'];

    public function companies(){
        return $this->belongsToMany(Company::class)->withTimestamps();
    }
}
