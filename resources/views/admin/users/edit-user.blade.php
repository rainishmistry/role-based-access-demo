<h1>Edit User</h1>

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
</form>