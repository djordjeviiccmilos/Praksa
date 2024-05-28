<x-app-layout>
    <div style="display: block; text-align: center; margin-top: 50px">
        <form method="POST" action="{{ route('categories.store') }}" style="display: inline-block; margin-left: auto; margin-right: auto; text-align: left;">
            @csrf
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
                {{ __('Add') }}
            </x-primary-button>
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
</x-app-layout>
