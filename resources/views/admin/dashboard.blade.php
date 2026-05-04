{{-- <h1>Admin Dashboard</h1>
<a href="{{ route('admin.users.index') }}">Users</a>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    @method('POST')
    <button type="submit" class="text-blue-500 hover:text-blue-700">Logout</button>
</form>
<ul>
    <li>Total users count: {{ $totalUsers }}</li>
    <li>Active users count: {{ $activeUsers }}</li>
    <li>Inactive users count: {{ $inactiveUsers }}</li>
</ul> --}}

@extends('layouts.admin')

@section('content')
<h2>Admin Dashboard</h2>

<div class="card">
    <h3>Total Users: {{ $totalUsers }}</h3>
</div>

<div class="card">
    <h3>Active Users: {{ $activeUsers }}</h3>
</div>

<div class="card">
    <h3>Inactive Users: {{ $inactiveUsers }}</h3>
</div>

@endsection