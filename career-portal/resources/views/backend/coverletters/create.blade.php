@extends('backend.layouts.app')
@section('content')

    <div class="d-flex justify-content-end pt-3 pb-2 p-3">
        <a class="btn btn-primary px-3 " href="{{ route('admin.coverletters.index') }}">List</a>

    </div>

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Create Cover Letter</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <div class="card-body">
            <form action="{{ route('admin.coverletters.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label  for="coverletterfile">Select file</label>
                    <input type="file" name="file" class="form-control" id="coverletterfile">
                </div>

                <div class="form-group pt-2 pb-2">
                    {{-- <strong>version</strong> --}}
                    <input type="text" class="form-control" name="version" placeholder="Version">
                </div>
                <div class="form-check">
                    <input name="is_active" value="1" type="checkbox" class="form-check-input" id="is_active">
                    <label class="form-check-label" for="is_active">is Active ?</label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Create</button>
        </div>


        </form>
    </div>


    </div>
@endsection