{{-- <h1>Edit User</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" />
        @error('name')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>Email:</label>
        <input type="text" name="email" value="{{ old('email', $user->email) }}" />
        @error('email')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>Phone:</label>
        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" />
        @error('phone')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit">Update</button>
    </div>
</form> --}}


@extends('layouts.admin')

@section('content')
<h2>Edit User</h2>

@if($errors->any())
    <div style="background:#f8d7da;padding:10px;margin-bottom:10px;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.users.update', $user->id) }}" style="background:white;padding:20px;border-radius:10px;">
    @csrf

    <label>Name</label>
    <input type="text" name="name" value="{{ $user->name }}" style="width:100%;padding:10px;margin:8px 0;">

    <label>Email</label>
    <input type="email" name="email" value="{{ $user->email }}" style="width:100%;padding:10px;margin:8px 0;">

    <label>Role</label>
    <select name="role" style="width:100%;padding:10px;margin:8px 0;">
        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
    </select>

    <label>Status</label>
    <select name="status" style="width:100%;padding:10px;margin:8px 0;">
        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
    </select>

    <label>Phone</label>
    <input type="text" name="phone" value="{{ $user->phone }}" style="width:100%;padding:10px;margin:8px 0;">

    {{-- <label>Address</label>
    <textarea name="address" style="width:100%;padding:10px;margin:8px 0;">{{ $user->address }}</textarea> --}}

    <button type="submit" style="background:green;color:white;padding:10px 15px;border:none;border-radius:5px;">
        Update User
    </button>

    <a href="{{ route('admin.users.index') }}" style="background:gray;color:white;padding:10px 15px;border-radius:5px;text-decoration:none;">
        Back
    </a>
</form>

@endsection