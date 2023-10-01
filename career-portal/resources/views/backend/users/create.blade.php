@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-3 pb-2 p-3">
        <a class="btn btn-info px-3  py-2" href="{{ route('admin.users.index') }}">List</a>

    </div>

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Create User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{ old('name') }}" class="form-control" name="name" id="name" type="text"
                        placeholder="Name" aria-label="default input example">
                    @error('name')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input value="{{ old('email') }}" class="form-control" name="email" id="email" type="email"
                        placeholder="Email" aria-label="default input example">
                    @error('email')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" name="password" id="password" type="password" placeholder="password"
                        aria-label="default input example">
                    @error('password')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirm_password"> Confirm Password</label>
                    <input class="form-control" name="confirm_password" id="confirm_password" type="password"
                        placeholder="Confirm password" aria-label="default input example">
                    @error('confirm_password')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">

                    <select class="form-control" name="roles" id="">
                        <option value="user" selected>User</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>




                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>


    </div>
@endsection
