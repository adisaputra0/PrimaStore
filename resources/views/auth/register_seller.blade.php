<!-- resources/views/auth/register.blade.php -->
<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name Field -->
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email Field -->
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <!-- Password Field -->
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        @error('password')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    {{-- Role --}}
    <input type="text" name="role" id="role" required hidden value="penjual">

    <!-- Confirm Password Field -->
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>

    <!-- Submit Button -->
    <button type="submit">Register</button>

    <!-- General Error Messages (e.g., email verification) -->
    @if (session('status'))
        <div style="color: green;">
            {{ session('status') }}
        </div>
    @endif
</form>
