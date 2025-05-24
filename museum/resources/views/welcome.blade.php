@extends('layouts.app')
@section('content')
<div>
    @include('layouts.header') <!-- Include the header template -->
</div>


<div class="app-wrapper">
        @include('layouts.sidebar') <!-- Include the sidebar template -->

        <!--begin::App Main-->
        <main class="app-main ">

            <div style="text-align: center;">
                <p><span style="font-size:40px"><strong>Историко-краеведческий музей имени Тимофеева Ю.П</strong></span></p>
                <p><span style="font-size:40px"><strong>МБОУ Верхне-Ульхунская СОШ</strong></span></p>
                <p><span style="font-size:40px"><strong>Добро пожаловать!</strong></span></p>
            </div>

            <hr style="border: 1px solid #000; margin: 20px 0;">
            <div class="container ">
                <div class="left-column">
                    <img alt="avatar" src="{{ asset('storage/images/uptimofeev.jpg') }}" style="width: 100%; height: auto;" />
                </div>
                <div class="right-column">
                    <span style="font-size:25px;">
                        Наш музей основал незаурядный человек, педагог с большой Буквы Тимофеев Юрий Петрович. Родился он в 1930 году в семье учителей.
Окончил неполную среднюю школу после Великой Отечественной войны, работал несколько лет и был призван на военную службу на Тихоокеанский флот. После службы принял решение – буду учителем. В 25 лет он пришел учиться в Дульдургинскую среднюю школу, за год экстерном окончил её и поступил в Читинский Государственный педагогический институт на историко-филологический факультет.

                    </span>
                </div>
            </div>
        
            <hr style="border: 1px solid #000; margin: 20px 0;">
<!-- 
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active carousel-item-start">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect></svg>

                        <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Пример заголовка.</h1>
                            <p>Некоторое репрезентативное содержимое-заполнитель для первого слайда карусели.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                        </div>
                        </div>
                    </div>
                    <div class="carousel-item carousel-item-next carousel-item-start">
                        <img src="https://avatars.mds.yandex.net/i?id=c3e69a63d17f6e44a185db07849daf2f351650d0-12647654-images-thumbs&n=13" class="d-block w-100" alt="Второй слайд">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect></svg>

                        <div class="container">
                        <div class="carousel-caption">
                            <h1>Другой пример заголовка.</h1>
                            <p>Некоторое репрезентативное содержимое-заполнитель для второго слайда карусели.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                        </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect></svg>

                        <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>Еще один для хорошей меры.</h1>
                            <p>Некоторые репрезентативные материалы-заполнители для третьего слайда этой карусели.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                        </div>
                    </div>
                </div> -->
<!-- 
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div> -->

            <hr style="border: 1px solid #000; margin: 20px 0;">
            <div style="margin-left: 20px;">
                <h3>Справочная информация:</h3>
                    <ul>
                        <li><span style="font-size:25px;">Юридический адрес: Забайкальский край, Кыринский район, с. Верхний Ульхун, ул. Школьная 1, МБОУ «Верхне-Ульхунская СОШ».</span></li>
                        <li><span style="font-size:25px;">Год образования: 1962 (старейший школьный музей на территории Забайкальского края).</span></li>
                        <li><span style="font-size:25px;">Номер в реестре школьных музеев Российской Федерации: 5286</span></li>
                        <li><span style="font-size:25px;">Площадь: 84 кв.м.: два помещения 48 и 36 кв.м.</span></li>
                        <li><span style="font-size:25px;">Координирующий орган: Совет музея – 6 человек.</span></li>
                        <li><span style="font-size:25px;">Количество экспонатов: около 9000 (материальных – 5500, документальных – 3500).</span></li>
                        <li><span style="font-size:25px;">Количество постоянных экспозиций: 10</span></li>
                    </ul>

            </div>
            
        </main>

        <footer class="app-footer">
        </footer>
    </div>

    <style>
        
 .page-wrapper {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .app-wrapper {
        display: flex;
        flex-grow: 1;
    }

    .sidebar_menu {
        width: 250px;
        height: calc(100vh - 90px); /* Вычитаем высоту header */
        position: fixed;
        left: 0;
        top: 90px; /* Высота header */
        background-color: #f8f9fa;
        overflow-y: auto;
        z-index: 1000; /* Убедимся, что sidebar над другими элементами */
    }

    .app-main {
        margin-left: 250px;
        padding: 20px;
        flex-grow: 1;
        width: calc(100% - 250px); /* Учитываем ширину sidebar */
    }
    
        .container {
        display: flex; /* Используем Flexbox для создания двух столбцов */
        align-items: flex-start; /* Выравнивание по верхнему краю */
        margin: 20px; /* Отступы вокруг контейнера */
    }

    .left-column {
        flex: 2; /* Занимает 1 часть доступного пространства */
        padding-right: 20px; /* Отступ справа для разделения */
    }

    .right-column {
        flex: 2; /* Занимает 2 части доступного пространства */
    }

    li {    
        margin: 10px 0; /* Отступы между элементами списка */
    }
    

    </style>

    <script>
        
    </script>
    @endsection
