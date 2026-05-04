<!DOCTYPE html>
<html>
<head>
    <title>Auth Layout</title>
    <style>
        body { font-family: Arial; background: #f5f5f5; }
        .container { width: 400px; margin: 50px auto; background: white; padding: 20px; border-radius: 10px; }
        input { width: 100%; padding: 10px; margin: 8px 0; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
        .alert-success { background: #d4edda; padding: 10px; margin-bottom: 10px; }
        .alert-error { background: #f8d7da; padding: 10px; margin-bottom: 10px; }
        a { text-decoration: none; }
    </style>
</head>
<body>

<div class="container">

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert-error">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>