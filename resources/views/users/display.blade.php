<table>
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
                    <form method="GET" action="{{ route('users.update', $user->id) }}" style="display: inline;">
                        @csrf
                        @method('UPDATE')
                        <button type="submit">UPDATE</button>
                    </form>

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
