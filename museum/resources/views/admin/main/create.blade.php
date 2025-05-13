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

        <h2>Создание нового поста</h2>

        <div class="col-12">
            <form action="{{route('admin.post.store')}}" method="POST" class="ml-3">
                @csrf
                <div class="form-group w-20">
                    <input type="text" class="form-control" name="title" placeholder="Название"
                    value="{{ old('title')}}">
                    @error('title')
                    <div class="text-danger">Это поле необходимо для заполнения</div>
                    @enderror
                </div>
                <div class="form-group mt-3 ">
                    <textarea name="content" id="summernote" class="summernote">{{ old('content')}}</textarea>
                    @error('title')
                    <div class="text-danger">Это поле необходимо для заполнения</div>
                    @enderror
                </div>
                <div class="form-group mt-3 w-50">
                        <h4>Выбор категории</h4>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                            @endforeach
                        </select>
                </div>
                <!-- добавление тегов -->
                <div class="form-group mt-3 w-50">
                    <h4>Выбор тегов</h4>
                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                        @foreach($tags as $tag)
                            <option  {{ is_array(old( 'tag_ids') ) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }} value="{{ $tag->id }}">
                            {{ $tag->title }}
                            </option> 
                        @endforeach                 
                    </select>
                </div>

                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" value="Добавить">
                </div>
            </form>
        </div>

    </main>
    <!--end::App Main-->

    <!--begin::Footer-->
    <footer class="app-footer">
        <!-- Footer content here -->
    </footer>
    <!--end::Footer-->
</div>

<!-- Подключение CSS для Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<!-- Подключение CSS для Summernote -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">

<!-- Подключение jQuery (требуется для Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Подключение JS для Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- Подключение JS для Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>

<script>
$(document).ready(function() {
    // Инициализация Summernote
    $('#summernote').summernote({
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    // Инициализация Select2
    $('.select2').select2();
});
</script>
@endsection
