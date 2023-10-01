@extends('backend.layouts.app')
@section('content')

    <div class="d-flex justify-content-end pt-3 pb-2 p-3">
        <a class="btn btn-primary px-3" href="{{ route('admin.cvs.index') }}">List</a>

    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit CV</h3>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">

            <form action="{{ route('admin.cvs.update', $cv->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" value="{{ $cv->title }}" class="form-control"
                            placeholder="Title">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    
                    <div class="form-group">
                        <label  for="cvfile">Select file</label>
                        @if (isset($cv->file))
                            <div class="my-5">

                                <embed src="{{ asset('storage/cvs/' . $cv->file) }}" type="application/pdf" width="100%"
                                    height="200px" />
                            </div>
                        @endif
                        <input type="file" name="file" class="form-control" id="cvfile">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Version:</strong>
                        <input type="text" name="version" value="{{ $cv->version }}" class="form-control"
                            placeholder="Version">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-check">
                        <input {{ $cv->is_active ? 'checked' : '' }} name="is_active" value="1" type="checkbox"
                            class="form-check-input" id="is_active">
                        <label class="form-check-label" for="is_active">is Active ?</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>
        </div>




        </form>
    </div>

@endsection
