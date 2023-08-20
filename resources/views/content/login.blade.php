@extends('master')

@section('title', 'Login Page')

@section('content')
    <h1 class="mx-3">Login</h1>
    <form action="{{ url('login') }}" method="post">
        @csrf
        <div class="mx-3 mb-3">
            <label for="email">Email address</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mx-3 mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mx-3">Login</button>
    </form>
@endsection

