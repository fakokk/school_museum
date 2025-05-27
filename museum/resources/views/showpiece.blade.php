@extends('layouts.app')

@section('content')
<!-- Экспонаты, отображаемые на сайте -->
@include('layouts.header') <!-- Include the sidebar template -->
<div>
    @include('layouts.sidebar') <!-- Include the sidebar template -->
</div>

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

                        <div class="" style="width: 18rem; margin-left: 20px;">
                            <a href="{{ route('admin.post.create') }}" style="text-decoration: none;">
                                <div class="card-my" style="width: 18rem; background-image: url('../../dist/assets/img/news.jfif'); ">
                                    <div class="card-body-my text-center" style="">
                                        <h4>Караульскою тропою</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="" style="width: 18rem; margin-left: 20px;">
                            <a href="{{ route('admin.showpiece.create') }}" style="text-decoration: none;">
                                <div class="card-my" style="background-image: url('../../dist/assets/img/byt.jfif'); ">
                                    <div class="card-body-my text-center" style="">
                                        <h4>Предметы быта</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="" style="width: 18rem; margin-left: 20px;">
                            <a href="{{ route('admin.showpiece.create') }}" style="text-decoration: none;">
                                <div class="card-my" style="background-image: url('../../dist/assets/img/arhive.jfif'); ">
                                    <div class="card-body-my text-center" style="">
                                        <h4>Фотоархивы</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="" style="width: 18rem; margin-left: 20px;">
                            <a href="{{ route('admin.showpiece.create') }}" style="text-decoration: none;">
                                <div class="card-my" style="background-image: url('../../dist/assets/img/school.jpg'); ">
                                    <div class="card-body-my text-center" style="">
                                        <h4>История школы</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="" style="width: 18rem; margin-left: 20px;">
                            <a href="{{ route('admin.showpiece.create') }}" style="text-decoration: none;">
                                <div class="card-my" style="background-image: url('../../dist/assets/img/priroda.jfif'); ">
                                    <div class="card-body-my text-center" style="">
                                        <h4>Природа</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        </div>

                    <hr>

                    <div class="container-fluid" style="margin-top: 50px">
                        <div class="row justify-content-center">
                            @foreach($showpieces as $showpiece)
                                <div class="card" style="background-image: url('../../dist/assets/img/stolb.jfif'); background-size: cover; background-position: center; color: white; border: none; display: flex; flex-direction: column; margin: 10px; max-height: 500px;" data-id="{{ $showpiece->id }}" class="showpiece-card">
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
                                    </div>
                                </div>
                            @endforeach
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

    <footer class="app-footer">
        <!-- Footer content here -->
    </footer>
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
    // для карусели 
    document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.showpiece-card').forEach(function(card) {
        card.addEventListener('click', function() {
            const showpieceId = this.getAttribute('data-id');

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
                        <h6>Фотографии:</h6>
                        <div id="carousel-modal-${data.id}" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                                ${data.photos.map((photo, index) => `
                                    <div class="carousel-item ${index === 0 ? 'active' : ''}">
                                        <img src="${photo.url}" class="d-block w-100" alt="Фото экспоната" style="height: auto; object-fit: cover;">
                                    </div>
                                `).join('')}
                            </div>
                            <a class="carousel-control-prev" href="#carousel-modal-${data.id}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-modal-${data.id}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    `;
                    $('#showpieceModal').modal('show'); // Показываем модальное окно
                })
                .catch(error => console.error('Ошибка:', error));
        });
    });
});

</script>
@endsection