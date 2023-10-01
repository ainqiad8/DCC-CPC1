@extends('frontend.layouts.app')
@section('content')
    <!-- event details start here  -->
    <div>
        <div class="container mx-auto">
            <div class="p-4">
                <div>
                    <h1 class="font-bold text-3xl">{{$event->title}}</h1>
                    <p class="font-bold">Date: <span class="font-normal">{{$event->event_date}}</span></p>
                </div>
                <div class="mt-4">
                    <h3 class="font-bold">Description: </h3>
                    <div class="text-justify">
                        {!! $event->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- event details Ends here  -->
@endsection
