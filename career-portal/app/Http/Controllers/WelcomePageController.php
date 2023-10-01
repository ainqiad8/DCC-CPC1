<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Category;
use App\Models\Cv;
use App\Models\CoverLetter;
use App\Models\Event;
use App\Models\ExperticeLevel;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class WelcomePageController extends Controller
{
    public function index()
    {
        $carousels = Carousel::where('is_active', true)->latest()->get();
        return view('frontend.index', compact('carousels'));
    }
    public function cvs()
    {

        // $data=Cv::where('is_active',true)->get();
        // foreach($data as $cv){
        //     $cvs[]=[
        //         'id'=>$cv->id,
        //         'title'=>$cv->title,
        //         'version'=>$cv->version,
        //         'file'=>asset('storage/cvs/'.$cv->file),
        //     ];
        // }

        $cvs = Cv::where('is_active', true)->get();
        return view('frontend.cv', compact('cvs'));
    }
    public function coverLetters()
    {
        $coverletters = CoverLetter::where('is_active', true)->get();
        return view('frontend.coverletter', compact("coverletters"));
    }
    public function events(Request $request)
    {
        $year = $request->year;
        $events = Event::where('is_active', true)->where('event_date', 'like', '%' . $year . '%')->get();
        $years = Event::where('is_active', true)->pluck('event_date')->map(function ($date) {
            return Carbon::parse($date)->format('Y');
        })->unique();

        return view('frontend.event', compact('events', 'years'));
    }
    public function eventDetails(Event $event)
    {
        return view('frontend.event-details', compact('event'));
    }
    public function programs(Request $request)
    {

        $year = $request->year;
        $programs = Program::where('is_active', true)->where('program_date', 'like', '%' . $year . '%')->get();
        $years = Program::where('is_active', true)->pluck('program_date')->map(function ($date) {
            return Carbon::parse($date)->format('Y');
        })->unique();
        return view('frontend.programs', compact('programs', 'years'));
    }
    public function programDetails(Program $program)
    {

        return view('frontend.program-details', compact('program'));
    }
    public function jobDetails(Job $job)
    {

        $alreadyApplied = false;
        if (Auth::check()) {
            $user = Auth::user();
            $alreadyApplied = $job->applicants()->where('user_id', $user->id)->exists();
        }
        return view('frontend.job-details', compact('job', 'alreadyApplied'));
    }

    public function jobPortal(Request $request)
    {
        $page_view = 10;
        $categories = Category::where('is_active', true)->get();
        $jobtypes = JobType::where('is_active', true)->get();
        $experticeLevels = ExperticeLevel::where('is_active', true)->get();
        $jobs = Job::where('is_active', true)->orderBy('created_at', 'desc')->take($page_view)->get(['title', 'company_name', 'job_location', 'salary', 'short_experience_requirements', 'deadline', 'id']);
        $hasmore = Job::where('is_active', true)->count() > $page_view ? true : false;

        return view('frontend.jobs', compact('categories', 'jobtypes', 'experticeLevels', 'jobs', 'hasmore'));
    }

    public function sortJobs(Request $request)
    {

        $category_id = $request->category_id;
        $page_view = $request->page_view ?? 10;
        $page = $request->page ?? 1;
        $search = $request->search ?? '';
        $experticeLevels = explode('-', $request->expertice_level);
        $jobtypes = explode('-', $request->job_types);
        if ($page < 1)
            $page = 1;
        if ($page_view < 1)
            $page_view = 10;

        // common query 
        $common = Job::where('is_active', true)->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', '%' . $search . '%');
            $q->orWhere('company_name', 'LIKE', '%' . $search . '%');
        })->where(function ($q) use ($category_id) {
            if ($category_id)
                $q->where('category_id', $category_id);
        })->whereHas('experticelevels', function ($q) use ($experticeLevels) {
            if (count($experticeLevels) > 0 and $experticeLevels[0] != '') {
                $q->whereIn('expertice_level_id', $experticeLevels);
            }
        })->whereHas('jobtypes', function ($q) use ($jobtypes) {
            if (count($jobtypes) > 0 and $jobtypes[0] != '') {
                $q->whereIn('job_type_id', $jobtypes);
            }
        })->orderBy('created_at', 'desc');

        // HasMore or not
        $hasMore = $common->count() > $page * $page_view;

        //jobs
        $jobs = $common->skip(($page - 1) * $page_view)->take($page_view)->get(['id', 'category_id', 'title', 'company_name', 'job_location', 'salary', 'short_experience_requirements', 'deadline']);


        return response()->json(['jobs' => $jobs, 'hasmore' => $hasMore], 200);

        // where(function($q) use ($experticeLevels){
        //     foreach($experticeLevels as $level){
        //         $q->orWhereHas('experticelevels',function($q) use($level){
        //             $q->where('expertice_level_id',$level);
        //         });
        //     }
        // })
    }

    public function applyOnline(Job $job)
    {
        $user = Auth::user();
        if ($user->profile) {
            $resume = $user->profile->resume;
            $phone = $user->profile->phone;
            if ($resume and $phone) {
                $job->applicants()->sync($user->id);
                return redirect()->route('jobdetails', $job->id)->with('success', 'Applied Successfully');
            } else {
                return redirect()->route('jobdetails', $job->id)->withErrors(['profile' => 'Your Profile is not completed']);
            }
        }
        return redirect()->route('jobdetails', $job->id)->withErrors(['profile' => 'Your Profile is not completed']);
    }


    // applied jobs 
    public function appliedJobs()
    {
        $user = Auth::user();
        $jobs = $user->jobs;
        return view('frontend.profile.applied-jobs', compact('jobs'));
    }
}
