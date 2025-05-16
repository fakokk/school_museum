<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        body {
             font-family: "Noto Sans", sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgba(249, 249, 249, 0.42);
        }header {
            background-color: rgb(53, 73, 106);
            color: white;
            padding: 10px 20px;
            display: flex; /* Используем Flexbox */
            align-items: center;
            justify-content: space-between; /* Распределяем элементы */
            height: 90px;
        }.container-fluid {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .navbar-collapse {
            margin-left: auto;
            display: flex;
            align-items: center;
        }


        .logo {
            font-size: 30px;
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
        .container-fluid{
            float: right; /* Прижимает элемент к правому краю родителя */
        }
        .profile-menu {
            cursor: pointer;
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
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<body>
<header>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-0 d-flex align-items-center"> <!-- Добавлено d-flex и justify-content-between -->
            
            <div class="logo">Виртуальный музей МБОУ "Верхне-Ульхунская СОШ"</div>

            <div class="collapse navbar-collapse ms-auto" id="navbar-default"> <!-- Добавлен ms-auto для прижатия к правому краю -->

                <ul class="menu">
                    <li><a href="{{ route('welcome') }}">Главная</a></li>
                    <li><a href="{{ route('excursions') }}">Новости</a></li>
                </ul>

                <form class="mt-3 mt-lg-0 ms-3 d-flex align-items-center">
                    <span class="position-absolute ps-3 search-icon">
                        <i class="fe fe-search"></i>
                    </span>
                    <input type="search" class="form-control ps-6" placeholder="Поиск" />
                </form>

                <div class="ms-auto d-flex align-items-center order-lg-3">
                    <ul class="navbar-nav navbar-right-wrap mx-2 flex-row">
                        <li class="dropdown d-inline-block position-static">
                            <!-- кружочек аватара -->
                            <a class="rounded-circle" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img alt="avatar" src="" class="rounded-circle" />
                                </div>
                            </a>
                            <!-- меню по нажатию на аватар справа - вход, профиль и тд -->
                            <div class="dropdown-menu dropdown-menu-end position-absolute mx-3 my-5">
                                <div class="dropdown-item">
                                    <div class="d-flex">
                                        <div class="avatar avatar-md avatar-indicators avatar-online">
                                            <img alt="avatar" src="" class="rounded-circle" />
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class="mb-1">Имя пользователя</h5>
                                            <p class="mb-0">annette@geeksui.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <ul class="list-unstyled">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('personal')}}">
                                            <i class="fe fe-user me-2"></i>
                                            Профиль
                                        </a>
                                    </li>
                                </ul>
                                <div class="dropdown-divider"></div>
                                <ul class="list-unstyled">
                                    <li>
                                        <a class="dropdown-item" href="../index.html">
                                            <i class="fe fe-power me-2"></i>
                                            Выход
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
