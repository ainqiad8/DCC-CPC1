
@extends('backend.layouts.app')
 @section('content')
<div class="d-flex justify-content-end pt-5 pb-1 p-3 ">
    <a class="btn btn-info px-4" href="{{ route('admin.coverletters.index') }}">List</a>

</div>
<div>
    <h2>  Cover Letter Details :<a href="{{asset('storage/coverletters/'. $coverletter->file)}}" download>{{$coverletter->title}}</a></h2>
    @if (isset($coverltter->file))
    <div class="my-5">

        <embed src="{{ asset('storage/coverletters/' . $coverletter->file) }}" type="application/pdf" width="100%"  height="600px" />
    </div>
@endif
    <h3> Version : {{ $coverletter->version }} </h3>
    <h2> Status : {{$coverletter->is_active ? "Active": "InActive"}} </h2>

    <h3> Created at : {{$coverletter->created_at}} </h3>
   
</div>


@endsection
