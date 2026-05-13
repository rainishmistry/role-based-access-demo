@extends('layouts.user')

@section('content')
<h2>My Profile</h2>

@if(session('success'))
    <div style="background:#d4edda;padding:10px;margin-bottom:10px;border-radius:5px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background:#f8d7da;padding:10px;margin-bottom:10px;border-radius:5px;">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div style="background:#f8d7da;padding:10px;margin-bottom:10px;border-radius:5px;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- Profile Update Form -->
<div style="background:white;padding:20px;border-radius:10px;margin-bottom:20px;">
    <h3>Update Profile</h3>

    <form method="POST" action="{{ route('user.profile.update') }}">
        @csrf

        <label>Name</label>
        <input type="text" name="name" value="{{ $user->name }}" style="width:100%;padding:10px;margin:8px 0;">

        <label>Email (Readonly)</label>
        <input type="email" value="{{ $user->email }}" readonly style="width:100%;padding:10px;margin:8px 0;background:#f0f0f0;">

        <label>Phone</label>
        <input type="text" name="phone" value="{{ $user->phone }}" style="width:100%;padding:10px;margin:8px 0;">

        <label>Address</label>
        <textarea name="address" style="width:100%;padding:10px;margin:8px 0;">{{ $user->address }}</textarea>

        <button type="submit" style="background:green;color:white;padding:10px 15px;border:none;border-radius:5px;">
            Update Profile
        </button>
    </form>
</div>


<!-- Password Update Form -->
<div style="background:white;padding:20px;border-radius:10px;">
    <h3>Change Password</h3>

    <form method="POST" action="{{ route('user.profile.password') }}">
        @csrf

        <label>Old Password</label>
        <input type="password" name="old_password" style="width:100%;padding:10px;margin:8px 0;">

        <label>New Password</label>
        <input type="password" name="new_password" style="width:100%;padding:10px;margin:8px 0;">

        <label>Confirm New Password</label>
        <input type="password" name="new_password_confirmation" style="width:100%;padding:10px;margin:8px 0;">

        <button type="submit" style="background:blue;color:white;padding:10px 15px;border:none;border-radius:5px;">
            Update Password
        </button>
    </form>
</div>

@endsection