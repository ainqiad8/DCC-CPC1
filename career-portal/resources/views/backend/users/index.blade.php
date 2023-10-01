@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-3 pb-1 p-3 ">
        <a class="btn btn-primary px-3" href="{{ route('admin.users.create') }}">Create</a>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User List</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-2">
                    <table class="table table-hover text-nowrap" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>

                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->roles == 'user')
                                            <span class="badge badge-success">User</span>
                                        @else
                                            <span class="badge badge-danger">Admin</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex">



                                            <a
                                                class="btn btn-sm btn-success px-3"href="{{ route('admin.users.show', $user->id) }}">show</a>
                                            <a class="btn btn-sm btn-warning px-3 mx-1"
                                                href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
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
