@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-5 pb-1 p-3 ">
        <a class="btn btn-info px-4" href="{{ route('admin.events.index') }}">List</a>

    </div>
    <div>
        <h1>Title: {{ $event->title }}</h1>
        <h3>event_date: {{ $event->event_date }}</h3>
        <h3>created at : {{ $event->created_at }}</h3>
        <img style="height: 300px;" src="{{ asset('storage/events/' . $event->thumbnail) }}" alt="" srcset="">

        <p>Short_description:{{ $event->short_description }}</p>
        <p>description:{!! $event->description !!}</p>

    </div>
@endsection
