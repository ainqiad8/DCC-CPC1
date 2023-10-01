@extends('backend.layouts.app')
 @section('content')
<div class="d-flex justify-content-end pt-5 pb-1 p-3 ">
    <a class="btn btn-info px-4" href="{{ route('admin.experticeslevel.index',$experticeslevel->id) }}">List</a>

</div>
<div>
    <h1> Title : {{$experticeslevel->title}}</h1>
    {{-- {{dd(title)}} --}}
    <h2> Status : {{$experticeslevel->is_active ? "Active": "InActive"}} </h2>
    <h3> Created at : {{$experticeslevel->created_at}} </h3>
    <h3> Modied At : {{$experticeslevel->updated_at}} </h3>
</div>


@endsection