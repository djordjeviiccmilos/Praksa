<x-app-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a new manager') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg justify-content-center">
            <form method="POST" action="{{ route('managers.store') }}">
                @csrf

                <!-- Name -->
                <div class="max-w-full text-center mt-4 col-md-6">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="max-w-full text-center mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="max-w-full text-center mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class=""
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="max-w-full text-center mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class=""
                                  type="password"
                                  name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-center mt-4">
                    <x-primary-button class="ms-4 mt-4 text-center">
                        {{ __('Add a new manager') }}
                    </x-primary-button>
                </div>
            </form>

            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('Manager added') }}
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
