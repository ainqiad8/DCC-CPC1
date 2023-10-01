@extends('frontend.layouts.app')
@section('content')
  <!-- Program details start here  -->
  <div>
    <div class="container mx-auto">
      <div class="p-4">
        <div>
          <h1 class="font-bold text-3xl">{{$program->title}}</h1>
          <p class="font-bold">Date: <span class="font-normal">{{$program->program_date}}</span></p>
        </div>
        <div class="mt-4">
          <h3 class="font-bold">Description: </h3>
          <div class="text-justify">
          {!! $program->description  !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Program details Ends here  -->

@endsection