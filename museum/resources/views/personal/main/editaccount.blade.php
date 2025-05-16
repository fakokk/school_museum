@extends('personal.layouts.main')

@section('content')
<div>
    @include('layouts.header')
</div>
<div class="app-wrapper">
    @include('personal.layouts.sidebar')

    <main class="app-main">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2>Редактирование профиля</h2>
                        </div>

                        <div class="card-body text-center">
                            <div class="avatar avatar-lg mb-3">
                                <img alt="avatar" src="{{ Auth::user()->user_image ? asset('storage/' . Auth::user()->user_image) : asset('default-avatar.png') }}" class="rounded-circle" style="width: 150px; height: 150px;" />
                            </div>
                            <form action="{{ route('personal.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Имя пользователя</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Электронная почта</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Новый пароль (оставьте пустым, если не хотите менять)</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="user_image" class="form-label">Изображение профиля</label>
                                    <input type="file" class="form-control" id="user_image" name="user_image" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="app-footer">
    </footer>
</div>
@endsection
