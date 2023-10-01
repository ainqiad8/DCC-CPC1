@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-3 pb-2 p-3">
        <a class="btn btn-info px-3  py-2" href="{{ route('admin.carousels.index') }}">List</a>

    </div>

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Create Carousels</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <div class="card-body">
            <form action="{{ route('admin.carousels.update',$carousel->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="caption">Caption</label>
                    <input class="form-control" value="{{ old('caption',$carousel->caption) }}" name="caption" id="caption" type="text"
                        placeholder="Caption" aria-label="default input example">
                    @error('caption')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image</label>

                    <div class="my-2">
                        <img height="100" src="{{asset('storage/carousels/'.$carousel->image)}}" alt="" srcset="">
                    </div>
                    <input class="form-control" name="image" id="image" type="file" placeholder="image"
                        aria-label="default input example">
                    @error('image')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input name="is_active" value="1" type="checkbox" class="form-check-input" id="is_active"
                        @if (old('is_active',$carousel->is_active) == 1) checked @endif>
                    <label class="form-check-label" for="is_active">is Active ?</label>
                    @error('is_active')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>


    </div>
@endsection
