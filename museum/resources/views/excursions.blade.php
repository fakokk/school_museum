<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        header {
            background-color: rgb(21, 42, 78);
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 90px;
        }
        .logo {
            font-size: 30px;
        }
        nav {
            position: relative;
        }
        .menu {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .menu li {
            margin: 0 15px;
            color: white;
        }
        .menu li a {
            color: white;
            text-decoration: none;
            font-size: 24px;
        }
        .profile-menu {
            cursor: pointer;
        }
        .dropdown {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            z-index: 1;
            min-width: 150px;
        }
        .dropdown a {
            color: black;
            padding: 10px;
            text-decoration: none;
            display: block;
        }
        .dropdown a:hover {
            background-color: #f1f1f1;
        }
        .profile-menu:hover .dropdown {
            display: block;
        }
        main {
            padding: 20px;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .featured-posts-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .blog-post {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s;
            width: calc(33.333% - 20px);
        }
        .blog-post:hover {
            transform: scale(1.05);
        }
        .thumbnail-wrapper {
            position: relative;
        }
        .thumbnail-wrapper img {
            width: 100%;
            height: auto;
            display: block;
        }
        .blog-post-category {
            background-color: rgb(21, 42, 78);
            color: white;
            padding: 5px;
            position: absolute;
            top: 10px;
            left: 10px;
            border-radius: 5px;
        }
        .blog-post-title {
            font-size: 35px;
            margin: 10px;
            color: rgb(21, 42, 78);
            text-decoration: none;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">Виртуальный музей МБОУ "Верхне-Ульхунская СОШ"</div>
    <nav>
        <ul class="menu">
            <li><a href="{{ route('welcome') }}">Главная</a></li>
            <li><a href="{{ route('excursions') }}">Экскурсии</a></li>
            <li class="profile-menu">
                <a href="#">Профиль</a>
                <div class="dropdown">
                    <a href="{{ route('auth') }}">Профиль</a>
                    <a href="#">Выход</a>
                </div>
            </li>
        </ul>
    </nav>
</header>

<main>
    <h1>Виртуальные экскурсии по залам музея</h1>
    <section class="featured-posts-section">
        @foreach($posts as $post)
        <div class="blog-post" data-aos="fade-up"> 
            <a class="blog-post-title"> 
                {{ $post->title }} 
            </a>

            <div class="thumbnail-wrapper"> 
                <!-- <img src="{{ $post->image_url }}" alt="{{ $post->title }}">  -->
                 <img src="https://vki5.okcdn.ru/i?r=CFtAm_VFBkioSGBqh1IWSogGXWP4QaAtZL9tDSXUYRjNm8vTyRnT8qoBYw-MsvAdMUatGswsbK9rxvYVRPF2k9oz7ZbfBPqcqQMrjAHYo5st89B1tVjuUM_6hXMAAAAp&dpr=2" alt="">

                <p class="blog-post-category">{{ $post->content ? $post->content : 'Без описания' }}</p>

                <p class="blog-post-category">{{ $post->category ? $post->category->title : 'Без категории' }}</p>
            </div>
            
        </div>
        @endforeach
    </section>
</main>

</body>
</html>
