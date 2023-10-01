@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-5 pb-1 p-3 ">
        <a class="btn btn-info px-4" href="{{ route('admin.users.index') }}">List</a>

    </div>
    <div>
        <h1>Title: {{ $user->name }}</h1>
        <h3>Email : {{ $user->email }}</h3>
        <h3>Roles : {{ $user->roles }}</h3>

    </div>
@endsection
