<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories= Category::all();
       return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $title=$request->title;
        $active=$request->active ? true:false;
        Category::create([
            'title'=>$title,
            'is_active'=>$active

        ]);
        return redirect()->route('admin.categories.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
       // return view('backend.categories.show',['category'=>$category]);
         return view('backend.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    
    {
        return view('backend.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $title=$request->title;
        $active=$request->active ? true:false;
        
        $category->update([
            'title'=>$title,
            'is_active'=>$active
        ]);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
