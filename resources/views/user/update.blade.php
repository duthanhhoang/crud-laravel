@extends('layout')
@section('content')
    <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="username">Name</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="username" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control"  name="password" id="exampleInputPassword1" value="{{ $user->password }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('user.index') }}" type="button" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
