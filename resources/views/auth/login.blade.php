@extends('layouts.navigation')
@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container jost-weight">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="row pt-5">
            <div class="col-md-2 mx-auto">
                <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" placeholder="Почта" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <!-- Password -->
        <div class="row mt-3">
            <div class="col-md-2 mx-auto">

                <x-text-input id="password" class="block mt-1 w-full form-control"
                                type="password"
                                name="password"
                                placeholder="Пароль"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <!-- Remember Me -->
        <div class="row mt-3">
            <div class="col-md-2 mx-auto">
                <div class="block">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Запомнить меня') }}</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2 mx-auto">
                    <x-primary-button class="form-control bg-primary">
                        {{ __('Войти') }}
                    </x-primary-button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2 mx-auto">
                    @if (Route::has('password.request'))
                        <a class="text-white" href="{{ route('password.request') }}">
                            {{ __('Забыли пароль?') }}
                        </a>
                    @endif
            </div>
        </div>

    </form>
    </div>
@endsection
