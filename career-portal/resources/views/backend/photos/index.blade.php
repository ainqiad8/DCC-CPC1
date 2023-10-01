@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-3 pb-1 p-3 ">
        <a class="btn btn-primary px-3" href="{{ route('admin.photos.create') }}">Create</a>

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
                                <td>URL</td>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($photos as $photo)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img height="100" src="{{ asset('storage/photos/' . $photo->image) }}"
                                            alt="" srcset=""></td>
                                    <td>
                                        {{ asset('storage/photos/' . $photo->image) }} <button
                                            class="btn btn-sm btn-success copy-btn"><i class="fa fa-clipboard">
                                            </i></button>
                                    </td>
                                    <td>
                                        <div class="d-flex">



                                            <a
                                                class="btn btn-sm btn-success px-3"href="{{ route('admin.photos.show', $photo->id) }}">show</a>
                                            <a class="btn btn-sm btn-warning px-3 mx-1"
                                                href="{{ route('admin.photos.edit', $photo->id) }}">Edit</a>
                                            <form action="{{ route('admin.photos.destroy', $photo->id) }}" method="post">
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

@section('script')
    <script>
        document.querySelectorAll('.copy-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                navigator.clipboard.writeText(btn.parentElement.innerText);
            });
        });
    </script>
@endsection
