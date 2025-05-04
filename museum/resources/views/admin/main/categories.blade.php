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
                    <h3 class="mb-3 mt-3">Добавление Категории</h1>
                    
                    <!-- создание новой категории -->
                    <form action="{{ route('admin.category.store') }}" method = "POST" class="col-4">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name = "title" placeholder="Ввести ...">
                            <input type="submit" class="btn btn-block btn-dark btn-lg mt-3" value="Добавить">
                        </div>
                        
                    </form>     

                    <!-- таблица вывода всех категорий -->
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title">Теги, добавляемые к материалам</h3>

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
                                    <th>Тег</th>
                                    <th>Просмотр</th>
                                    <th>Редактировать</th> 
                                    <th>Удалить</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                </tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    

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

                                        <form action="{{ route('admin.category.delete', $category->id) }}"
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
