@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-5 pb-1 p-3 ">
        <a class="btn btn-info px-4" href="{{ route('admin.programs.index') }}">List</a>

    </div>
    <div>
        <h1>Title: {{ $program->title }}</h1>
        <h3>program_date: {{ $program->program_date }}</h3>
        <h3>created at : {{ $program->created_at }}</h3>
        <img style="height: 300px;" src="{{ asset('storage/programs/' . $program->thumbnail) }}" alt="" srcset="">

        <p>Short_description:{{ $program->short_description }}</p>
        <p>description:{!! $program->description !!}</p>

    </div>
@endsection
