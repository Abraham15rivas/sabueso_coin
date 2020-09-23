<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Category, Rating};

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'name', 'description', 'phone', 'logo', 'address', 'web_page', 'social_networks', 'nation', 'municipality', 'parish', 'upn_coordinates', 'glufco'
    ];

    public function categories ()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function payments(){
        return $this->belongsToMany(Payment::class)->withTimestamps();
    }

    public function paymentsAdresses(){
        return $this->hasMany(PaymentAdress::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function images()
    {
        //relacion de uno a muchos--- una empresa tiene muchas imagenes
        return $this->hasMany(Image::class);
    }
}
