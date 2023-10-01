@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-3 pb-1 p-3 ">
        <a class="btn btn-primary px-3" href="{{ route('admin.carousels.create') }}">Create</a>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Carousels List</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-2">
                    <table class="table table-hover text-nowrap" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">image</th>
                                <th scope="col">Caption</th>
                                <th scope="col">is_active</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carousels as $carousel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img height="100" src="{{asset('storage/carousels/' . $carousel->image)}}" alt="" srcset=""></td>
                                    <td>{{ $carousel->caption }}</td>
                                    <td>
                                        @if ($carousel->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">



                                            <a
                                                class="btn btn-sm btn-success px-3"href="{{ route('admin.carousels.show', $carousel->id) }}">show</a>
                                            <a class="btn btn-sm btn-warning px-3 mx-1"
                                                href="{{ route('admin.carousels.edit', $carousel->id) }}">Edit</a>
                                            <form action="{{ route('admin.carousels.destroy', $carousel->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger px-3">Delete</button>
                                            </form>
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
