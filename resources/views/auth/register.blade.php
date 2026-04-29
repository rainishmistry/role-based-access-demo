<h1 class="text-2xl font-bold">Register</h1>
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
<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-gray-700">Name</label>
        <input type="text" name="name" id="name" class="form-input" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700">Email</label>
        <input type="email" name="email" id="email" class="form-input" required>
    </div>
    <div class="mb-4">
        <label for="password" class="block text-gray-700">Password</label>
        <input type="password" name="password" id="password" class="form-input" required>
    </div>
    <div class="mb-4">  
        <label for="phone" class="block text-gray-700">Phone</label>
        <input type="text" name="phone" id="phone" class="form-input" required>
    </div>
    {{-- <div class="mb-4">
        <label for="address" class="block text-gray-700">Address</label>
        <input type="text" name="address" id="address" class="form-input" required>
    </div>
    <div class="mb-4">
        <label for="city" class="block text-gray-700">City</label>
        <input type="text" name="city" id="city" class="form-input" required>
    </div>
    <div class="mb-4">
        <label for="state" class="block text-gray-700">State</label>
        <input type="text" name="state" id="state" class="form-input" required>
    </div>
    <div class="mb-4">
        <label for="zip" class="block text-gray-700">Zip</label>
        <input type="text" name="zip" id="zip" class="form-input" required>
    </div>
    <div class="mb-4">
        <label for="country" class="block text-gray-700">Country</label>
        <input type="text" name="country" id="country" class="form-input" required>
    </div> --}}
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Register</button>
    <p class="text-sm text-gray-500">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Login</a></p>
</form>