@extends('frontend.layouts.app')
@section('content')
    <div>
        <div class="container mx-auto">
            <h1 class="text-center py-3 text-3xl font-bold">Applied Jobs</h1>
            <table class="w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6 py-4">#</th>
                        <th scope="col" class="px-6 py-4">Title</th>
                        <th scope="col" class="px-6 py-4">Company Name</th>
                        <th scope="col" class="px-6 py-4">Salary</th>
                        <th scope="col" class="px-6 py-4">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $job->title }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $job->company_name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $job->salary }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <a class="text-primary border rounded-md border-primary px-3 py-[1px]"
                                    href="{{ route('jobdetails', $job->id) }}">view</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div>
    </div>
@endsection
