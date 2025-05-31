@extends('admin.layouts.main')
@section('content')
<div class="app-wrapper">
<main class="app-main " style="margin-left: 30px; margin-top: 30px;">
        <h2 style="margin-bottom: 30px;">Редактирование поста</h2>

        <div class="col-12">
            <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="mt-30">
                @csrf
                @method('PATCH')
                <div class="form-group w-20">
                    <input type="text" class="form-control w-50" name="title" placeholder="Название" value="{{ $post->title }}">
                    @error('title')
                    <div class="text-danger">Это поле необходимо для заполнения</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <textarea name="content" id="summernote" class="summernote">{{ $post->content }}</textarea>
                    @error('content')
                    <div class="text-danger">Это поле необходимо для заполнения</div>
                    @enderror
                </div>
                <div class="form-group mt-3 w-50">
                    <h4>Выбор категории</h4>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                                {{ $category->id == $post->category_id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!-- добавление тегов -->
                <div class="form-group mt-3 w-50">
                    <h4>Выбор тегов</h4>
                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                        @php
                            $selectedTagIds = $post->tags->pluck('id')->toArray(); // Преобразуем коллекцию в массив
                        @endphp
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTagIds) ? 'selected' : '' }}>
                                {{ $tag->title }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group mt-3 w-50">
                    <h4>Загрузка изображения</h4>
                    <div class="w-40 mb-3 mt-2">
                        <img src="{{ asset('storage/'. $post->preview_image) }}" alt="preview_image" class="w-50">
                    </div>
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
                    <input type="submit" class="btn btn-primary" value="Обновить">
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
