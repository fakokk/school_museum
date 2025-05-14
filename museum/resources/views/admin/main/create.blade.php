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
    <main class="app-main ">
        @include('admin.layouts.header') <!-- Include the sidebar template -->

        <h2>Создание нового поста</h2>

        <div class="col-12">
            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data" class="mt-30">
                @csrf
                <div class="form-group w-20">
                    <input type="text" class="form-control w-50" name="title" placeholder="Название" value="{{ old('title') }}">
                    @error('title')
                    <div class="text-danger">Это поле необходимо для заполнения</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <textarea name="content" id="summernote" class="summernote">{{ old('content') }}</textarea>
                    @error('content')
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
                        <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }} value="{{ $tag->id }}">
                            {{ $tag->title }}
                        </option>
                        @endforeach                 
                    </select>
                </div>

                <div class="form-group mt-3 w-50">
                    <h4>Загрузка изображения</h4>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="preview_image" id="preview_image">
                            <label class="custom-file-label" for="preview_image">Выбрать файл</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Загрузить</span>
                        </div>
                    </div>
                    @error('preview_image')
                    <div class="text-danger">Ошибка загрузки файла</div>
                    @enderror
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

<script>
    
</script>
@endsection
