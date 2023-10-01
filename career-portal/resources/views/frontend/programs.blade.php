@extends('frontend.layouts.app')
@section('content')
    <!-- Program container start from here  -->
    <section class=" p-4">
        <div class="container mx-auto">
            <div class="grid grid-cols-5">
                <div class="col-span-5 sm:col-span-1">
                    <h1 class="text-center font-semibold py-2 ">Sort Programs </h1>

                    <div class="flex flex-col gap-1 py-2 px-5">
                        <a class="bg-primary text-white bg-opacity-100  text-center p-1 rounded-md "
                            href="{{ route('programs') }}"> All</a>
                        @foreach ($years as $year)
                            <a class="bg-primary text-white bg-opacity-70 hover:bg-opacity-100  text-center p-1 rounded-md "
                                href="{{ route('programs', ['year' => $year]) }}"> {{ $year }}</a>
                        @endforeach
                   
                    </div>
                </div>
                <div class="col-span-5 sm:col-span-4 ">
                    <h1 class="text-center font-bold text-3xl pt-2 pb-5 tracking-wider ">
                        Latest Programs</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                        @foreach ($programs as $program)
                            <!-- card  -->
                            <div
                                class="border border-border__primary rounded-md overflow-hidden hover:border-primary transition-all duration-100 hover:shadow-lg">
                                <div class="h-[200px] bg-red-300 overflow-hidden">
                                    <img class="h-full w-full hover:scale-125 transition-all duration-300"
                                        src="{{ asset('storage/programs/' . $program->thumbnail) }}" alt="">
                                </div>
                                <div class="p-3">
                                    <a class="text-primary hover:text-secondary "
                                        href="{{ route('programdetails', $program->id) }}">{{ $program->title }}</a>
                                    <p class="text-xs ">{{ $program->program_date }}</p>
                                    <p class="text-sm text-justify mt-2">{{ $program->short_description }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Program container ends here  -->
@endsection
