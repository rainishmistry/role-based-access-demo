<h1>Admin Dashboard</h1>
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
</ul>