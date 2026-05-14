@extends('layouts.admin')

@section('content')
<h2>Activity Logs</h2>

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

        @foreach($logs as $log)
        <tr>
            <td>{{ $log->id }}</td>

            <td>
                @if($log->user)
                    {{ $log->user->name }} <br>
                    <small>{{ $log->user->email }}</small>
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
        @endforeach

    </table>
</div>

<div style="margin-top:15px;">
    {{ $logs->links() }}
</div>

@endsection