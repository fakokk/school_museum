@extends('admin.layouts.main')
@section('content')
<div class="app-wrapper">

    <main class="app-main ml-3">
        @include('admin.layouts.header')

        <h2>Редактирование экспоната</h2>

        <div class="col-12">
            <form action="{{ route('admin.showpiece.update', $showpiece->id) }}" method="POST" enctype="multipart/form-data" class="mt-30">
                @csrf
                @method('PATCH')
                <div class="form-group w-20">
                    <input type="text" class="form-control w-50" name="title" placeholder="Название" value="{{ old('title', $showpiece->title) }}">
                    @error('title')
                    <div class="text-danger">Это поле необходимо для заполнения</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <textarea name="content" id="summernote" class="summernote">{{ old('content', $showpiece->content) }}</textarea>
                    @error('content')
                    <div class="text-danger">Это поле необходимо для заполнения</div>
                    @enderror
                </div>
                <div class="form-group mt-3 w-50">
                    <h4>Выбор категории</h4>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $showpiece->category_id) ? 'selected' : '' }}>
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
                        <option {{ (is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids'))) || $showpiece->tags->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">
                            {{ $tag->title }}
                        </option>
                        @endforeach                 
                    </select>
                </div>

                <div class="form-group mt-3 w-50">
                    <h4>Загрузка изображений</h4>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photos[]" id="url" multiple>
                            <label class="custom-file-label" for="url">Выбрать файлы</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Добавить</span>
                        </div>
                    </div>
                    <div id="selected-photos-container" class="mt-3">
                        <!-- Selected photos will be displayed here -->
                    </div>
                    <input type="hidden" name="photos_data" id="photos-data">
                </div>

                <div class="form-group mt-3" id="image-preview-container">
                    <h4>Предпросмотр изображений</h4>
                    <div id="image-preview" class="d-flex flex-wrap">
                        @foreach($showpiece->photos as $photo)
                            <div class="img-container" style="position: relative; margin: 10px;">
                                <img src="{{ Storage::url($photo->url) }}" class="img-thumbnail" alt="Фото экспоната" style="height: 100px; width: auto;">
                                <span class="remove-photo" data-id="{{ $photo->id }}" style="position: absolute; top: 0; right: 0; cursor: pointer; color: red; font-size: 20px;">&times;</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" value="Сохранить изменения">
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
    

<!-- Подключение стилей и скриптов -->
@section('scripts')
     <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}" />
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
@endsection

<script>
    const photosInput = document.getElementById('url');
    const imagePreviewContainer = document.getElementById('image-preview');

    // Функция для добавления превью изображений
    function addImagePreview(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imgContainer = document.createElement('div');
            imgContainer.className = 'img-container'; // Добавляем класс для стиля
            imgContainer.style.position = 'relative';
            imgContainer.style.margin = '10px';

            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'img-thumbnail'; // Используем тот же класс для стиля
            img.style.height = '100px';
            img.style.width = 'auto';
            img.style.objectFit = 'cover';

            const removeBtn = document.createElement('span');
            removeBtn.innerHTML = '&times;';
            removeBtn.style.position = 'absolute';
            removeBtn.style.top = '0';
            removeBtn.style.right = '0';
            removeBtn.style.cursor = 'pointer';
            removeBtn.style.color = 'red';
            removeBtn.style.fontSize = '20px';
            removeBtn.style.backgroundColor = 'white';
            removeBtn.style.borderRadius = '50%';
            removeBtn.style.padding = '2px 5px';

            // Удаление превью изображения
            removeBtn.onclick = function() {
                imgContainer.remove();
                // Удаление файла из input
                const dt = new DataTransfer();
                for (let j = 0; j < photosInput.files.length; j++) {
                    const currentFile = photosInput.files[j];
                    if (currentFile !== file) {
                        dt.items.add(currentFile);
                    }
                }
                photosInput.files = dt.files;
            };

            imgContainer.appendChild(img);
            imgContainer.appendChild(removeBtn);
            imagePreviewContainer.appendChild(imgContainer);
        };
        reader.readAsDataURL(file);
    }

    photosInput.addEventListener('change', function(event) {
        const files = event.target.files;

        // Обновляем предпросмотр изображений
        for (let i = 0; i < files.length; i++) {
            addImagePreview(files[i]);
        }
    });

    // Обработчик для удаления существующих изображений
    document.querySelectorAll('.remove-photo').forEach(function(removeBtn) {
    removeBtn.onclick = function() {
        const imgContainer = this.parentElement;
        const photoId = this.getAttribute('data-id');

        // Используем Laravel route() для генерации правильного URL
        const destroyUrl = "{{ route('admin.showpiece.photo.destroy', ':id') }}".replace(':id', photoId);

        // Отправка AJAX-запроса для удаления изображения из базы данных
        fetch(destroyUrl, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', 
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                imgContainer.remove(); // Удаляем изображение из предпросмотра
            } else {
                alert('Ошибка при удалении изображения');
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
    };
});


</script>

@endsection
