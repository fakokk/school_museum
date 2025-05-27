@extends('layouts.app')
@section('content')
<!-- экспонаты, отображаемые на самом сайте -->

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
                    <!-- Main content here -->

                    <div style="margin-top: 30px">
                        <h1>Экспонаты виртуального музея</h1>
                    </div>
                    <div>
                        <h4 style="margin-top: 30px">
                            В виртуальном музее представлены экспонаты, экспозиции и фотоархивы, собранные музеем МБОУ "Верхне-Ульхунская СОШ".
                        </h4>
                        <h4 style="margin-top: 30px">
                            На площади 84 кв.м в двух помещениях находится около 9 тысяч экспонатов, из которых материальных – 5500, документальных – 3500. Имеется 10 постоянных экспозиций, повествующих об истории пограничного казачества, гражданской войны в Забайкалье, об истории колхоза «Путь Ильича», русско-монгольской дружбы и многом другом. 
                        </h4>
                        
                    </div>
                    <div class="container-fluid" style="margin-top: 50px">
                        <div class="row justify-content-center">

                        @foreach($showpieces as $showpiece)
                            <div class="card" style="max-width: 40rem; margin-left: 20px; ">
                                <div class="card-body">
                                    <h5 class="card-title">{{$showpiece->title}}</h5>
                                </div>

                                <div class="card-body">
                                    <h5>Фотографии ({{ $showpiece->photos->count() }}) :</h5>
                                    <div id="carousel-{{ $showpiece->id }}" class="carousel slide" data-ride="carousel" data-interval="false">
                                        <div class="carousel-inner">
                                            @foreach($showpiece->photos as $index => $photo)
                                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                    <div class="photo-container">
                                                        <img src="{{ Storage::url($photo->url) }}" class="d-block img-thumbnail photo" alt="Фото экспоната">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <p class="card-text">{{$showpiece->category ? $showpiece->category->title : 'Без категории'}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <div class="post-actions" style="margin-bottom: 20px;">
                                        @if($showpiece->tags->count() > 0)
                                            <div class="post-tags">
                                                @foreach($showpiece->tags as $tag)
                                                    <span class="tag">{{ $tag->title }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </ul>
                            </div>


                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="app-footer">
        <!-- Footer content here -->
    </footer>
</div>

<style>
    
        header{
            position: fixed;
        }
        .post-actions {
            display: flex; /* Используем Flexbox для выравнивания элементов в строку */
            align-items: center; /*Центрируем элементы по вертикали */
            justify-content: space-between; /* Распределяем пространство между элементами */
            margin-top: 10px; /* Отступ сверху */
        }

        .action-item {
            margin-right: 15px; /* Отступ между элементами */
        }

        .action-icon {
            width: 20px; /* Ширина иконки */
            height: 20px; /* Высота иконки */
            margin-right: 5px; /* Отступ между иконкой и текстом */
        }
        .icon-large {
            font-size: 30px; /* Set the desired icon size */
            color: rgb(20, 3, 131);
        }


        .custom-button {
            background-color:rgb(54, 112, 55); /* Зеленый цвет фона */
            color: white; /* Цвет текста */
            border: none; /* Убираем границу */
            padding: 8px 15px; /* Отступы */
            text-align: center; /* Выравнивание текста */
            text-decoration: none; /* Убираем подчеркивание */
            border-radius: 5px; /* Закругленные углы */
            transition: background-color 0.3s; /* Плавный переход */
        }

        .blog-post-description{
            
            font-size: 20px; /* Увеличьте размер шрифта для лучшей читаемости */
        }

        .custom-button:hover {
            background-color: #45a049; /* Темнее при наведении */
        }

        .post-category {
            font-weight: bold; /* Make the category bold */
            margin-right: 10px; /* Space between category and tags */
        }

        .post-tags {
            display: inline-flex; /* Align tags in a row */
            margin-right: 10px; /* Space between tags and other elements */
        }

        .tag {
            background-color: #e0e0e0; /* Light gray background for tags */
            border-radius: 5px; /* Rounded corners */
            padding: 5px 10px; /* Padding for tags */
            margin-right: 5px; /* Space between tags */
        }

        /* стили для фото */
        .card {
            display: inline-block; /* Позволяет карточкам располагаться рядом друг с другом */
            margin: 10px; /* Отступы между карточками */
        }

        .photo-container {
            display: flex;
            justify-content: center; /* Центрируем изображение по горизонтали */
            align-items: center; /* Центрируем изображение по вертикали */
            height: 400px; /* Фиксированная высота для контейнера */
        }

        .photo {
            max-height: 100%; /* Ограничиваем высоту изображения до 100% контейнера */
            max-width: 100%; /* Ограничиваем ширину изображения до 100% контейнера */
            height: auto; /* Автоматическая высота для вертикальных изображений */
            width: auto; /* Автоматическая ширина для горизонтальных изображений */
        }


        .photo.vertical {
            width: auto; /* Фиксированная ширина для вертикальных изображений */
            height: auto; /* Автоматическая высота */
        }

        .photo.horizontal {
            width: auto; /* Автоматическая ширина для горизонтальных изображений */
            height: 400px; /* Фиксированная высота для горизонтальных изображений */
        }

        </style>

<script>
    document.querySelectorAll('.photo').forEach(function(img) {
    img.onload = function() {
        if (img.naturalHeight > img.naturalWidth) {
            img.classList.add('vertical'); // Вертикальное изображение
        } else {
            img.classList.add('horizontal'); // Горизонтальное изображение
        }
    };
});

</script>
@endsection
