@extends('layouts.app')

@section('content')
<!-- Экспонаты, отображаемые на сайте -->
@include('layouts.header') <!-- Include the sidebar template -->


<div class="app-wrapper">
    <!--begin::App Main-->
    <main class="app-main">
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">

                    <div style="margin-top: 30px; ">
                        <h1>Экспонаты виртуального музея</h1>
                    </div>

                    <div style="margin-top: 20px; margin-bottom: 50px;">
                        <h4 style="margin-top: 30px">
                            В виртуальном музее представлены экспонаты, экспозиции и фотоархивы, собранные музеем МБОУ "Верхне-Ульхунская СОШ".
                        </h4>
                        <h4 style="margin-top: 30px">
                            На площади 84 кв.м в двух помещениях находится около 9 тысяч экспонатов, из которых материальных – 5500, документальных – 3500. Имеется 10 постоянных экспозиций, повествующих об истории пограничного казачества, гражданской войны в Забайкалье, об истории колхоза «Путь Ильича», русско-монгольской дружбы и многом другом. 
                        </h4>
                    </div>

                    <hr style="margin-top: 20px;">
                    <div class="row" style="margin-bottom: 50px;">

                    <h2 style="text-align: center; margin-bottom: 20px;">Подборки экспонатов</h2>

                        <div class="" style="width: 18rem; margin-left: 20px;" data-tag-id="10">
                            <a style="text-decoration: none;">
                                <div class="card-my" style="width: 18rem; background-image: url('../../dist/assets/img/news.jfif'); ">
                                    <div class="card-body-my text-center" style="">
                                        <h4>Караульскою тропою</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="" style="width: 18rem; margin-left: 20px;" data-tag-id="6">
                            <a style="text-decoration: none;">
                                <div class="card-my" style="background-image: url('../../dist/assets/img/byt.jfif'); ">
                                    <div class="card-body-my text-center" style="">
                                        <h4>Предметы быта</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="" style="width: 18rem; margin-left: 20px;" data-tag-id="4">
                            <a style="text-decoration: none;">
                                <div class="card-my" style="background-image: url('../../dist/assets/img/arhive.jfif'); ">
                                    <div class="card-body-my text-center" style="">
                                        <h4>Фотоархивы</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="" style="width: 18rem; margin-left: 20px;" data-tag-id="9">
                            <a style="text-decoration: none;">
                                <div class="card-my" style="background-image: url('../../dist/assets/img/school.jpg'); ">
                                    <div class="card-body-my text-center" style="">
                                        <h4>История школы</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="" style="width: 18rem; margin-left: 20px;" data-tag-id="3">
                            <a style="text-decoration: none;">
                                <div class="card-my" style="background-image: url('../../dist/assets/img/priroda.jfif'); ">
                                    <div class="card-body-my text-center" style="">
                                        <h4>Природа</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        </div>
                    <hr>
                    <form action="/search" method="GET" class="search-form" style="display: flex; justify-content: flex-end; align-items: center; margin-top: 30px;">
                        <input type="search" name="query" placeholder="Найти экспонат..." class="form-control" style="width: 400px;">
                        <button type="submit" class="btn btn-block btn-dark btn-lg" style="margin-left: 20px; width: 150px; height: 40px; display: flex; justify-content: center; align-items: center;">Поиск</button>
                    </form>



                    <div class="container-fluid" style="margin-top: 50px">
                        <div class="row justify-content-center">
                            @foreach($showpieces as $showpiece)
                            <div class="card" style="background-image: url('../../dist/assets/img/stolb.jfif'); background-size: cover; background-position: center; color: white; border: none; display: flex; flex-direction: column; margin: 10px; max-height: 500px;" >    
                                
                                <div id="carousel-{{ $showpiece->id }}" class="carousel slide" data-ride="carousel" data-interval="false">
                                    <div class="carousel-inner">
                                        @foreach($showpiece->photos as $index => $photo)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="margin-top: 5px">
                                                <div class="photo-container">
                                                    <img src="{{ Storage::url($photo->url) }}" class="d-block img-thumbnail photo" alt="Фото экспоната">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-body text-center" style="padding: 10px; background-color: rgba(0, 0, 0, 0.5); border-radius: 10px; flex-grow: 0; display: flex; flex-direction: column; justify-content: center; height: 80px; margin-bottom: 5px">
                                    <h5 class="card-title" style="margin: 0;">{{$showpiece->title}}</h5>
                                    <a href="{{ route('showpiece.show', $showpiece->id) }}" class="card-link">
                                    <i class="fa-solid fa-eye"></i>
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
            
            <!-- views/vendor/pagination/bootstrap-4blade.php -->
            <div class="d-flex justify-content-center">
                {{ $showpieces->links() }} 
            </div>
            

        </section>
    </main>

</div>

<style>
    header {
        position: fixed;
    }
    .post-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 10px;
    }
    .custom-button {
        background-color: rgb(54, 112, 55);
        color: white;
        border: none;
        padding: 8px 15px;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .custom-button:hover {
        background-color: #45a049;
    }
    .post-tags {
        display: inline-flex;
        margin-right: 10px;
    }
    .tag {
        background-color: #e0e0e0;
        border-radius: 5px;
        padding: 5px 10px;
        margin-right: 5px;
    }
    .row {
        display: flex; /* Используем Flexbox для расположения карточек в ряд */
        flex-wrap: wrap; /* Позволяем карточкам переноситься на новую строку при необходимости */
        justify-content: center; /* Центрируем карточки по горизонтали */
    }
    .card {
        margin: 10px; /* Отступы между карточками */
        max-width: 500px; /* Максимальная ширина карточки */
        display: flex;
        flex-direction: column;
        max-height: auto; /* Максимальная высота карточки */
    }
    .card-my{
        width: auto; 
        background-size: cover; background-position: center; color: white; border: none; display: flex; flex-direction: column;
        border-radius: 20px
    }
    .card-body-my{
        height: 250px; padding: 20px; background-color: rgba(0, 0, 0, 0.5); border-radius: 20px; flex-grow: 1; display: flex; flex-direction: column; justify-content: center;
    }

    .photo-container {
        display: flex;
        justify-content: center; /* Центрируем изображение по горизонтали */
        align-items: center; /* Центрируем изображение по вертикали */
        height: 300px; /* Установите фиксированную высоту для блока с изображениями */
    }
    .photo {
        max-height: 100%; /* Ограничиваем высоту изображения до 100% контейнера */
        max-width: 100%; /* Ограничиваем ширину изображения до 100% контейнера */
        height: auto; /* Автоматическая высота для вертикальных изображений */
        width: 100%; /* Устанавливаем ширину изображения в 100% карточки */
        object-fit: cover; /* Обеспечиваем сохранение пропорций изображения */
    }
    /* Стили для уменьшения размера стрелок карусели */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(255, 255, 255, 0.5); /* Фон для стрелок */
        width: 30px; /* Ширина стрелок */
        height: 30px; /* Высота стрелок */
    }
    
</style>

<script>
    document.querySelectorAll('.photo').forEach(function(img) {
        img.onload = function() {
            if (img.naturalHeight > img.naturalWidth) {
                img.classList.add('vertical');
            } else {
                img.classList.add('horizontal');
            }
        };
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Обработчик клика по иконке просмотра
        document.querySelectorAll('.card-link').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Отменяем стандартное поведение ссылки
                const showpieceId = this.getAttribute('href').split('/').pop(); // Получаем ID экспоната

                // AJAX-запрос для получения данных о экспонате
                fetch(`/showpiece/${showpieceId}`)
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


@endsection