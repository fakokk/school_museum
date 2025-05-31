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

                <div class="d-flex justify-content-center" style="padding: 20px; text-align: center;">
    <div id="photoCarousel" class="carousel slide" data-bs-ride="carousel" style="width: 100%; max-width: 1500px;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('storage/images/banner1.jfif') }}" class="d-block w-100 carousel-image mx-auto" alt="First slide">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/images/banner2.png') }}" class="d-block w-100 carousel-image mx-auto" alt="Second slide">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/images/banner3.jfif') }}" class="d-block w-100 carousel-image mx-auto" alt="Third slide">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>
</div>

                <hr style="border: 1px solid #000; margin: 20px 0;">


            <hr style="border: 1px solid #000; margin: 20px 0;">
            <!-- <div class="container ">
                <div class="left-column">
                    <img alt="avatar" src="{{ asset('storage/images/uptimofeev.jpg') }}" style="width: 100%; height: auto;" />
                </div>
                <div class="right-column">
                    <span style="font-size:25px;">
                        Наш музей основал незаурядный человек, педагог с большой Буквы Тимофеев Юрий Петрович. Родился он в 1930 году в семье учителей.
Окончил неполную среднюю школу после Великой Отечественной войны, работал несколько лет и был призван на военную службу на Тихоокеанский флот. После службы принял решение – буду учителем. В 25 лет он пришел учиться в Дульдургинскую среднюю школу, за год экстерном окончил её и поступил в Читинский Государственный педагогический институт на историко-филологический факультет.

                    </span>
                </div>
            </div> -->
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
    .carousel-image {
        max-width: 1200px; /* Set the desired height for the carousel images */
        height: auto;
    }

    </style>

    <script>
        
    </script>
    @endsection
