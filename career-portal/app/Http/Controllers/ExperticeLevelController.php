<?php

namespace App\Http\Controllers;

use App\Models\ExperticeLevel;
use Illuminate\Http\Request;

class ExperticeLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experticeslevel=ExperticeLevel::all();
        return view('backend.experticeslevel.index',compact('experticeslevel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.experticeslevel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title=$request->title;
        $active=$request->active ? true:false;
        ExperticeLevel::create([
            'title'=>$title,
            'is_active'=>$active

        ]);
        return redirect()->route('admin.experticeslevel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExperticeLevel $experticeslevel)
    {
        // dd($experticeslevel);
        return view('backend.experticeslevel.show',compact('experticeslevel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExperticeLevel $experticeslevel)
    {
        return view('backend.experticeslevel.edit',compact('experticeslevel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExperticeLevel $experticeslevel)
    {
        $title=$request->title;
        $active=$request->active ? true:false;

        $experticeslevel->update([
            'title'=>$title,
            'is_active'=>$active
        ]);
        return redirect()->route('admin.experticeslevel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExperticeLevel $experticeslevel)
    {
        $experticeslevel->delete();
        return redirect()->route('admin.experticeslevel.index');
    }
}
