<x-app-layout>
    <x-slot name="header">
        <header class="mt-3">
            <h2 class="text-lg font-medium text-gray-900 text-center justify-center">
                {{ __('All users') }}
            </h2>

            <div style="display: block; text-align: center; margin-top: 10px; margin-left: 350px">
                <table class="table justify-center text-center">
                    <thead class="thead-dark">
                    <tr style="border: 0.5px solid black">
                        <th scope="col" style="border: 0.5px solid black">ID</th>
                        <th scope="col" style="border: 0.5px solid black">Name</th>
                        <th scope="col" style="border: 0.5px solid black">Email</th>
                        <th scope="col" style="border: 0.5px solid black">Edit</th>
                        <th scope="col" style="border: 0.5px solid black">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr style="padding: 20px; border: 0.5px solid black">
                            <td style="padding: 10px; border: 0.5px solid black">{{ $user->id }}</td>
                            <td style="padding: 10px; border: 0.5px solid black">{{ $user->name }}</td>
                            <td style="padding: 10px; border: 0.5px solid black">{{ $user->email }}</td>
                            <td style="padding: 10px; border: 0.5px solid black">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td style="padding: 10px; border: 0.5px solid black">
                                <form method="POST" action="{{ route('users.delete', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </header>


    </x-slot>

</x-app-layout>
