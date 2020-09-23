<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Country,City};

class CountryController extends Controller
{
    public function index()
    {
        $cities = City::where('country_id','1')->get()->toJson();
        return $cities;
    }
}
