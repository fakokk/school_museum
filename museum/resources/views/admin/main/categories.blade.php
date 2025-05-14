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

                    <h3 class="mb-3 mt-3">Категории материалов</h3>
                    <h4 class="mb-3 mt-3">К категориям материалов относятся такие метки, которые добавляются к постам. Обратите Ваше внимание, 
                        это не то же самое, что и теги. Категория у материала может быть лишь одна, в отличии от тегов.
                    </h4>
                    
                    <!-- создание новой категории -->
                    <form action="{{ route('admin.category.store') }}" method = "POST" class="col-4">
                        @csrf
                        <div class="form-group d-flex" >
                            <input type="text" class="form-control" name = "title" placeholder="Ввести ...">
                            <input type="submit" class="btn btn-block btn-dark btn-lg ms-4" value="Добавить">
                        </div> 
                    </form>     

                    <!-- таблица вывода всех категорий -->
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
                                    <th>ID</th>
                                    <th>Категория</th>
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
                                        <a href="#" class="edit-category" data-toggle="modal" data-target="#editCategoryModal" data-id="{{ $category->id }}" data-title="{{ $category->title }}">
                                            <img src="../../dist/assets/img/icons/pencil-solid.svg" width="20" height="20" style="margin-left: 35px;"/>
                                        </a>
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

                <!-- Edit category Modal -->
        <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Редактировать категорию</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editCategoryForm" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="categoryTitle">Название</label>
                                <input type="text" class="form-control" id="categoryTitle" name="title" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
    $(document).ready(function() {
    $('.edit-category').on('click', function() {
        var categoryId = $(this).data('id');
        var categoryTitle = $(this).data('title');

        // Set the form action to the update route
        $('#editCategoryForm').attr('action', '{{ route("admin.category.update", ":id") }}'.replace(':id', categoryId));

        // Populate the input field with the current category title
        $('#categoryTitle').val(categoryTitle);
    });

    // Optional: Handle form submission via AJAX
    $('#editCategoryForm').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                // Reload the page or update the table row
                location.reload();
            },
            error: function(xhr) {
                alert('Ошибка при обновлении категории');
            }
        });
    });

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
});
</script>




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
