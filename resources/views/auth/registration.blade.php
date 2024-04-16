@extends('base')

@section('title', 'Register Form')

@section('content')

    <h4 style="display: flex; justify-content: center">Registration</h4>
    <hr>
    <form action="{{route('register-user')}}" method="post">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
        @endif
        @csrf
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" placeholder="Enter your full name"
            name="name" value="{{old('name')}}">
            <span class="text-danger">
                @error('name')
                {{$message}}
            @enderror</span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" placeholder="Enter your Email"
            name="email" value="{{old('email')}}">
            <span class="text-danger">
                @error('email') ☠😿
                {{$message}}
            @enderror</span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="Enter your password"
            name="password" value="">
            <span class="text-danger">
                @error('password')
                {{$message}}
            @enderror</span>
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Register</button>
        </div>
        <hr>
        <p>Already Registred !? <a href="login">Login Here.</a></p>
    </form>
@endsection


