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

        <h2>Создание нового экспоната</h2>

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
                    <h4>Загрузка изображений</h4>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photos[]" id="photos" multiple accept="image/*">
                            <label class="custom-file-label" for="photos">Выбрать файлы</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Загрузить</span>
                        </div>
                    </div>
                    @error('photos.*')
                    <div class="text-danger">Ошибка загрузки файла</div>
                    @enderror
                </div>

                <div class="form-group mt-3" id="image-preview-container">
                    <h4>Предпросмотр изображений</h4>
                    <div id="image-preview" class="d-flex flex-wrap"></div>
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
    document.getElementById('photos').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = ''; // Очистить предыдущий предпросмотр

        const files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgContainer = document.createElement('div');
                imgContainer.style.position = 'relative';
                imgContainer.style.marginRight = '10px';
                imgContainer.style.marginBottom = '10px';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.height = '100px'; // Установите желаемую высоту
                img.style.width = 'auto'; // Ширина автоматическая
                img.style.objectFit = 'cover'; // Сохранение пропорций

                const removeBtn = document.createElement('span');
                removeBtn.innerHTML = '&times;'; // Символ крестика
                removeBtn.style.position = 'absolute';
                removeBtn.style.top = '0';
                removeBtn.style.right = '0';
                removeBtn.style.cursor = 'pointer';
                removeBtn.style.color = 'red';
                removeBtn.style.fontSize = '20px';
                removeBtn.style.backgroundColor = 'white';
                removeBtn.style.borderRadius = '50%';
                removeBtn.style.padding = '2px 5px';

                // Удаление изображения из предпросмотра
                removeBtn.onclick = function() {
                    imgContainer.remove();
                    const dataTransfer = new DataTransfer();
                    for (let j = 0; j < files.length; j++) {
                        if (j !== i) {
                            dataTransfer.items.add(files[j]);
                        }
                    }
                    event.target.files = dataTransfer.files; // Обновление списка файлов
                };

                imgContainer.appendChild(img);
                imgContainer.appendChild(removeBtn);
                previewContainer.appendChild(imgContainer);
            }

            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
