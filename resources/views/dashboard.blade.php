@extends('base')

@section('title', 'Your dashboard')


@section('content')
    <h3 style="display: flex; justify-content: center">Welcome to your dashboard {{$data->name}} !</h3>
    <hr>
    <table class="table">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
            <tbody>
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td><a href="logout">Logout</a></td>
                </tr>
            </tbody>
        </thead>
    </table>
@endsection


