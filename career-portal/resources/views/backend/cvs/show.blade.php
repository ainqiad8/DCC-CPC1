
@extends('backend.layouts.app')
 @section('content')
<div class="d-flex justify-content-end pt-5 pb-1 p-3 ">
    <a class="btn btn-info px-4" href="{{ route('admin.cvs.index') }}">List</a>

</div>
<div>
    <h2>  CV Details :<a href="{{asset('storage/cvs/'. $cv->file)}}" download>{{$cv->title}}</a></h2>
    @if (isset($cv->file))
    <div class="my-5">

        <embed src="{{ asset('storage/cvs/' . $cv->file) }}" type="application/pdf" width="100%"
            height="600px" />
    </div>
@endif
    <h3> Version : {{ $cv->version }} </h3>
    <h2> Status : {{$cv->is_active ? "Active": "InActive"}} </h2>

    <h3> Created at : {{$cv->created_at}} </h3>
   
</div>


@endsection