<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      
        body {
             font-family: "Arimo", sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgba(249, 249, 249, 0.42);
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

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet"></head>

<body>

<header>
    <div class="logo">Виртуальный музей МБОУ "Верхне-Ульхунская СОШ"</div>
    <nav>
        <ul class="menu">
            <li><a href="{{ route('welcome') }}">Главная</a></li>
            <li><a href="{{ route('excursions') }}">Новости</a></li>
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