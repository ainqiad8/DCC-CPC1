@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-5 pb-1 p-3 ">
        <a class="btn btn-info px-4" href="{{ route('admin.jobs.index') }}">List</a>

    </div>
    <div>
        <h1>Title: {{ $job->title }}</h1>
        <h3>company: {{ $job->company_name }}</h3>
        <h3>Vacancy: {{ $job->vacancy }}</h3>
        <h3>Job Type : {{ implode(' , ', $job->jobtypes->pluck('title')->toArray()) }}</h3>
        <h3>Experience Level : {{ implode(' , ', $job->experticelevels->pluck('title')->toArray()) }}</h3>
        <h3>company Details: {!! $job->company_details !!}</h3>
        <h3>Job Category: {{ $job->category->title }}</h3>
        <div>
            Description:<br>
            {!! $job->description !!}
        </div>

        <h3>created at : {{ $job->created_at }}</h3>

        <p>short_experience_requirements:{{ $job->short_experience_requirements }}</p>
        <div>experience_requirements:<br>
            {!! $job->experience_requirements !!}</div>
        <div>educational_requirements:<br>
            {!! $job->educational_requirements !!}</div>
        <p>short_experience_requirements:{{ $job->additional_requirements }}</p>
        <p>job_location:{{ $job->job_location }}</p>
        <p>salary:{{ $job->salary }}</p>
        <p>benefits:{!! $job->benefits !!}</p>
        <p>age:{{ $job->age }}</p>
        <p>Gender :{{ implode(' , ', json_decode($job->gender)) }}</p>
        <div>apply_instruction:<br>
            {!! $job->apply_instruction !!}</div>

        <div>apply_procedure:<br>
            {!! $job->apply_procedure !!}</div>

        <div>deadline:<br>
            {!! $job->deadline !!}</div>
        <div>
            @if ($job->has_online_apply)
                <p class="badge badge-success">has_online_apply</p>
            @else
                <p class="badge badge-danger">Don't have online_apply</p>
            @endif
        </div>

        <div>
            @if ($job->is_active)
                <p class="badge badge-success">Active</p>
            @else
                <p class="badge badge-danger">Inactive</p>
            @endif
        </div>

    </div>
@endsection
