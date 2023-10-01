@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-5 pb-1 p-3 ">
        <a class="btn btn-info px-4" href="{{ route('admin.carousels.index') }}">List</a>

    </div>
    <div>
        <h1>Captions: {{ $carousel->caption }}</h1>
      
        <h3>created at : {{ $carousel->created_at }}</h3>
        <img style="height: 300px;" src="{{ asset('storage/carousels/' . $carousel->image) }}" alt=""
            srcset="">


    </div>
@endsection
