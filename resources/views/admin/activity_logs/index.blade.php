@extends('layouts.admin')

@section('content')
<h2>Activity Logs</h2>

<!-- Filter Form -->
<div style="background:white;padding:15px;border-radius:10px;margin-bottom:15px;">
    <form method="GET" action="{{ route('admin.activity.logs') }}">

        <div style="display:flex;gap:10px;flex-wrap:wrap;align-items:end;">

            <!-- Search -->
            <div style="flex:1;min-width:200px;">
                <label><b>Search (Name/Email)</b></label>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Enter name or email"
                    style="width:100%;padding:10px;margin-top:5px;">
            </div>

            <!-- Action Filter -->
            <div style="flex:1;min-width:180px;">
                <label><b>Action</b></label>
                <select name="action" style="width:100%;padding:10px;margin-top:5px;">
                    <option value="">-- All Actions --</option>
                    <option value="login" {{ request('action') == 'login' ? 'selected' : '' }}>Login</option>
                    <option value="logout" {{ request('action') == 'logout' ? 'selected' : '' }}>Logout</option>
                    <option value="update_user" {{ request('action') == 'update_user' ? 'selected' : '' }}>Update User</option>
                    <option value="change_status" {{ request('action') == 'change_status' ? 'selected' : '' }}>Change Status</option>
                    <option value="delete_user" {{ request('action') == 'delete_user' ? 'selected' : '' }}>Delete User</option>
                    <option value="cleanup_activity_logs" {{ request('action') == 'cleanup_activity_logs' ? 'selected' : '' }}>Cleanup Activity Logs</option>
                </select>
            </div>

            <!-- From Date -->
            <div style="flex:1;min-width:150px;">
                <label><b>From Date</b></label>
                <input type="date" name="from_date" value="{{ request('from_date') }}"
                    style="width:100%;padding:10px;margin-top:5px;">
            </div>

            <!-- To Date -->
            <div style="flex:1;min-width:150px;">
                <label><b>To Date</b></label>
                <input type="date" name="to_date" value="{{ request('to_date') }}"
                    style="width:100%;padding:10px;margin-top:5px;">
            </div>

            <!-- Buttons -->
            <div style="min-width:200px;">
                <button type="submit"
                    style="background:blue;color:white;padding:10px 15px;border:none;border-radius:5px;cursor:pointer;">
                    Filter
                </button>

                <a href="{{ route('admin.activity.logs') }}"
                    style="background:gray;color:white;padding:10px 15px;border-radius:5px;text-decoration:none;">
                    Reset
                </a>
            </div>

        </div>
    </form>
</div>


<!-- Logs Table -->
<div style="overflow-x:auto; background:white; padding:15px; border-radius:10px;">
    <table border="1" cellpadding="10" cellspacing="0" width="100%" style="border-collapse:collapse;">
        <tr style="background:#343a40;color:white;">
            <th>ID</th>
            <th>User</th>
            <th>Action</th>
            <th>Description</th>
            <th>IP Address</th>
            <th>User Agent</th>
            <th>Date</th>
        </tr>

        @forelse($logs as $log)
        <tr>
            <td>{{ $log->id }}</td>

            <td>
                @if($log->user)
                    {{ $log->user->name }} <br>
                    <small>{{ $log->user->email }}</small>
                @elseif($log->action == 'cleanup_activity_logs')
                    <span style="color:green;">System</span>
                @else
                    <span style="color:red;">Deleted User</span>
                @endif
            </td>

            <td><b>{{ strtoupper($log->action) }}</b></td>

            <td>{{ $log->description }}</td>

            <td>{{ $log->ip_address }}</td>

            <td style="max-width:250px; word-wrap:break-word;">
                {{ $log->user_agent }}
            </td>

            <td>{{ $log->created_at->format('d-m-Y h:i A') }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7" style="text-align:center;color:red;font-weight:bold;">
                No logs found.
            </td>
        </tr>
        @endforelse

    </table>
</div>

<!-- Pagination -->
<div style="margin-top:15px;">
    {{ $logs->links() }}
</div>

@endsection