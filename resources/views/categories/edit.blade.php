<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <h1>Edit Category</h1>

            @if ($errors->has('role'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('role') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}">
                @csrf
                @method('PUT')

                <!-- Category name -->
                <div class="mt-4">
                    <x-input-label for="names" :value="__('Category Name')" />
                    <x-text-input id="names" class="block mt-1 w-full" type="text" name="names" :value="old('names')" required autofocus />
                </div>

                <!-- Category Description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Category Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                </div>

                <x-primary-button class="mt-4 justify-center text-center">
                    {{ __('Update') }}
                </x-primary-button>
            </form>
        </div>
    </x-slot>
</x-app-layout>
