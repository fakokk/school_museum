@extends('layouts.app')
@section('content')
<div>
    @include('layouts.header') <!-- Include the sidebar template -->
</div>
<div class="app-wrapper">
    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">
        <!-- Header content here -->
    </nav>

    <!--begin::App Main-->
    <main class="app-main">
        <h1 class="text">Новости</h1> <!-- Заголовок по центру -->

        <section class="featured-posts-section d-flex flex-column align-items-center"> <!-- Центрируем ленту постов -->

            @foreach($posts as $post)
            <div style="max-width: 60%;"> 
                <div class="featured-post blog-post" data-aos="fade-up" style="margin-bottom: 20px; width: 100%; max-width: 90%;"> 
                    <a href="" style="text-decoration: none; color: inherit; max-width: 90%"> <!-- Ссылка на полный просмотр поста -->
                        <h2 class="blog-post-title">{{ $post->title }}</h2> <!-- Заголовок поста -->
                        <p class="post-date">{{ $post->created_at->format('d.m.Y') }}</p> <!-- Дата публикации -->
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ asset('storage/' . $post->preview_image) }}" alt="Изображение поста" class="img-fluid" style="width: 100%; height: auto;"> <!-- Изображение поста -->
                        </div>
                        <p class="blog-post-description">
                            {{ Str::limit(strip_tags($post->content), 150, '...') }} <!-- Ограничиваем количество символов и убираем HTML-теги -->
                        </p>
                        <div class="post-actions">
                            <div class="action-item">
                                <img src="path/to/like-icon.png" alt="Лайк" class="action-icon"> <!-- Иконка лайка -->
                                <span class="action-count">12</span> <!-- Количество лайков -->
                            </div>
                            <div class="action-item">
                                <img src="path/to/comment-icon.png" alt="Комментарии" class="action-icon"> <!-- Иконка комментариев -->
                                <span class="action-count">5</span> <!-- Количество комментариев -->
                            </div>
                            <a href="" class="custom-button">Подробнее</a> <!-- Кнопка "Подробнее" -->
                        </div>
                    </a>
                <hr> <!-- Разделитель между постами -->
                </div>
            </div>
            @endforeach
        </section>
    </main>

    <footer class="app-footer">
        <!-- Footer content here -->
    </footer>
</div>

<style>
    .custom-button {
        background-color: #4CAF50; /* Зеленый цвет фона */
        color: white; /* Цвет текста */
        border: none; /* Убираем границу */
        padding: 10px 20px; /* Отступы */
        text-align: center; /* Выравнивание текста */
        text-decoration: none; /* Убираем подчеркивание */
        display: inline-block; /* Делаем кнопку блочным элементом */
        font-size: 16px; /* Размер шрифта */
        border-radius: 5px; /* Закругленные углы */
        transition: background-color 0.3s, transform 0.2s; /* Плавный переход */
        cursor: pointer; /* Курсор при наведении */
    }

    .custom-button:hover {
        background-color: #45a049; /* Темнее при наведении */
    }

    .custom-button:active {
        transform: translateY(2px); /* Эффект нажатия */
    }
</style>

<script>
    // Ваши скрипты
</script>
@endsection
