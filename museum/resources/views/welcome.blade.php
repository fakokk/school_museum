@extends('layouts.app')
@section('content')
<div>
    @include('layouts.header')
</div>

<main class="app-main">
    <!-- Герой-секция с фоновым изображением -->
    <section class="hero-section position-relative" id="section_1" 
             style="background: url('{{ asset('storage/images/timofeev.webp') }}') no-repeat center center; background-size: cover; min-height: 100vh;">
        
        <!-- Затемнение фона -->
        <div class="section-overlay position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.02);"></div>
        
        <!-- Иконки соцсетей в левом верхнем углу -->
        <div class="social-icons position-absolute z-3" style="top: 100px; left: 20px;">
            <div>
                <a href="https://ok.ru/group/59325617078468" target="_blank" rel="noopener noreferrer">
                <img alt="Одноклассники" 
                    src="{{ asset('storage/images/tg.webp') }}" 
                    class="rounded-circle" 
                    style="width: 50px; height: 50px; object-fit: cover; cursor: pointer;"
                    title="Мы в Телеграм">
                </a>
            </div>

            <div style="margin-top: 14px;">
                <a href="https://ok.ru/group/59325617078468" target="_blank" rel="noopener noreferrer">
                    <img alt="Одноклассники" 
                        src="{{ asset('storage/images/ok.png') }}" 
                        class="rounded-circle" 
                        style="width: 50px; height: 50px; object-fit: cover; cursor: pointer;"
                        title="Мы в Одноклассниках">
                </a>
            </div>
        </div>

        <!-- Эпиграф в левой части -->
        <div class="container position-relative h-100">
            <div class="row align-items-end h-100" style="padding-bottom: 100px;">
                <div class="col-lg-5 col-md-7 col-10">
                    <div class="epigraph-block bg-dark bg-opacity-50 p-3 p-md-4 rounded text-white">
                        <h3 class="mytext mb-2 mb-md-3">Я б основателей музеев</h3>
                        <h3 class="mytext mb-2 mb-md-3">Поставил в бронзе всех разделов,</h3>
                        <h3 class="mytext mb-2 mb-md-3">За кропотливый, нужный труд</h3>
                        <h3 class="mytext">За всё, рассказанное тут …</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Декоративная волна -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute bottom-0 w-100">
            <path fill="#ffffff" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
        </svg>
    </section>

    <!-- Карусель -->
    <div class="container py-5">
        <!-- Ваша существующая карусель -->
    </div>

    <!-- Основной контент -->
    <div>
        <div>
            <div>
                <p class="lead">Музей был образован в 1962 году и является старейшим музеем на территории Забайкальского края. На площади 84 кв. м в двух помещениях находится около 9 тысяч экспонатов, из которых материальных – 5500, документальных – 3500. Имеется 10 постоянных экспозиций, повествующих об истории пограничного казачества, гражданской войны в Забайкалье, об истории колхоза «Путь Ильича», русско-монгольской дружбы и многом другом.</p>
                <p>В музее регулярно проводятся встречи и экскурсии. Школьники, обучающиеся в МБОУ «Верхне-Ульхунская СОШ», принимают участие в научно-практических конференциях и конкурсах районного, краевого и всероссийского масштаба.</p>
            </div>
        </div>
    </div>
</main>

<style>
    /* Основные стили */
    .app-main {
        overflow-x: hidden;
    }

    .hero-section {
        padding: 0;
        color: white;
    }

    .epigraph-block {
        max-width: 400px;
        width: 100%;
        box-sizing: border-box;
        backdrop-filter: blur(5px);
        border-left: 3px solid var(--primary-color);
        transition: all 0.3s ease;
    }

    .epigraph-block:hover {
        background-color: rgba(0,0,0,0.7) !important;
    }

    /* Стили для иконок */
    .social-icons a {
        transition: all 0.3s ease;
        opacity: 0.8;
    }

    .social-icons a:hover {
        opacity: 1;
        transform: scale(1.1);
        color: var(--primary-color) !important;
    }

    /* Дополнительные стили для текста */
    .lead {
        font-size: 1.1rem;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }

    /* Адаптивные стили */
    @media (max-width: 992px) {
        .hero-section {
            min-height: 80vh;
        }
        
        .social-icons {
            top: 100px !important;
            left: 15px !important;
        }
        
        .social-icons img {
            width: 40px !important;
            height: 40px !important;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            min-height: 70vh;
        }
        
        .epigraph-block {
            max-width: 350px !important;
            padding: 1rem !important;
        }
        .social-icons {
            top: 100px !important; /* Увеличено */
        }
        
        .row.align-items-end {
            padding-bottom: 80px !important;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            min-height: 60vh;
        }
        
        .social-icons {
            top: 100px !important; /* Увеличено с 70px до 160px */
        }
        
        .social-icons img {
            width: 35px !important;
            height: 35px !important;
        }
        
        .epigraph-block {
            max-width: 300px !important;
            padding: 0.8rem !important;
        }
        
        .row.align-items-end {
            padding-bottom: 60px !important;
        }
    }
        /* Дополнительно для очень маленьких экранов */
    @media (max-width: 400px) {
        .social-icons {
            top: 100px !important; /* Еще больше для совсем маленьких экранов */
        }
    }

    .mytext {
        font-family: "Great Vibes";
        font-size: 33px;
        font-style: normal;
        }

</style>

<!-- Подключение иконок Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Pacifico&family=WDXL+Lubrifont+TC&display=swap" rel="stylesheet">

@endsection