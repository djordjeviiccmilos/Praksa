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
                <!-- User name -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" autofocus />
                    <x-input-error :messages="$errors->get('names')" class="mt-2" />
                </div>

                <!-- User email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email', $user->email)" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- User role -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Category Description')" />
                    <select id="role" name="role" class="form-control">
                        <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>

                <x-primary-button class="mt-4 justify-center text-center">
                    {{ __('Update') }}
                </x-primary-button>
            </form>
        </div>
    </section>

</x-app-layout>
