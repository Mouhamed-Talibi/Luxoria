@extends('layout.admin')

@section('title')
    Users Management
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Joined At</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="" class="">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection