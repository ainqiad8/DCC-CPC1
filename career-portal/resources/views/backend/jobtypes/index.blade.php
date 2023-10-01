@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-3 pb-1 p-3 ">
        <a class="btn btn-primary px-3" href="{{ route('admin.jobtypes.create') }}">Create</a>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Job Type</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-2">
                    <table class="table table-hover text-nowrap" id="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobtypes as $jobtype)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jobtype->title }}</td>
                                    <td>
                                        @if ($jobtype->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                         
                                            <a href="{{ route('admin.jobtypes.show',$jobtype->id) }}" class="btn btn-sm btn-success px-3">Show</a>
                                           
                                            <a href="{{ route('admin.jobtypes.edit', $jobtype->id) }}" class="btn btn-sm btn-warning px-3 mx-1">Edit</a>
                                            <form action="{{ route('admin.jobtypes.destroy', $jobtype->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger px-3">Delete</button>
                                            </form>
                                        </div>


                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
             
            </div>
      
        </div>
    </div>
@endsection
