<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Company, User};

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable = [
        'comments', 'start', 'company_id', 'user_id'
    ];

    public function company ()
    {
        return $this->belongsTo(Company::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}
