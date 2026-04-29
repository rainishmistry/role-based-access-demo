<h1 class="text-2xl font-bold">{{ $title }}</h1>
@if(session('success'))
    <div class="bg-green-500 text-white px-4 py-2 rounded-md mb-4">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="bg-red-500 text-white px-4 py-2 rounded-md mb-4">
        {{ session('error') }}
    </div>
@endif

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        @method('POST')
        <button type="submit" class="text-blue-500 hover:text-blue-700">Logout</button>
    </form>

<h2 class="text-xl font-bold">Profile summary</h2>
<ul class="list-none">
    <li>Welcome back, {{ $user->name }}!</li>
    <li>Your email is {{ $user->email }}</li>
    <li>Your phone is {{ $user->phone }}</li>
</ul>