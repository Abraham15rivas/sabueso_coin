<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class Image extends Model
{
    protected $fillable = ['image', 'featured'];
    
    public function company ()
    {
        //relacion de uno a 1--- una imagen pertenece a una empresa
        return $this->belongsTo(Company::class);
    }

    //accessor, para poder hacer uso de un campo calculado llamado url
    public function getUrlAttribute()
    {
        if (substr($this->image, 0, 4) === "http") {
            return $this->image;
        }

        return '/img/companies/'. $this->image;
    }
}
