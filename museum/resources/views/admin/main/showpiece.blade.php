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

                    <div style="margin-top: 30px">
                        <h1>Экспонаты виртуального музея</h1>
                    </div>

                    <!-- Форма фильтров и поиска -->
                    <div class="row" style="margin-top: 20px;">
                        <form method="GET" action="{{ route('admin.showpiece.index') }}" class="form-inline">
                            <div class="form-group mb-2">
                                <input type="text" name="search" class="form-control" placeholder="Поиск по названию" value="{{ request('search') }}">
                            </div>
                            <div class="form-group mb-2 mx-sm-3">
                                <select name="category" class="form-control">
                                    <option value="">Выберите категорию</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2 mx-sm-3">
                                <select name="tag" class="form-control">
                                    <option value="">Выберите тег</option>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ request('tag') == $tag->id ? 'selected' : '' }}>{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Фильтровать</button>
                        </form>
                    </div>

                    <div class="container-fluid" style="">
                        <div class="row">
                            
                            <a href="{{ route('admin.showpiece.create') }}" style="text-decoration: none; margin-left: 8px;">
                                <div class="card" style="width: 18rem; background-image: url('../../dist/assets/img/stolb.jfif'); background-size: cover; background-position: center; color: white; border: none; display: flex; flex-direction: column;">
                                    <div class="card-body text-center" style="padding: 20px; background-color: rgba(0, 0, 0, 0.5); border-radius: 10px; flex-grow: 1; display: flex; flex-direction: column; justify-content: center;">
                                        <h3 style="font-size: 50px;">+</h3>
                                        <h5 class="card-title" style="margin-top: 10px;">Новый экспонат</h5>
                                    </div>
                                </div>
                            </a>

                            @foreach($showpieces as $showpiece)
                                <div class="card" style="width: 18rem; margin-left: 20px; margin-bottom: 20px;">
                                    <div class="card-body" style=";">
                                        <h5 class="card-title">{{$showpiece->title}}</h5>
                                    </div>

                                    <div class="card-body">
                                        <h6>Фотографии ({{ $showpiece->photos->count() }}) :</h6>
                                        <!-- Карусель основной страницы -->
                                        <div id="carousel-{{ $showpiece->id }}" class="carousel slide" data-ride="carousel" data-interval="false">
                                            <div class="carousel-inner">
                                                @foreach($showpiece->photos as $index => $photo)
                                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                        <img src="{{ Storage::url($photo->url) }}" class="d-block w-100 img-thumbnail" alt="Фото экспоната" style="height: 150px; object-fit: cover;">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#carousel-{{ $showpiece->id }}" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carousel-{{ $showpiece->id }}" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <button type="button" class="btn btn-block btn-warning btn-sm">{{$showpiece->category ? $showpiece->category->title : 'Без категории'}}</button>
                                        <p class="card-text"></p>
                                    </div>
                                    <ul class="list-group ">
                                        <div>
                                            <li class="list-group-item">{{ Str::limit(strip_tags($showpiece->content), 150, '...') }}</li>
                                        </div>
                                          
                                    </ul>

                                    <div style="margin-top: 15px;margin-left: 15px">
                                        @if($showpiece->tags->count() > 0)
                                            <div class="post-tags">
                                                @foreach($showpiece->tags as $tag)
                                                    <span class="tag">{{ $tag->title }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                        </div>  

                                    <div class="card-body">
                                        <a href="{{ route('admin.showpiece.show', $showpiece->id) }}" class="card-link">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.showpiece.edit', $showpiece->id) }}" class="card-link">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Модальное окно -->
            <div class="modal fade" id="showpieceModal" tabindex="-1" role="dialog" aria-labelledby="showpieceModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showpieceModalLabel">Информация о экспонате</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="showpieceDetails">
                                <!-- Здесь будет отображаться информация о экспонате -->
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

<style>
    .card {
        border: none; /* Убираем границы карточек */
        border-radius: 10px; /* Закругляем углы карточек */
        overflow: hidden; /* Скрываем переполнение */
    }

    .carousel-inner img {
        height: 150px; /* Фиксированная высота для изображений */
        object-fit: cover; /* Сохраняем пропорции изображений */
        width: 100%; /* Ширина изображения 100% */
    }

    .post-tags {
        display: inline-flex;
        flex-wrap: wrap; /* Позволяем тегам переноситься на новую строку */
    }

    .tag {
        background-color: #e0e0e0; /* Цвет фона для тегов */
        border-radius: 5px; /* Закругляем углы тегов */
        padding: 5px 10px; /* Отступы внутри тегов */
        margin-right: 5px; /* Отступ между тегами */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Обработчик клика по иконке просмотра
        document.querySelectorAll('.card-link').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Отменяем стандартное поведение ссылки
                const showpieceId = this.getAttribute('href').split('/').pop(); // Получаем ID экспоната

                // AJAX-запрос для получения данных о экспонате
                fetch(`/admin/showpiece/${showpieceId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Заполняем модальное окно данными
                        document.getElementById('showpieceModalLabel').innerText = data.title;
                        document.getElementById('showpieceDetails').innerHTML = `
                            <p><strong>Описание:</strong> ${data.content}</p>
                            <p><strong>Категория:</strong> ${data.category ? data.category.title : 'Без категории'}</p>
                            <p><strong>Теги:</strong> ${data.tags.map(tag => tag.title).join(', ')}</p>
                            <!-- Карусель формы -->
                            <div id="carousel-form-${data.id}" class="carousel slide" data-ride="carousel" data-interval="false">
                                <div class="carousel-inner">
                                    ${data.photos.map((photo, index) => `
                                        <div class="carousel-item ${index === 0 ? 'active' : ''}">
                                            <img src="${photo.url}" class="d-block" alt="Фото экспоната" style="width: 100%; height: auto; object-fit: cover;">
                                        </div>
                                    `).join('')}
                                </div>
                                <a class="carousel-control-prev" href="#carousel-form-${data.id}" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-form-${data.id}" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        `;
                        // Показываем модальное окно
                        $('#showpieceModal').modal('show');
                    })
                    .catch(error => console.error('Ошибка:', error));
            });
        });
    });
</script>

