@extends('admin.layouts.main')
@section('content')
<div class="app-wrapper">
    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">
        <!-- Header content here -->
    </nav>
    <!--end::Header-->

    @include('admin.layouts.sidebar')

    <!--begin::App Main-->
    <main class="app-main">
    @include('admin.layouts.header')

    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <h3 class="mb-3 mt-3">Пользователи</h3>
                            <h4 class="mb-3 mt-3">Управление пользователями системы</h4>
                            
                            <div class="form-group mt-3">
                                <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-dark btn-lg" style="width: 200px;">
                                    Добавить пользователя
                                </a>
                            </div>

                            <!-- таблица вывода всех пользователей -->
                            <div class="card mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Пользователи</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Поиск">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Пользователь</th>
                                                <th>Email</th>
                                                <th>Роль</th>
                                                <th>Статус</th>
                                                <th>Блокировка</th>
                                                <th>Действия</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($user as $user)
                                        <tr class="{{ $user->is_banned ? 'table-danger' : '' }}">
                                            <td>{{ $user->id }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <!-- Аватарка в кружочке -->
                                                    <div class="avatar-circle me-3">
                                                        @if($user->avatar)
                                                            <img src="{{ asset('storage/' . $user->avatar) }}" 
                                                                alt="{{ $user->username }}" 
                                                                class="avatar-img">
                                                        @else
                                                            <div class="avatar-default bg-{{ $user->role === 0 ? 'danger' : 'primary' }}">
                                                                {{ substr($user->username, 0, 1) }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('profile', $user->id) }}" class="text-dark font-weight-bold">
                                                            {{ $user->username }}
                                                        </a>
                                                        <div class="text-muted small">
                                                            {{ Str::limit($user->bio, 30) ?? 'Нет описания' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->role === 0)
                                                    <span class="badge bg-danger">
                                                        <i class="fas fa-crown me-1"></i> Админ
                                                    </span>
                                                @else
                                                    <span class="badge bg-primary">
                                                        <i class="fas fa-user me-1"></i> Гость
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="user-status">
                                                    @if($user->isOnline())
                                                        <span class="badge bg-success">
                                                            <i class="fas fa-circle"></i> Online
                                                        </span>
                                                    @else
                                                        <span class="text-muted small">
                                                            <i class="far fa-clock"></i> {{ $user->last_seen_at ? $user->last_seen_at->diffForHumans() : 'давно' }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                @if($user->is_banned)
                                                    <span class="badge bg-danger">
                                                        <i class="fas fa-lock"></i> Заблокирован
                                                    </span>
                                                @else
                                                    <span class="badge bg-success">
                                                        <i class="fas fa-check-circle"></i> Активен
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <!-- Просмотр -->
                                                    <a href="{{ route('profile', $user->id) }}" 
                                                    class="btn btn-sm btn-info me-2" 
                                                    title="Профиль">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    
                                                    <!-- Редактирование -->
                                                    <a href="{{ route('admin.user.edit', $user->id) }}" 
                                                    class="btn btn-sm btn-warning me-2" 
                                                    title="Редактировать">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    
                                                    <!-- Блокировка/разблокировка -->
                                                    <form action="{{ route('admin.user.toggle-ban', $user->id) }}" 
                                                        method="POST" 
                                                        class="me-2">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" 
                                                                class="btn btn-sm {{ $user->is_banned ? 'btn-success' : 'btn-secondary' }}"
                                                                title="{{ $user->is_banned ? 'Разблокировать' : 'Заблокировать' }}">
                                                            <i class="fas {{ $user->is_banned ? 'fa-unlock' : 'fa-lock' }}"></i>
                                                        </button>
                                                    </form>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">Пользователи не найдены</td>
                                        </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>
    
    <!--end::App Main-->

    <!--begin::Footer-->
    <footer class="app-footer">
        <!-- Footer content here -->
    </footer>
    <!--end::Footer-->
</div>
@endsection