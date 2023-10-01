@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-3 pb-1 p-3 ">
        <a class="btn btn-primary px-3" href="{{ route('admin.jobs.create') }}">Create</a>

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
                                <th scope="col">Title</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Salary</th>
                                <th scope="col">is_active</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->deadline }}</td>
                                    <td>{{ $job->salary }}</td>
                                    <td>
                                        @if ($job->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">



                                            <a
                                                class="btn btn-sm btn-success px-3"href="{{ route('admin.jobs.show', $job->id) }}">show</a>
                                            <a class="btn btn-sm btn-warning px-3 mx-1"
                                                href="{{ route('admin.jobs.edit', $job->id) }}">Edit</a>
                                            <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger px-3">Delete</button>
                                            </form>
                                            <a class="btn btn-sm btn-primary px-3 mx-1"
                                                href="{{ route('admin.jobs.applicants', $job->id) }}">Applicant</a>
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
