@extends('layouts.navigation')
@section('content')
<div class="container jost-weight">
    <div class="main-description text-center">
        Регистрация
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
       <div class="row pt-5">
            <div class="col-md-2 mx-auto">
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" class="form-control" placeholder="Имя" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
       </div>
        

        <!-- Email Address -->
        <div class="row mt-3">
            <div class="col-md-2 mx-auto">
                <x-text-input id="email" class="block mt-1 w-full" type="email" placeholder="Почта" name="email" class="form-control" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <!-- Password -->
        <div class="row mt-3">
            <div class="col-md-2 mx-auto">
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Пароль"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="row mt-3">
            <div class="col-md-2 mx-auto">
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"
                                placeholder="Повтор пароля"
                                class="form-control" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2 mx-auto">
                    <x-primary-button class="bg-primary form-control">
                       Регистрация
                    </x-primary-button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2 mx-auto text-center">
                <a class="text-white" href="{{ route('login') }}">
                    {{ __('Уже зарегистрированы?') }}
                </a>
            </div>
        </div>
    </form>
    </div>
@endsection