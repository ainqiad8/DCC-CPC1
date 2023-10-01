<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobtypes=JobType::all();
        return view('backend.jobtypes.index',compact('jobtypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.jobtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title=$request->title;
        $active=$request->active ? true:false;
        JobType::create([
            'title'=>$title,
            'is_active'=>$active

        ]);
        return redirect()->route('admin.jobtypes.index');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(JobType $jobtype)
    {
        return view('backend.jobtypes.show',compact('jobtype'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobType $jobtype)
    {
        return view('backend.jobtypes.edit',compact('jobtype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobType $jobtype)
    {
        $title=$request->title;
        $active=$request->active ? true:false;
        
        $jobtype->update([
            'title'=>$title,
            'is_active'=>$active
        ]);
        return redirect()->route('admin.jobtypes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobType $jobtype)
    {
        $jobtype->delete();
        return redirect()->route('admin.jobtypes.index');
    }
}
