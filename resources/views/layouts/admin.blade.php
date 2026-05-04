<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body { font-family: Arial; margin: 0; padding: 0; background: #f4f4f4; }
        .header { background: #343a40; color: white; padding: 15px; }
        .container { padding: 20px; }
        .card { background: white; padding: 15px; margin: 10px 0; border-radius: 10px; }
        a { color: white; text-decoration: none; margin-right: 15px; }
        .logout-btn { background: red; color: white; padding: 8px 15px; border: none; cursor: pointer; border-radius: 5px; }
    </style>
</head>
<body>

<div class="header">
    <h2>Admin Panel</h2>
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="{{ route('admin.users.index') }}">Users</a>

    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>