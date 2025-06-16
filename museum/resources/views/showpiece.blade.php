@extends('layouts.app')

@section('content')
@include('layouts.header')

<div class="app-wrapper">
    <main class="app-main">
        <div class="container py-4">
            <!-- Hero-секция -->
            <section class="hero-section mb-2" style="position: relative; overflow: hidden;  margin-top: 40px;">
                <!-- Фоновое изображение -->
                <div class="hero-background" style="
                    position: absolute;
                    top: 0;
                    right: 0;
                    width: 50%;
                    height: 100%;
                    background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1));
                    z-index: -1;
                "></div>
                
                <div class="container">
                    <!-- Общий заголовок -->
                    <h1 class="text-center fw-bold mb-5 text-dark">Экспонаты виртуального музея</h1>
                    
                    <div class="row align-items-center">
                        <!-- Левая часть - описание музея -->
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="pe-lg-4">
                                <h2 class="fw-bold mb-4">О музее</h2>
                                <p class="lead text-muted mb-3">
                                    В виртуальном музее представлены экспонаты, экспозиции и фотоархивы, собранные музеем МБОУ "Верхне-Ульхунская СОШ".
                                </p>
                                <p class="text-muted mb-4">
                                    На площади 84 кв.м в двух помещениях находится около 9 тысяч экспонатов, из которых материальных – 5500, документальных – 3500.
                                </p>

                                <h3 class="h5 fw-bold">История коллекции</h3>
                                <p class="text-muted mb-4">
                                    Часть экспонатов была передана в музей жителями села Верхний Ульхун и посетителями музея. Многие экспонаты имеют свою уникальную 
                                </p>
                                
                            </div>
                        </div>
                        
                        <!-- Правая часть - карусель -->
                        <div class="col-lg-6">
                            <div class="carousel-container" style="
                                height: 400px;
                                border-radius: 10px;
                                overflow: hidden;
                                box-shadow: 0 5px 15px rgba(87, 79, 79, 0.23);
                            ">
                                <div id="photoCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                                    <div class="carousel-inner h-100">
                                        <!-- ФОТОГРАФИИ КАРУСЕЛИ -->
                                        <div class="carousel-item active h-100">
                                            <img src="{{ asset('storage/images/zal1.jpg') }}" 
                                                class="d-block w-100 h-100 object-fit-cover" 
                                                alt="Экспонаты музея">
                                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                                                <h5>Каменный век</h5>
                                                <p>Артефакты древних эпох</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item h-100">
                                            <img src="{{ asset('storage/images/zal2.jpg') }}" 
                                                class="d-block w-100 h-100 object-fit-cover" 
                                                alt="Экспозиция музея">
                                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                                                <h5>Культура плиточных могил</h5>
                                                <p>Уникальные находки</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item h-100">
                                            <img src="{{ asset('storage/images/zal3.jpg') }}" 
                                                class="d-block w-100 h-100 object-fit-cover" 
                                                alt="Музейные залы">
                                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                                                <h5>Документальный архив</h5>
                                                <p>Исторические свидетельства</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item h-100">
                                            <img src="{{ asset('storage/images/zal4.jpg') }}" 
                                                class="d-block w-100 h-100 object-fit-cover" 
                                                alt="Музейные залы">
                                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                                                <h5>Документальный архив</h5>
                                                <p>Исторические свидетельства</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item h-100">
                                            <img src="{{ asset('storage/images/zal5.jfif') }}" 
                                                class="d-block w-100 h-100 object-fit-cover" 
                                                alt="Музейные залы">
                                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                                                <h5>Документальный архив</h5>
                                                <p>Исторические свидетельства</p>
                                            </div>
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
                            
                            <!-- Описание карусели -->
                            <div class="mt-3 text-center text-muted small">
                                <p>Листайте галерею, чтобы увидеть больше экспонатов</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <!-- Коллекции -->
            <section class="collections-section mb-5">
                <div class="text-center mb-2">
                    <h2 class="section-title">Коллекции экспонатов</h2>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <form method="GET" action="{{ route('showpiece') }}" class="row g-3 align-items-end">
                            <!-- Поиск по названию -->
                            <div class="col-md-3">
                                <label for="search" class="form-label small text-muted">Название экспоната</label>
                                <input type="text" name="search" id="search" class="form-control form-control-sm" 
                                    placeholder="Введите название..." value="{{ request('search') }}">
                            </div>
                            
                            <!-- Фильтр по категориям -->
                            <div class="col-md-3">
                                <label for="category" class="form-label small text-muted">Категория</label>
                                <select name="category" id="category" class="form-select form-select-sm">
                                    <option value="">Все категории</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            
                            
                            <!-- Фильтр по тегам (с возможностью множественного выбора) -->
                            <div class="col-md-3">
                                <label for="tags" class="form-label small text-muted">Теги</label>
                                <select name="tags[]" class="form-control">
                                    <option value="">Выберите тег</option>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ request('tag') == $tag->id ? 'selected' : '' }}>{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                                
                            </div>

                            <!-- После формы поиска, перед списком экспонатов -->

                            <div class="col-md-3 d-flex">
                                <button type="submit" class="btn btn-sm me-2 custom-filter-btn">
                                    <i class="fas fa-filter"></i> Применить
                                </button>
                                <a href="{{ route('showpiece') }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-times"></i> Сбросить
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- вывод плашки -->
                @if(request()->has('category') && !empty(request('category')))
                    @php
                        $selectedCategory = $categories->firstWhere('id', request('category'));
                    @endphp
                    <div class="alert alert-info mb-4">
                        Экспонаты с категорией: "<strong>{{ $selectedCategory->title ?? 'Неизвестная категория' }}</strong>"
                    </div>
                @elseif(request()->has('tags') && !empty(request('tags')))
                    @php
                        // Получаем ID тега из запроса (может быть массивом, если multiple select)
                        $tagIds = is_array(request('tags')) ? request('tags') : [request('tags')];
                        $filteredTags = App\Models\Tag::whereIn('id', $tagIds)->get();
                    @endphp
                    
                    <div class="alert alert-info mb-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-tag me-2"></i>
                            <div>
                                @if($filteredTags->count() > 1)
                                    <span>Экспонаты с тегами:</span>
                                @else
                                    <span>Экспонаты с тегом:</span>
                                @endif
                                
                                @foreach($filteredTags as $tag)
                                    <span class="badge bg-primary ms-2">
                                        {{ $tag->title }}
                                    </span>
                                @endforeach
                                
                                <a href="{{ route('showpiece') }}" class="btn btn-sm btn-outline-danger ms-3">
                                    <i class="fas fa-times"></i> Сбросить
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                

                <div class="row g-4">
                    @foreach($showpieces as $showpiece)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        
                        <a href="javascript:void(0)" class="text-decoration-none" onclick="showShowpieceModal(event, {{ $showpiece->id }})">
                            <div class="card h-100 border-0 shadow-sm hover-lift" style="cursor: pointer;">
                                <div class="showpiece-carousel">
                                @if(count($showpiece->photos) > 0)
                                <div id="carousel-{{ $showpiece->id }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($showpiece->photos as $index => $photo)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <div class="card-img-container">
                                                <img src="{{ Storage::url($photo->url) }}" 
                                                     class="d-block w-100" 
                                                     alt="{{ $showpiece->title }}">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @if(count($showpiece->photos) > 1)
                                    <button class="carousel-control-prev" type="button" 
                                            data-bs-target="#carousel-{{ $showpiece->id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" 
                                            data-bs-target="#carousel-{{ $showpiece->id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </button>
                                    @endif
                                </div>
                                @else
                                <div class="placeholder-img d-flex align-items-center justify-content-center">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                                @endif
                            </div>
                                <div class="card-body text-center pt-3">
                                    <h5 class="card-title mb-0 text-dark">{{ $showpiece->title }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <!-- пагинация -->
                <div class="mt-5">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center custom-pagination">
                            {{-- Previous Page Link --}}
                            @if ($showpieces->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $showpieces->previousPageUrl() }}" aria-label="Previous">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($showpieces->getUrlRange(1, $showpieces->lastPage()) as $page => $url)
                                @if ($page == $showpieces->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($showpieces->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $showpieces->nextPageUrl() }}" aria-label="Next">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </section>

        </div>
    </main>
    <!-- Модальное окно для детальной информации -->
    <div class="modal fade" id="showpieceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showpieceModalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Галерея изображений -->
                        <div class="col-md-6">
                            <div id="modalCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" id="modalCarouselInner">
                                    <!-- Изображения будут добавлены через JS -->
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#modalCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#modalCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Информация об экспонате -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h6>Категория:</h6>
                                <p id="modalCategory"></p>
                            </div>
                            
                            <div class="mb-3">
                                <h6>Теги:</h6>
                                <div id="modalTags"></div>
                            </div>
                            
                            <div class="mb-3">
                                <h6>Описание:</h6>
                                <p id="modalDescription"></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Основные стили */
    body {
        background-color: #f8f9fa;
        color: #495057;
    }
    
    /* Стили для разноцветных полосочек под заголовками */
    .section-title {
        position: relative;
        display: inline-block;
        padding-bottom: 12px;
        margin-bottom: 1.5rem;
        font-weight: 600;
        color: #212529;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #6c757d, #adb5bd, #dee2e6);
        border-radius: 3px;
    }
    
    /* Карточки */
    .card {
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        overflow: hidden;
    }
    
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1) !important;
    }
    
    /* Контейнеры для изображений */
    .card-img-container {
        width: 100%;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background-color: #f8f9fa;
    }
    
    .card-img-container img {
        object-fit: contain;
        max-height: 100%;
        max-width: 100%;
        width: auto;
        height: auto;
    }
    
    .placeholder-img {
        width: 100%;
        height: 200px;
        background-color: #f8f9fa;
    }
    
    /* Карусель */
    /* Убираем стандартную анимацию Bootstrap */
    /* Отключаем все переходы и анимации */
    .carousel-inner {
    transition: none !important;
    }

    .carousel-item {
    transition: none !important;
    display: none;
    }

    .carousel-item.active {
    display: block;
    }
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 50%;
        width: 30px;
        height: 30px;
        background-size: 50%;
    }
    
    /* Кнопки */
    .btn-outline-dark {
        border-color: #6c757d;
        color: #6c757d;
        transition: all 0.3s ease;
    }
    
    .btn-outline-dark:hover {
        background-color: #6c757d;
        color: white;
    }
    
    /* Адаптивные стили */
    @media (max-width: 767.98px) {
        .hero-section .col-lg-8 {
            text-align: center;
        }
        
        .section-title:after {
            width: 60px;
        }
    }
    /* Стили для модального окна */
    #showpieceModal .modal-body {
        max-height: 70vh;
        overflow-y: auto;
    }
    
    #showpieceModal .carousel-item img {
        max-height: 400px;
        object-fit: contain;
        width: 100%;
    }
    
    #modalTags .badge {
        font-size: 0.85rem;
    }
    /* Кастомная кнопка фильтра */
    .custom-filter-btn {
        background-color: rgb(53, 73, 106);
        color: white;
        border: none;
        border-radius: 4px;
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        line-height: 1.5;
        transition: all 0.2s ease-in-out;
    }
    
    .custom-filter-btn:hover {
        background-color: rgb(219, 219, 219);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(247, 247, 247, 0.52);
    }
    
    .custom-filter-btn:active {
        background-color: rgb(30, 42, 60);
        transform: translateY(1px);
    }
    
    .custom-filter-btn i {
        margin-right: 5px;
    }

    /* пагинация */

    /* Кастомный дизайн пагинации */
    .custom-pagination {
        --pagination-color: rgb(57, 79, 116);
        --pagination-hover: rgba(9, 18, 33, 0.8);
    }
    
    .custom-pagination .page-item {
        margin: 0 3px;
    }
    
    .custom-pagination .page-link {
        color: var(--pagination-color);
        border: 2px solid var(--pagination-color);
        border-radius: 50% !important;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        transition: all 0.3s ease;
        background: white;
    }
    
    .custom-pagination .page-link:hover {
        background-color: var(--pagination-color);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(12, 40, 85, 0.14);
    }
    
    .custom-pagination .page-item.active .page-link {
        background-color: var(--pagination-color);
        border-color: var(--pagination-color);
        color: white;
        transform: scale(1.1);
    }
    
    .custom-pagination .page-item.disabled .page-link {
        opacity: 0.5;
        pointer-events: none;
    }
    
    /* Эффект волны при нажатии */
    .custom-pagination .page-link:active {
        animation: ripple 0.6s linear;
    }
    
    @keyframes ripple {
        0% {
            box-shadow: 0 0 0 0 rgba(0, 4, 11, 0.3);
        }
        100% {
            box-shadow: 0 0 0 15px rgba(53, 73, 106, 0);
        }
    }
    /* Дополнительные стили */
    .object-fit-cover {
        object-fit: cover;
    }
    
    .hero-section {
        background-color: #f8f9fa;
        padding: 3rem 0;
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        padding: 1.5rem;
        background-size: 50% 50%;
    }
    
    @media (max-width: 992px) {
        .hero-background {
            display: none;
        }
        .carousel-container {
            height: 300px !important;
        }
    }
