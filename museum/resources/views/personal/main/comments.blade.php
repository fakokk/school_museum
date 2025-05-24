@extends('personal.layouts.main')
@section('content')
<div>
        @include('layouts.header')
</div>
<div class="app-wrapper">

    @include('personal.layouts.sidebar')

    <main class="app-main">
        <h2>Комментарии</h2>
        <section class="content">
            <div class="container-fluid">
                
                    <!-- таблица вывода всех комментариев -->
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title">Комментарии</h3>

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
                                    <th>Редактировать</th>
                                    <th>Удалить</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                </tr>
                                    <td>{{$comment->title}}</td>
                            
                                    <!-- редактирование поста  -->
                                    <td style="width: 70px;" class="text-center">
                                        <a href="{{ route('admin.post.edit', $comment->id) }}">
                                            <img src="../../dist/assets/img/icons/pencil-solid.svg" width="20" height="20" style="margin-left: 35px;"/>
                                        </a>
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
