@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">{{ __('Регистрация') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/images/logo.jpg') }}" alt="Логотип" class="img-fluid" style="max-width: 200px;">
                    </div>

                    @csrf

                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Логин') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Адрес почты') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Подтвердите пароль') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0 justify-content-center">
                        <div class="col-md-8 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Зарегистрироваться') }}
                            </button>

                            <div class="mt-2">
                                <a href="{{ route('login') }}">
                                    {{ __('Уже есть аккаунт? Войти') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f8f9fa; /* Цвет фона страницы */
    }
    .card {
        border-radius: 10px; /* Закругление углов карточки */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Тень для карточки */
    }
    .card-header {
        background-color:rgb(63, 86, 123); /* Цвет фона заголовка карточки */
        color: white; /* Цвет текста заголовка */
        font-weight: bold; /* Жирный шрифт */
    }
    .btn-primary {
        background-color: rgb(63, 86, 123); /* Цвет кнопки */
        border: none; /* Убираем границу */
    }
    .btn-primary:hover {
        background-color: rgb(63, 86, 123); /* Цвет кнопки при наведении */
    }
    a {
        color: rgb(63, 86, 123);
        text-decoration: none;
    }
    a:hover {
        color: rgb(63, 86, 123);
        text-decoration: underline;
    }
</style>
@endsection
