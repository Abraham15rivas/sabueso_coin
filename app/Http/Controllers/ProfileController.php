<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Profile};

class ProfileController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $request['user_id'] = auth()->user()->id;
        $profile = Profile::create($request->all());
        
        return $profile->toJson();
    }

    public function show($id)
    {
        $profile = Profile::where('user_id', auth()->user()->id)
                            ->first();
        return $profile;
    }

    public function update(Request $request, Profile $profile)
    {
        if ($request->user_id == auth()->user()->id) {
            $profile->update($request->all());
        } else {
            return response()->json('error');
        }
    }

    public function destroy($id)
    {
        //
    }
}
