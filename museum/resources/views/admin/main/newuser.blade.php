<!-- Original file: resources/views/admin/layouts/main.blade.php -->
@extends('admin.layouts.main')
@section('content')
<div class="app-wrapper">
    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">
        <!-- Header content here -->
    </nav>
    <!--end::Header-->

    @include('admin.layouts.sidebar') <!-- Include the sidebar template -->

    <!--begin::App Main-->
    <main class="app-main">
    @include('admin.layouts.header') <!-- Include the sidebar template -->

    <section class="content">
        <div class="container-fluid">
        <div class="col-12">
        <!-- Main content here -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h3 class="mb-3 mt-3">Добавление пользователя</h3>
                    <h4 class="mb-3 mt-4">При добавлении нового пользователя обратите внимание на присваиваемую роль.</h4>
                    <h4 class="mb-3 mt-3">Администратор имеет неограниченные права на сайте. Поэтому стоит ответственно относиться к выдаче прав кому-либо.</h4>
                    <h4 class="mb-3 mt-3">При самостоятельной регистрации пользователю абсолютно всегда будет выдана роль обычного пользователя.</h4>    
                    <h4 class="mb-3 mt-3">Если пользователь уже зарегистрирован, но Вы хотите дать ему права администратора, для этого нужно создать новый аккаунт, используя другой адрес почты. Создать несколько пользователей, используя один адрес электронной почты, не получится.</h4>


                    <form action="{{ route('admin.user.store') }}" method = "POST" class="col-4">
                        @csrf
                        <div>
                            <div class="form-group w-20">
                                <input type="text" class="form-control w-50" name="username" placeholder="Логин" value="{{ old('username') }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>  
                            <div class="form-group w-20">
                                <input type="text" class="form-control w-50" name="email" placeholder="e-mail" value="{{ old('email') }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group w-20">
                                <input type="text" class="form-control w-50" name="password" placeholder="Пароль" value="{{ old('password') }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div> 
                            <div class="form-group mt-3 w-50">
                                <h4>Выбор роли</h4>
                                <select name="role" class="form-control">
                                    @foreach($roles as $id => $role)
                                    <option value="{{ $id }}" 
                                            {{ $id == old('role') ? 'selected' : '' }}>
                                        {{ $role }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <input type="submit" class="btn btn-block btn-dark btn-lg " value="Добавить" style="width: 200px;">
                            </div>
                        </div> 
                    </form>
                        
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
