<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Category;
use App\Models\ExperticeLevel;
use App\Models\Job;
use App\Models\JobType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::all();
        return view('backend.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::where('is_active', true)->get();
        $jobtypes = JobType::where('is_active', true)->get();
        $experiencelevels = ExperticeLevel::where('is_active', true)->get();
        return view('backend.jobs.create', compact('categories', 'jobtypes', 'experiencelevels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {

        $data = $request->only('title', 'company_name', 'company_details', 'vacancy', 'description', 'short_experience_requirements', 'experience_requirements', 'educational_requirements', 'additional_requirements', 'job_location', 'salary', 'benefits', 'age', 'apply_instruction', 'apply_procedure', 'deadline', 'category_id');
        $data['is_active'] = $request->is_active ? true : false;
        $data['has_online_apply'] = $request->has_online_apply ? true : false;
        $data['gender'] = json_encode($request->gender);
        DB::beginTransaction();
        try {
            $job = Job::create($data);
            $job->jobtypes()->attach($request->jobtypes);
            $job->experticelevels()->attach($request->experience_level);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->route('admin.jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('backend.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $categories = Category::where('is_active', true)->get();
        $jobtypes = JobType::where('is_active', true)->get();
        $experiencelevels = ExperticeLevel::where('is_active', true)->get();

        return view('backend.jobs.edit', compact('job', 'categories', 'jobtypes', 'experiencelevels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Job $job)
    {
        $data = $request->only('title', 'company_name', 'company_details', 'vacancy', 'description', 'short_experience_requirements', 'experience_requirements', 'educational_requirements', 'additional_requirements', 'job_location', 'salary', 'benefits', 'age', 'apply_instruction', 'apply_procedure', 'deadline', 'category_id');
        $data['is_active'] = $request->is_active ? true : false;
        $data['has_online_apply'] = $request->has_online_apply ? true : false;
        $data['gender'] = json_encode($request->gender);
        DB::beginTransaction();
        try {
            $job->update($data);
            $job->jobtypes()->sync($request->jobtypes);
            $job->experticelevels()->sync($request->experience_level);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->route('admin.jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Job $job)
    {
        $job->jobtypes()->detach();
        $job->experticelevels()->detach();
        $job->delete();
        return redirect()->route('admin.jobs.index');
    }


    // job applicants 
    public function applicants(Job $job)
    {
        $applicants = $job->applicants()->with('profile')->get();
        return view('backend.jobs.applicants', compact('applicants'));
    }

   
}
