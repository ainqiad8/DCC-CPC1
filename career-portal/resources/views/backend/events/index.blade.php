@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-3 pb-1 p-3 ">
        <a class="btn btn-primary px-3" href="{{ route('admin.events.create') }}">Create</a>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Events List</h3>

                   
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-2">
                    <table class="table table-hover text-nowrap" id="datatable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">EventDate</th>
                            <th scope="col">is_active</th>
                            <th scope="col">Option</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $event->title }}</td>
                                  <td>{{ $event->event_date }}</td>
                                    <td>
                                        @if ($event->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">

                              

                                            <a
                                                class="btn btn-sm btn-success px-3"href="{{ route('admin.events.show', $event->id) }}">show</a>
                                            <a class="btn btn-sm btn-warning px-3 mx-1"
                                                href="{{ route('admin.events.edit', $event->id) }}">Edit</a>
                                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="post">
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
