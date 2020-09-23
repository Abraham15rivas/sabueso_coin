<?php

namespace App\Http\Controllers;

use App\{Company, Rating};
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $check_user = auth()->check();
        return view('welcome', compact('check_user'));
    }

    public function map()
    {
        $check_user = auth()->check();
        return view('partials.map', compact('check_user'));
    }

    public function glufco()
    {
        $coordinates = Company::where('glufco', true)->get()->toJson();
        return $coordinates;
    }

    public function showCompany(Company $company)
    {
        return $company;
    }

    public function search(Request $request)
    {
        $query = $request->name;
        $companies = Company::where('name','like','%'.$query.'%')
        ->orWhere('description','like','%'.$query.'%')
        ->withCount('ratings')->get()->load('ratings');
        foreach($companies as $company){
            $sumatoria = 0;
            if(count($company->ratings) > 0){
                foreach($company->ratings as $rating){
                    $sumatoria += $rating->start;
                }
                $company->calif = round($sumatoria/$company->ratings_count);
            }else{
                $company->calif = 0;
            }
        }
       
        return response()->json($companies);
    }

    public function loadRatings($company)
    {
        $ratings = Rating::where('company_id',$company)->with('user')->get()->toJson();
        return $ratings;
    }

    public function rating(Request $request)
    {
        $ratings = Rating::create([
            'comments' => $request->comments,
            'start' => $request->start,
            'company_id' => $request->company_id,
            'user_id' => auth()->user()->id
        ]);
        $ratings = Rating::where('company_id', $request->company_id)->with('user')->get()->toJson();
        return $ratings;
    }

    public function searchRating($company)
    {
        $ratings = Rating::where('user_id', auth()->user()->id)
        ->where('company_id', $company)->get()->toJson();
        return $ratings;
    }

    public function coments()
    {
        return Rating::orderBy('start', 'asc')->with('user')->with('company')->get()->toJson();
    }
}