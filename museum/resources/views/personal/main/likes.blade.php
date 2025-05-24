@extends('personal.layouts.main')
@section('content')
<div>
    
        @include('layouts.header') <!-- Подключение header из layouts -->
        <!-- Main content here -->

</div>
<div class="app-wrapper">
    @include('personal.layouts.sidebar') 
    <main class="app-main">
                    <div class="row">
                <div class="col-12">

                    <h3 class="mb-3 mt-3">Посты</h3>
                    <h4 class="mb-3 mt-3">Отображение всех материалов сайта.</h4>

                    <!-- таблица вывода всех лайков -->
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title">Категории материалов</h3>

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
                                    <th>Пост</th>       
                                    <th>Просмотр</th>
                                    <th>Убрать лайк</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                </tr>
                                    <td>{{$post->title}}</td>
                            
                                    <!-- просмотр поста с такой категорией -->
                                    <td style="width: 70px;" class="text-center">
                                        <a href=""><img src="../../dist/assets/img/icons/eye-regular.svg"
                                                    width="20" height="20" style="margin-left: 35px;"/></a>
                                    </td>
                                    <!-- удаление категорий -->
                                    <td style="width: 70px;" class="text-center">
                                        <form action="{{ route('personal.likes.delete', $post->id) }}"
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
    </main>
    <!--end::App Main-->

    <!--begin::Footer-->
    <footer class="app-footer">
        <!-- Footer content here -->
    </footer>
    <!--end::Footer-->
</div>
@endsection
