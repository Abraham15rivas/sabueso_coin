<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'name', 'surname', 'nacionalidad', 'cedula', 'date_birth', 'phone', 'nation', 'address', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
