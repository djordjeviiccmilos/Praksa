<x-app-layout>
    <x-slot name="header" class="">
        <table class="table justify-center text-center">
            <thead>
            <tr style="border: 0.5px solid black">
                <th scope="col" style="border: 0.5px solid black">Category name</th>
                <th scope="col" style="border: 0.5px solid black">Category description</th>
                <th scope="col" style="border: 0.5px solid black">Edit</th>
                <th scope="col" style="border: 0.5px solid black">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr style="padding: 20px; border: 0.5px solid black">
                <td style="padding: 10px; border: 0.5px solid black">{{ $category->names }}</td>
                <td style="padding: 10px; border: 0.5px solid black">{{ $category->description }}</td>
                <td style="padding: 10px; border: 0.5px solid black">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                </td>
                <td style="padding: 10px; border: 0.5px solid black">
                    <form method="POST" action="{{ route('categories.delete', $category->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>
