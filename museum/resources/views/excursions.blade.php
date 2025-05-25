@extends('layouts.app')
@section('content')

@include('layouts.header') <!-- Include the sidebar template -->

<div>
    
    @include('layouts.sidebar') <!-- Include the sidebar template -->
</div>
<div class="app-wrapper">
    
    <!--begin::App Main-->
    <main class="app-main">
        <section class="featured-posts-section d-flex flex-column align-items-center"> <!-- Центрируем ленту постов -->

            @foreach($posts as $post)
            <div style="max-width: 60%;"> 
                <div class="featured-post blog-post" data-aos="fade-up" style="margin-bottom: 20px; width: 100%; max-width: 90%;"> 
                       <a href="{{ route('post.show', $post) }}" style="text-decoration: none; color: inherit; max-width: 90%">

                        <h2 class="blog-post-title">{{ $post->title }}</h2> <!-- Заголовок поста -->
                        <p class="post-date">{{ $post->created_at->format('d.m.Y') }}</p> <!-- Дата публикации -->

                        <div class="blog-post-thumbnail-wrapper text-center">
                            <img src="{{ asset('storage/' . $post->preview_image) }}" alt="Изображение поста" class="img-fluid mx-auto" style="width: 90%; height: auto;"> <!-- Изображение поста -->
                        </div>
                        <p class="blog-post-description" style="margin-top: 20px;">
                            {{ Str::limit(strip_tags($post->content), 150, '...') }} <!-- Ограничиваем количество символов и убираем HTML-теги -->
                        </p>


                        <div class="post-actions">
                            <!-- @if($post->category)
                                <span class="post-category">{{ $post->category->title }}</span> <!-- Category Name -->
                            <!-- @endif -->
                            @if($post->tags->count() > 0)
                                <div class="post-tags">
                                    @foreach($post->tags as $tag)
                                        <span class="tag">{{ $tag->title }}</span> <!-- Tag Name -->
                                    @endforeach
                                </div>
                            @endif
                            
                        </div>

                        <p style="margin-top: 20px;">
                            <a href="#" class="link-black text-sm"><i class="fa-regular fa-heart icon-large"></i> Понравилось</a>
                            <!-- <i class="fa-solid fa-heart"></i> -->
                            <a href="#" class="link-black text-sm"><i class="far fa-comments mr-1 icon-large"></i> Комментарии</a>

                            <span class="float-right">
                                <a href="" class="custom-button">Подробнее</a> <!-- Кнопка "Подробнее" -->
                            </span>
                        </p>


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

        </style>

<script>
    // Ваши скрипты
</script>
@endsection
