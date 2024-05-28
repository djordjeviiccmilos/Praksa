<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <table class="table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                        <a href="{{ route('users.edit', $user->id) }}"> Edit </a>

                        <form method="POST" action="{{ route('users.delete', $user->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
