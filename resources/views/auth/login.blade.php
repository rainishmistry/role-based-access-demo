{{-- <h1 class="text-2xl font-bold">Login</h1>
@if(session('error'))
    <div class="bg-red-500 text-white px-4 py-2 rounded-md mb-4">
        {{ session('error') }}
    </div>
@endif
@if(session('success'))
    <div class="bg-green-500 text-white px-4 py-2 rounded-md mb-4">
        {{ session('success') }}
    </div>
@endif
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="email" class="block text-gray-700">Email</label>
        <input type="email" name="email" id="email" class="form-input" required>
    </div>
    <div class="mb-4">
        <label for="password" class="block text-gray-700">Password</label>
        <input type="password" name="password" id="password" class="form-input" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Login</button>
    <p class="text-sm text-gray-500">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">Register</a></p>
</form> --}}

{{-- New design html code --}}

@extends('layouts.auth')

@section('content')
<h2>Login</h2>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <label>Email</label>
    <input type="email" name="email" placeholder="Enter Email" required>

    <label>Password</label>
    <input type="password" name="password" placeholder="Enter Password" required>

    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
@endsection