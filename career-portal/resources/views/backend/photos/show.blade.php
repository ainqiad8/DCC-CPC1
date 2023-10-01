@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-5 pb-1 p-3 ">
        <a class="btn btn-info px-4" href="{{ route('admin.photos.index') }}">List</a>

    </div>
    <div>
        <h1>URL :{{ asset('storage/photos/' . $photo->image)}}</h1>
      
        <h3>created at : {{ $photo->created_at }}</h3>
        <img src="{{ asset('storage/photos/' . $photo->image) }}" alt=""
            srcset="">


    </div>
@endsection
