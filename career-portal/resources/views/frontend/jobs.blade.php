@extends('frontend.layouts.app')
@section('content')
    <!-- job container start from here  -->
    <section class=" p-4">
        <div class="container mx-auto">
            <div class="grid grid-cols-5">
                <div class="col-span-5 sm:col-span-1 flex  flex-col gap-5">

                    <div class="flex justify-center  sm:justify-start ">
                        <div>

                            <h1 class=" font-semibold py-2 mt-8">Job Type </h1>
                            <ul>
                                @foreach ($jobtypes as $jobtype)
                                    <li>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" value="{{ $jobtype->id }}" class="form-checkbox jobtypes">
                                            <span class="ml-2">{{ $jobtype->title }}</span>
                                        </label>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                    </div>
                    <div>

                        <input class="border-border__primary outline-none  rounded-md" name="search" id="search"
                            type="text" placeholder="Type to Search">
                        <button id="search-btn"
                            class="border border-primary text-primary px-2 py-1  rounded-md hover:text-white hover:bg-primary">Search
                        </button>
                    </div>
                    <div class="flex w-full justify-center  sm:justify-start ">
                        <div>

                            <h1 class=" font-semibold py-2  ">Category </h1>
                            <select name="category" id="category_id"
                                class="border border-border__primary  rounded-md bg-gray-50">
                                <option value="">ALL</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <div class="flex justify-center  sm:justify-start ">
                        <div>
                            <h1 class=" font-semibold py-2 ">Expertice Level </h1>
                            <ul>

                                @foreach ($experticeLevels as $experticeLevel)
                                    <li>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox expertice_level"
                                                value="{{ $experticeLevel->id }}">
                                            <span class="ml-2">{{ $experticeLevel->title }}</span>
                                        </label>
                                    </li>
                                @endforeach


                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-span-5 sm:col-span-4 ">
                    <h1 class="text-center font-bold text-3xl pt-2 pb-5 tracking-wider ">
                        Latest Jobs</h1>
                    <div class="" id="joblist">
                        @foreach ($jobs as $job)
                            <div
                                class="border p-4 rounded-md hover:border-primary hover:shadow-md transition-all duration-200 my-2">
                                <h3 class="text-2xl font-bold text-primary"><a class="hover:text-secondary"
                                        href="{{ route('jobdetails', $job->id) }}">{{ $job->title }}</a></h3>
                                <h4 class="text-md font-semibold">{{ $job->company_name }}</h4>
                                <div class="mt-1">
                                    <p class="text-sm"><i class="fa-solid fa-location-dot w-4 text-center "></i>
                                        <span class="ml-1">{{ $job->job_location }}</span>
                                    </p>
                                    <p class="text-sm"><i class="fa-solid fa-user-graduate w-4 text-center "></i>
                                        <span class="ml-1">{{ $job->salary }}</span>
                                    </p>
                                    <div class="flex flex-col md:flex-row  justify-between">
                                        <p class="text-sm"><i class="fa-solid fa-suitcase w-4 text-center "></i>
                                            <span class="ml-1">{{ $job->short_experience_requirements }}</span>
                                        </p>
                                        <p class="text-sm"><i class="fa-solid fa-calendar-day w-4 text-center "></i>
                                            <span class="ml-1">DeadLine: {{ $job->deadline }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach






                    </div>

                    <!-- pagination start from here  -->
                    <div class="py-2">
                        <div class="grid grid-cols-4 items-center">
                            <div class="col-span-3">
                                <div class="flex justify-center w-full">
                                    <button data-page="2" id="show_more"
                                        class="border border-primary rounded-md px-3 py-1 text-sm"
                                        @if ($hasmore == false) style="display: none;" @endif>Show More</button>

                                </div>

                            </div>
                            <div class="col-span-1 flex justify-end">
                                <label class="text-sm  font-semibold">Jobs Per Page
                                    <select class="border border-primary rounded-md font-normal" name="page_view"
                                        id="page_view">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                    </select>
                                </label>
                            </div>

                        </div>
                    </div>

                    <!-- pagination ends here  -->
                </div>
            </div>
        </div>
    </section>

    <!-- job container ends here  -->
@endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            let search = null;
            let page_view = 10;

            // search
            $('#search-btn').on('click', function() {
                search = $('#search').val();
                fetchData();
            })

            // pageview sorting 
            $('#page_view').on('change', function() {
                page_view = $('#page_view').val();
                fetchData();
            });

            // cateegory sorting 
            let category_id = null;
            $('#category_id').on('change', function() {
                category_id = $('#category_id').val();
                fetchData();
            });

            // experience level sorting 
            let expertice_level = [];
            $('.expertice_level').on('click', function() {
                expertice_level = [];
                $('.expertice_level').each(function() {
                    if ($(this).is(':checked')) {
                        expertice_level.push($(this).val());
                    }

                })
                fetchData();
            })
            // job type sorting 
            let job_types = []
            $('.jobtypes').on('click', function() {
                job_types = [];
                $('.jobtypes').each(function() {
                    if ($(this).is(':checked')) {
                        job_types.push($(this).val());
                    }

                })
                fetchData();
            })
            // show more
            let page = 1;
            $('#show_more').on('click', function() {
                page = $('#show_more').data('page');
                fetchPaginateData();


            })


            function fetchPaginateData() {
                $.get("http://127.0.0.1:8000/api/sortjobs", {
                    category_id: category_id,
                    page_view: page_view,
                    search: search,
                    page: page,
                    expertice_level: expertice_level.join('-'),
                    job_types: job_types.join('-')
                }, function(data, status) {
                    let html = '';
                    data.jobs.forEach(element => {
                        html += `
                        <div class="border p-4 rounded-md hover:border-primary hover:shadow-md transition-all duration-200 my-2">
                                <h3 class="text-2xl font-bold text-primary"><a class="hover:text-secondary"
                                        href='http://127.0.0.1:8000/jobs/${element.id}'> ${element.title} </a></h3>
                                <h4 class="text-md font-semibold">${element.company_name}</h4>
                                <div class="mt-1">
                                    <p class="text-sm"><i class="fa-solid fa-location-dot w-4 text-center "></i>
                                        <span class="ml-1"> ${element.job_location} </span>
                                    </p>
                                    <p class="text-sm"><i class="fa-solid fa-user-graduate w-4 text-center "></i>
                                        <span class="ml-1"> ${element.salary} </span>
                                    </p>
                                    <div class="flex flex-col md:flex-row  justify-between">
                                        <p class="text-sm"><i class="fa-solid fa-suitcase w-4 text-center "></i>
                                            <span class="ml-1"> ${element.short_experience_requirements} </span>
                                        </p>
                                        <p class="text-sm"><i class="fa-solid fa-calendar-day w-4 text-center "></i>
                                            <span class="ml-1">DeadLine: ${element.deadline} </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    $('#joblist').append(html);
                    $('#show_more').data('page', page + 1);

                    if (data.hasmore)
                        $('#show_more').show();
                    else
                        $('#show_more').hide();
                });
            }

            function fetchData() {
                $.get("http://127.0.0.1:8000/api/sortjobs", {
                    category_id: category_id,
                    page_view: page_view,
                    search: search,
                    expertice_level: expertice_level.join('-'),
                    job_types: job_types.join('-')
                }, function(data, status) {
                    let html = '';
                    data.jobs.forEach(element => {
                        html += `
                        <div class="border p-4 rounded-md hover:border-primary hover:shadow-md transition-all duration-200 my-2">
                                <h3 class="text-2xl font-bold text-primary"><a class="hover:text-secondary"
                                        href='http://127.0.0.1:8000/jobs/${element.id}'> ${element.title} </a></h3>
                                <h4 class="text-md font-semibold">${element.company_name}</h4>
                                <div class="mt-1">
                                    <p class="text-sm"><i class="fa-solid fa-location-dot w-4 text-center "></i>
                                        <span class="ml-1"> ${element.job_location} </span>
                                    </p>
                                    <p class="text-sm"><i class="fa-solid fa-user-graduate w-4 text-center "></i>
                                        <span class="ml-1"> ${element.salary} </span>
                                    </p>
                                    <div class="flex flex-col md:flex-row  justify-between">
                                        <p class="text-sm"><i class="fa-solid fa-suitcase w-4 text-center "></i>
                                            <span class="ml-1"> ${element.short_experience_requirements} </span>
                                        </p>
                                        <p class="text-sm"><i class="fa-solid fa-calendar-day w-4 text-center "></i>
                                            <span class="ml-1">DeadLine: ${element.deadline} </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    $('#joblist').html(html);
                    $('#show_more').data('page', 2);
                    if (data.hasmore)
                        $('#show_more').show();
                    else
                        $('#show_more').hide();

                });
            }
        });
    </script>
@endsection
