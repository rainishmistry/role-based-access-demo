<h1 class="text-2xl font-bold">Users</h1>
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
            {{-- <th class="text-left">Role</th> --}}
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
                {{-- <td class="text-left">{{ $user->role }}</td> --}}
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
</table>