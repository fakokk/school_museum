@extends('layouts.app')

@section('content')
<div>
    @include('layouts.header')
</div>

<main class="app-main">
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

    <!-- Секция с основной информацией о музее -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="text-center mb-5 fw-bold">Историко-краеведческий музей имени Тимофеева Ю.П.</h2>
                    
                    <div class="museum-info mb-5">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body">
                                        <h3 class="card-title">Основные сведения</h3>
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><strong>Адрес:</strong> Забайкальский край, Кыринский район, с. Верхний Ульхун, ул. Школьная 1</li>
                                            <li class="mb-2"><strong>Год основания:</strong> 1962</li>
                                            <li class="mb-2"><strong>Площадь:</strong> 84 кв.м (два помещения)</li>
                                            <li class="mb-2"><strong>Экспонатов:</strong> ~9000 (5500 материальных, 3500 документальных)</li>
                                            <li><strong>Экспозиций:</strong> 10 постоянных</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body">
                                        <h3 class="card-title">Деятельность</h3>
                                        <ul>
                                            <li>Уроки и внеклассные занятия</li>
                                            <li>Поисковая и исследовательская работа</li>
                                            <li>Экскурсии для школ и гостей</li>
                                            <li>Участие в краеведческих конкурсах</li>
                                            <li>Создание документальных фильмов</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Секция с уникальными экспонатами -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Уникальные экспонаты музея</h2>
            
            <div class="row g-4">
                <!-- Экспонат 1 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-img-top" style="height: 250px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('storage/images/exhibit1.jpg') }}" class="img-fluid p-3" style="max-height: 100%; object-fit: contain;" alt="Льячка">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Льячка</h4>
                            <p class="card-text">Каменный ковш для расплавления свинца (XIX век)</p>
                            <a href="{{ route('showpiece', ['id' => 1]) }}" class="btn btn-outline-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
                
                <!-- Экспонат 2 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-img-top" style="height: 250px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('storage/images/exhibit2.jpg') }}" class="img-fluid p-3" style="max-height: 100%; object-fit: contain;" alt="Фисгармония">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Фисгармония</h4>
                            <p class="card-text">Год изготовления 1883 (в процессе реставрации)</p>
                            <a href="{{ route('showpiece', ['id' => 2]) }}" class="btn btn-outline-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
                
                <!-- Экспонат 3 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-img-top" style="height: 250px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('storage/images/exhibit3.jpg') }}" class="img-fluid p-3" style="max-height: 100%; object-fit: contain;" alt="Деревянная цепь">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Деревянная цепь</h4>
                            <p class="card-text">296 звеньев - символ нерушимости границы (2023)</p>
                            <a href="{{ route('showpiece', ['id' => 3]) }}" class="btn btn-outline-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Секция экспозиций -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Постоянные экспозиции</h2>
            
            <div class="row g-4">
                @foreach([
                    'Зал боевой славы',
                    'Тимофеев Юрий Петрович',
                    'История древнего мира',
                    'Казачьему роду нет переводу',
                    'Гражданская война в Забайкалье',
                    'История колхоза "Путь Ильича"',
                    'Казачий быт',
                    'История Верхнеульхунской школы',
                    'Техника и время',
                    'Российско-Монгольская дружба'
                ] as $exposition)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 bg-white shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">{{ $exposition }}</h4>
                            <p class="card-text text-muted">Подробнее о коллекции...</p>
                            <a href="#" class="btn btn-sm btn-outline-secondary">Посмотреть экспонаты</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Секция достижений -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Наши достижения</h2>
            
            <div class="timeline">
                @foreach([
                    '2024' => 'Создание Районного историко-краеведческого объединения',
                    '2023' => 'Деревянная цепь включена в Книгу рекордов Забайкалья',
                    '2022' => '3 место в Региональном этапе конкурса школьных музеев',
                    '2021' => 'Создание цикла фильмов "Ульхунский бессмертный батальон"',
                    '2020' => 'Восстановление имен 200+ фронтовиков'
                ] as $year => $achievement)
                <div class="timeline-item">
                    <div class="timeline-year">{{ $year }}</div>
                    <div class="timeline-content">{{ $achievement }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
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
    /* Стили для карточек экспонатов */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    /* Стили для таймлайна */
    .timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e9ecef;
        transform: translateX(-50%);
    }
    
    .timeline-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
        position: relative;
    }
    
    .timeline-year {
        width: 100px;
        text-align: center;
        font-weight: bold;
        color: #35496a;
    }
    
    .timeline-content {
        width: calc(50% - 60px);
        padding: 15px;
        background: white;
        border-radius: 5px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
    
    .timeline-item:nth-child(odd) .timeline-content {
        margin-left: auto;
    }
    
    .timeline-item:nth-child(even) .timeline-content {
        margin-right: auto;
        text-align: right;
    }
    
    /* Адаптивные стили */
    @media (max-width: 768px) {
        .timeline::before {
            left: 30px;
        }
        
        .timeline-item {
            flex-direction: column;
        }
        
        .timeline-year, 
        .timeline-content {
            width: auto;
            text-align: left !important;
        }
        
        .timeline-year {
            margin-bottom: 10px;
            font-size: 1.2rem;
        }
        
        .timeline-content {
            margin-left: 60px !important;
        }
    }
</style>
<!-- Подключение иконок Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Pacifico&family=WDXL+Lubrifont+TC&display=swap" rel="stylesheet">

@endsection