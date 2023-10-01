@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-3 pb-1 p-3 ">
	<a class="btn btn-info px-3  py-2" href="{{ route('admin.jobs.index') }}">List</a>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Job List</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-2">
                    <table class="table table-hover text-nowrap" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applicants as $applicant)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $applicant->name }}</td>
                                    <td>{{ $applicant->email }}</td>
                                    <td>{{ $applicant->profile->phone }}</td>
                                    
                                    <td>
                                        <div class="d-flex">



                                            <a class="btn btn-sm btn-success px-3" target="_blank" href="{{asset('storage/resumes/'.$applicant->profile->resume)}}">CV</a>
                                            {{-- <a class="btn btn-sm btn-warning px-3 mx-1"
                                                href="{{ route('admin.jobs.edit', $job->id) }}">Edit</a> --}}
                                            {{-- <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger px-3">Delete</button>
                                            </form>
                                            <a class="btn btn-sm btn-primary px-3 mx-1"
                                                href="{{ route('admin.jobs.applicants', $job->id) }}">Applicant</a> --}}
                                        </div>


                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
