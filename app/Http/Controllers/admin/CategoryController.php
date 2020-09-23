<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Category};

class CategoryController extends Controller
{
    public function index()
    {
        return view('data.categories.index');
    }

    public function getCategories()
    {
        return Category::orderBy('name', 'asc')->get()->toJson();
    }

    public function store(Request $request)
    {
        return Category::create($request->all());
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);       
        $category->delete();
    }
}
