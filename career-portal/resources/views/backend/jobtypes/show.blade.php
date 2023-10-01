@extends('backend.layouts.app')
 @section('content')
<div class="d-flex justify-content-end pt-5 pb-1 p-3 ">
    <a class="btn btn-info px-4" href="{{ route('admin.jobtypes.index')}}">List</a>

</div>
<div>
    <h1> Title : {{$jobtype->title}}</h1>
    <h2> Status : {{$jobtype->is_active ? "Active": "InActive"}} </h2>
    <h3> Created at : {{$jobtype->created_at}} </h3>
    <h3> Modied At : {{$jobtype->updated_at}} </h3>
</div>


@endsection