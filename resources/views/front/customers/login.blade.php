@extends('layouts.login')
@section('title')
    Login
@endsection
@section('content')
<h2 class="text-center text-warning my-4">Login</h2>
<div class="container">
    <form action="{{ route('customer.handleLogin') }}" method="post">
        @csrf
               
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="text" name="email" value="{{ old('email') }}">
        </div>
        
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" value="{{ old('password') }}">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Login</button>
        <a href="{{ route('customer.register') }}" class="btn btn-primary">Register <i class="fab fa-facebook"></i></a>
        <a href="{{ route('auth.facebook.redirect') }}" class="btn btn-info">Login with Facebook <i class="fab fa-facebook"></i></a>
        <a href="{{ route('auth.github.redirect') }}" class="btn btn-warning">Login with Github <i class="fab fa-github"></i></a>
        <a href="{{ route('auth.google.redirect') }}" class="btn btn-success">Login with Google <i class="fab fa-google"></i></a>
        <a href="{{ route('customers.show') }}" class="btn btn-danger">Show All Customers </i></a>
    </form>
</div>
@endsection
