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

                    <h3 class="mb-3 mt-3">Пользователи</h3>
                    <h4 class="mb-3 mt-3">На это странице можно отследить пользователей сайта, просмотреть комментарии, которые
                        они оставляют, а также заблокировать пользователя.</h4>
                    
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
                            <div class="input-group i0nput-group-sm" style="width: 150px;">
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
                                    <th>Имя</th>  
                                    <th>Адрес почты</th>                                  
                                    <th>Роль</th>
                                    <th>Просмотр</th>
                                    <th>Редактировать</th> 
                                    <th>Удалить</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <!-- </tr>
                                    <td></td>
                                    <td>ввв</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr> -->
                                @foreach($user as $user)
                                </tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>

                                    <!-- просмотр постов с такой категорией -->
                                    <td style="width: 70px;" class="text-center">
                                        <a href=""><img src="../../dist/assets/img/icons/eye-regular.svg"
                                                    width="20" height="20" style="margin-left: 35px;"/></a>
                                    </td>
                                    <!-- редактирование категорий  -->
                                    <td style="width: 70px;" class="text-center">
                                        <a href=""><img src="../../dist/assets/img/icons/pencil-solid.svg"
                                                    width="20" height="20" style="margin-left: 35px;"/></a>
                                    </td>   
                                    
                                    <!-- удаление категорий -->
                                    <td style="width: 70px;" class="text-center">

                                        <form action="{{ route('admin.user.delete', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-white" width="20" height="20">
                                                <img src="../../dist/assets/img/icons/delete.png"
                                                        width="20" height="20" style="margin-left: 35px;" role="button" type="submit"/>
                                                </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                            
                            </table>
                        </div>
                        <!-- /.card-body -->
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
