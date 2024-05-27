<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit User</title>
    </head>
    <body>
        <h1>Edit User</h1>

        @if (session('success'))
            <div>{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div>{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}">
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Update User</button>
        </form>
    </body>
</html>
