@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-3 pb-2 p-3">
        <a class="btn btn-info px-3  py-2" href="{{ route('admin.photos.index') }}">List</a>

    </div>

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Create Carousels</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <div class="card-body">
            <form action="{{ route('admin.photos.store') }}" method="post" enctype="multipart/form-data">
                @csrf
              

                <div class="form-group">
                    <label for="image">Image</label>
                    <input class="form-control" name="image" id="image" type="file" placeholder="image"
                        aria-label="default input example">
                    @error('image')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

              
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>


    </div>
@endsection
