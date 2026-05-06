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
        
        /* Pagination */
        .pagination { display: flex; list-style: none; padding: 0; margin: 20px 0; justify-content: flex-end; }
        .page-item { margin: 0 2px; }
        .page-link { display: block; padding: 8px 12px; color: #343a40; background-color: #fff; border: 1px solid #dee2e6; border-radius: 5px; text-decoration: none; margin-right: 0; }
        .page-link:hover { background-color: #e9ecef; color: #343a40; }
        .page-item.active .page-link { background-color: #343a40; color: white; border-color: #343a40; }
        .page-item.disabled .page-link { color: #6c757d; pointer-events: none; background-color: #fff; border-color: #dee2e6; }
        nav svg { height: 20px; }
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