</style>
<style>
    /* Кастомные стили для Select2 */
    .select2-container--default .select2-selection--multiple {
        border: 1px solid #ced4da;
        min-height: 38px;
    }
    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
  // Инициализация всех каруселей на странице
  var carousels = document.querySelectorAll('.carousel');
  
  carousels.forEach(function(carousel) {
    // Создаем карусель без анимаций
    new bootstrap.Carousel(carousel, {
      interval: 5000, // Отключаем авто-переключение
      wrap: true,
      touch: false // Отключаем свайп на мобильных
    });
    
    // Отключаем CSS-переходы после инициализации
    var inner = carousel.querySelector('.carousel-inner');
    inner.style.transition = 'none';
    
    var items = carousel.querySelectorAll('.carousel-item');
    items.forEach(function(item) {
      item.style.transition = 'none';
    });
  });
});
</script>
<!-- модальное окно для просомтра экспоната -->
<script>
function showShowpieceModal(event, showpieceId) {
    // Предотвращаем стандартное поведение ссылки
    event.preventDefault();
    
    // Получаем данные экспоната через AJAX
    fetch(`/showpiece/${showpieceId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Заполняем модальное окно данными
            // Функция для удаления HTML-тегов
            const stripHtml = html => {
                const tmp = document.createElement('div');
                tmp.innerHTML = html;
                return tmp.textContent || tmp.innerText || '';
            };
            document.getElementById('showpieceModalTitle').textContent = data.title;
            document.getElementById('modalCategory').textContent = data.category?.title || 'Не указана';
            const descriptionText = data.content ? stripHtml(data.content) : 'Описание отсутствует';
            document.getElementById('modalDescription').textContent = descriptionText;
            // document.getElementById('modalDescription').textContent = data.content || 'Описание отсутствует'я
            
            // Очищаем теги
            const tagsContainer = document.getElementById('modalTags');
            tagsContainer.innerHTML = '';
            
            // Добавляем теги
            if (data.tags && data.tags.length > 0) {
                data.tags.forEach(tag => {
                    const badge = document.createElement('span');
                    badge.className = 'badge bg-primary me-1 mb-1';
                    badge.textContent = tag.title;
                    tagsContainer.appendChild(badge);
                });
            } else {
                tagsContainer.textContent = 'Теги отсутствуют';
            }
            
            // Очищаем карусель
            const carouselInner = document.getElementById('modalCarouselInner');
            carouselInner.innerHTML = '';
            
            // Добавляем изображения в карусель
            if (data.photos && data.photos.length > 0) {
                data.photos.forEach((photo, index) => {
                    const item = document.createElement('div');
                    item.className = `carousel-item ${index === 0 ? 'active' : ''}`;
                    
                    const img = document.createElement('img');
                    img.src = photo.url;
                    img.className = 'd-block w-100';
                    img.alt = data.title;
                    
                    item.appendChild(img);
                    carouselInner.appendChild(item);
                });
            } else {
                const placeholder = document.createElement('div');
                placeholder.className = 'carousel-item active';
                placeholder.innerHTML = `
                    <div class="d-flex align-items-center justify-content-center" style="height: 300px;">
                        <i class="fas fa-image fa-5x text-muted"></i>
                    </div>
                `;
                carouselInner.appendChild(placeholder);
            }
            
            // Показываем модальное окно
            const modal = new bootstrap.Modal(document.getElementById('showpieceModal'));
            modal.show();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Произошла ошибка при загрузке данных');
        });
}
</script>
<!-- боольшая карусель -->
<script>
    /* Дополнительные стили для карусели */
    .carousel-image {
        max-height: 350px; /* Фиксированная высота изображений */
        object-fit: cover; /* Заполнение пространства с сохранением пропорций */
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        padding: 20px;
        background-size: 50% 50%;
    }
    
    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
    }
    
    .carousel-indicators [data-bs-target] {
        background-color: #000;
    }
</script>

@endsection