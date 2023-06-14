@extends('layout')
@section('content')
    <a href="{{ route('user.create') }}" type="button" class="btn btn-primary">ADD NEW USER</a>
    <table class="table table-striped mt-2">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name <a href="?name-sort=asc"><i class="fa-solid fa-arrow-up"></i></a> <a href="?name-sort=desc"><i class="fa-solid fa-arrow-down"></i></a></th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td><a href="{{ route('user.detail', $user->id) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td><a href="{{ route('user.formUpdate', $user->id) }}" type="button" class="btn btn-warning">Sửa</a></td>
                <td><a onclick="return confirm('Are you sure?')"  href="{{ route('user.delete', $user->id) }}" type="button" class="btn btn-danger">Xoá</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
