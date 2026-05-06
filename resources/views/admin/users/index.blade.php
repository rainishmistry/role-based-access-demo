{{-- <h1 class="text-2xl font-bold">Users</h1>
<a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
<ul class="list-none">
    <li>Total users count: {{ $totalUsers }}</li>
    <li>Active users count: {{ $activeUsers }}</li>
    <li>Inactive users count: {{ $inactiveUsers }}</li>
</ul>
<table class="table-auto w-full">
    <thead>
        <tr>
            <th class="text-left">Name</th>
            <th class="text-left">Email</th>
            <th class="text-left">Status</th>
            <th class="text-left">Phone</th>
            <th class="text-left">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td class="text-left">{{ $user->name }}</td>
                <td class="text-left">{{ $user->email }}</td>
                <td class="text-left">{{ $user->status ? 'Active' : 'Inactive' }}</td>
                <td class="text-left">{{ $user->phone }}</td>
                <td class="text-left">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                    <form action="{{ route('admin.users.status', $user->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="text-blue-500 hover:text-blue-700">
                            @if($user->status)
                                <span class="text-green-500">Active</span>
                            @else
                                <span class="text-red-500">Inactive</span>
                            @endif
                        </button>
                    </form>
                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> --}}



{{-- @extends('layouts.admin')

@section('content')
<h2>Manage Users</h2>

@if(session('success'))
    <div style="background:#d4edda;padding:10px;margin-bottom:10px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background:#f8d7da;padding:10px;margin-bottom:10px;">
        {{ session('error') }}
    </div>
@endif

<table border="1" cellpadding="10" cellspacing="0" width="100%" style="background:white;">
    <tr style="background:#343a40;color:white;">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <b>{{ strtoupper($user->role) }}</b>
        </td>
        <td>
            @if($user->status == 1)
                <span style="color:green;font-weight:bold;">Active</span>
            @else
                <span style="color:red;font-weight:bold;">Inactive</span>
            @endif
        </td>
        <td>{{ $user->phone }}</td>
        <td>
            <a href="{{ route('admin.users.edit', $user->id) }}" style="background:blue;color:white;padding:5px 10px;border-radius:5px;">Edit</a>

            <a href="{{ route('admin.users.status', $user->id) }}" style="background:orange;color:white;padding:5px 10px;border-radius:5px;">
                @if($user->status == 1)
                    Deactivate
                @else
                    Activate
                @endif
            </a>

            <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background:red;color:white;padding:5px 10px;border:none;border-radius:5px;"
                    onclick="return confirm('Are you sure you want to delete this user?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach

    {{ $users->links() }}

</table>

@endsection --}}


@extends('layouts.admin')

@section('content')
<h2>Manage Users</h2>

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

<div style="overflow-x:auto; background:white; padding:15px; border-radius:10px;">
    <table border="1" cellpadding="10" cellspacing="0" width="100%" style="border-collapse:collapse;">
        <tr style="background:#343a40;color:white;">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>

        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>

            <td>
                <b>{{ strtoupper($user->role) }}</b>
            </td>

            <td>
                @if($user->status == 1)
                    <span style="color:green;font-weight:bold;">Active</span>
                @else
                    <span style="color:red;font-weight:bold;">Inactive</span>
                @endif
            </td>

            <td>{{ $user->phone }}</td>

            <td>
                <a href="{{ route('admin.users.edit', $user->id) }}"
                   style="background:blue;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;">
                    Edit
                </a>

                <a href="{{ route('admin.users.status', $user->id) }}"
                   style="background:orange;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;">
                    @if($user->status == 1)
                        Deactivate
                    @else
                        Activate
                    @endif
                </a>

                <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            style="background:red;color:white;padding:5px 10px;border:none;border-radius:5px;cursor:pointer;"
                            onclick="return confirm('Are you sure you want to delete this user?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<!-- Pagination -->
<div style="margin-top:15px;">
    {{ $users->links() }}
</div>

@endsection