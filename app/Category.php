<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Company};

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name', 'description'
    ];

    public function companies ()
    {
        return $this->belongsToMany(Company::class)->withTimestamps();
    }
}
