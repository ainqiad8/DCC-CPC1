@extends('frontend.layouts.app')
@section('content')
    <!-- job details start from here  -->

    <div>
        <div class="container mx-auto  p-4">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-3 md:col-span-2">
                    <div class="flex flex-col gap-3">
                        <div>
                            <h1 class="font-bold text-2xl text-primary tracking-wider">{{ $job->title }}</h1>
                            <h2 class="font-bold text-xl">{{ $job->company_name }}</h2>
                        </div>
                        <div>
                            <h3 class="font-bold ">Vacancy : <span class="font-normal">{{ $job->vacancy }}</span></h3>
                        </div>
                        <div>
                            {!! $job->description !!}
                        </div>

                        <div>
                            <h3 class="font-bold ">Employment Status</h3>
                            <p class="text-justify">{{ implode(' , ', $job->jobtypes->pluck('title')->toArray()) }}</p>
                        </div>
                        <div>
                            <h3 class="font-bold">Company Details</h3>
                            <p class="text-justify">
                                {!! $job->company_details !!}
                            </p>
                        </div>
                        <div>
                            <h3 class="font-bold">Experience Requirements </h3>
                            <div class="text-justify">
                                {!! $job->experience_requirements !!}
                            </div>
                        </div>
                        <div>
                            <h3 class="font-bold">Educational Requirements </h3>
                            <div class="text-justify">
                                {!! $job->educational_requirements !!}

                            </div>
                        </div>

                        <div>
                            <h3 class="font-bold">Additional Requirements </h3>
                            <div class="text-justify">
                                {!! $job->additional_requirements !!}

                            </div>
                        </div>

                        <div>
                            <h3 class="font-bold">Job Location </h3>
                            <div class="text-justify">
                                {{ $job->job_location }}
                            </div>
                        </div>


                        <div>
                            <h3 class="font-bold">Salary </h3>
                            <div class="text-justify">
                                {{ $job->salary }}
                            </div>
                        </div>

                        <div>
                            <h3 class="font-bold">Compensation & Other Benefits </h3>
                            <div class="text-justify">
                                {!! $job->benefits !!}
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-span-3 md:col-span-1 flex flex-col gap-4">
                    <div class="border rounded-md overflow-hidden bg-border__primary">
                        <div class="bg-primary text-white">
                            <h1 class="py-2 px-4">Job Summery</h1>
                        </div>
                        <div class="p-3 flex flex-col gap-2">
                            <h3 class="font-bold"> Published on : <span
                                    class="font-normal">{{ $job->created_at->format('d M , Y') }}</span></h3>
                            <h3 class="font-bold">Vacancy: <span class="font-normal">{{ $job->vacancy }}</span></h3>
                            <h3 class="font-bold">Employment Status: <span
                                    class="font-normal">{{ implode(' , ', $job->jobtypes->pluck('title')->toArray()) }}</span>
                            </h3>
                            <h3 class="font-bold">Experience: <span
                                    class="font-normal">{{ $job->short_experience_requirements }}</span></h3>
                            <h3 class="font-bold">Gender: <span
                                    class="font-normal">{{ implode(' , ', json_decode($job->gender)) }}</span></h3>
                            <h3 class="font-bold">Age: <span class="font-normal">{{ $job->age }}</span></h3>
                            <h3 class="font-bold">Job Location: <span class="font-normal">{{ $job->job_location }}</span>
                            </h3>
                            <h3 class="font-bold">Salary:<span class="font-normal"> {{ $job->salary }}</span></h3>
                            <h3 class="font-bold"> Application Deadline:<span class="font-normal">
                                    {{ \Carbon\Carbon::parse($job->deadline)->format('d M , Y') }}</span></h3>
                        </div>
                    </div>
                    @auth

                        <div class="border rounded-md overflow-hidden bg-border__primary p-4">
                            <h1 class="font-bold">Read Before Apply</h1>
                            <div>
                                {!! $job->apply_instruction !!}
                            </div>
                            @if ($job->has_online_apply)
                                @error('profile')
                                    <div class="flex justify-center mt-1">
                                        <p class="text-red-500 font-bold  ">{{ $message }} </p>
                                    </div>
                                @enderror
                                @if (Session::has('success'))
                                    <div class="flex justify-center mt-1">
                                        <p class="text-green-500 font-bold  ">{{ Session::get('success') }} </p>
                                    </div>
                                @endif

                                @if ($alreadyApplied)
                                    <div class="flex justify-center my-4">
                                        <button class="text-white bg-green-500 py-2 px-4 text-sm rounded-md " disabled> <i
                                                class="fa-solid fa-check"></i> Already Applied</button>
                                    </div>
                                @else
                                    <div class="flex justify-center my-4">
                                        <a href="{{ route('applyonline', $job->id) }}"
                                            class="text-white bg-primary py-2 px-4 text-sm rounded-md hover:bg-secondary transition-all duration-100">Apply
                                            Online</a>
                                    </div>
                                @endif

                                <h3 class="text-center text-xs">Or</h3>
                            @endif

                            <div>
                                {!! $job->apply_procedure !!}

                            </div>
                        </div>
                    @endauth

                </div>
            </div>
        </div>
    </div>
    <!-- job details ends here  -->
@endsection
