<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <section>
        <header class="mt-3">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Profile Information') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>

        <div style="display: block">
            <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}" style="display: inline-block; margin-left: auto; margin-right: auto; width: 50%; text-align: left">
                @csrf
                <!-- Category name -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
                    <x-input-error :messages="$errors->get('names')" class="mt-2" />
                </div>

                <!-- Category Description -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <x-primary-button class="mt-4 justify-center text-center">
                    {{ __('Update') }}
                </x-primary-button>
            </form>
        </div>
    </section>

</x-app-layout>
