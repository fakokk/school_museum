<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        header {
            position: fixed;
            background-color: rgb(53, 73, 106);
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 90px;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            z-index: 1000;
        }
        .container-fluid {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 70px;
            width: auto;
        }
        .logo a {
            margin-left: 15px;
            font-size: 24px; /* Увеличьте размер шрифта для лучшей читаемости */
        }
        .menu {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .menu li {
            position: relative; /* Для выпадающего меню */
            margin: 0 15px;
            color: white;
        }
        .menu li a {
            color: white;
            text-decoration: none;
            font-size: 24px;
        }
        .dropdown {
            display: none; /* Скрываем выпадающее меню по умолчанию */
            position: absolute;
            background-color: rgb(63, 86, 123);
            top: 100%; /* Позиционируем под родительским элементом */
            left: 0;
            z-index: 1000;
            min-width: 200px; /* Минимальная ширина выпадающего меню */
        }
        .menu li:hover .dropdown {
            display: block; /* Показываем выпадающее меню при наведении */
        }
        .dropdown li {
            padding: 10px;
            list-style: none;
        }
        .dropdown li a {
            color: white;
            text-decoration: none;
            font-size: 20px;
        }
        .search-form {
            display: flex;
            align-items: center;
            margin-left: 15px;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        /* Адаптивные стили */
        @media (max-width: 768px) {
            header {
                flex-direction: column; /* Изменяем направление на вертикальное */
                height: auto; /* Автоматическая высота для адаптивности */
                padding: 10px 5px; /* Уменьшаем отступы */
            }
            .container-fluid {
                flex-direction: column; /* Вертикальное выравнивание элементов */
                align-items: flex-start; /* Выравнивание по левому краю */
            }
            .menu {
                flex-direction: column; /* Вертикальное расположение меню */
                width: 100%; /* Ширина меню на всю ширину */
                margin-top: 10px; /* Отступ сверху для меню */
            }
            .menu li {
                margin: 5px 0; /* Уменьшаем отступы между элементами меню */
            }
            .logo a {
                font-size: 20px; /* Уменьшаем размер шрифта для мобильных устройств */
            }
            .search-form {
                width: 100%; /* Ширина формы поиска на всю ширину */
                margin-top: 10px; /* Отступ сверху для формы поиска */
            }
            .search-form input {
                width: 100%; /* Ширина поля ввода на всю ширину */
            }
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<header class="header">
    <div class="container-fluid">
        <div class="logo">
            <img alt="avatar" src="{{ asset('storage/images/logo.jpg') }}"/>
            <a>Виртуальный музей МБОУ "Верхне-Ульхунская СОШ"</a>
        </div>
        <div class="navbar">
            <ul class="menu">
                <li><a href="{{ route('welcome') }}">Главная</a></li>
                <li><a href="{{ route('excursions') }}">Новости</a></li>
                <li>
                    <a href="#">Музей</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('showpiece') }}">Экспонаты</a></li>
                        <li><a href="#">Экскурсии</a></li>
                        <li><a href="#">Фотоархив</a></li>
                        <li><a href="#">Видеоматериалы</a></li>
                        <li><a href="#">Документы</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Контакты</a>
                    <ul class="dropdown">
                        <li><a href="#">Обратная связь</a></li>
                        <li><a href="#">Социальные сети</a></li>
                    </ul>
                </li>
            </ul>
            <form class="search-form">
                <input type="search" class="form-control" placeholder="Поиск" />
            </form>
            <div class="ms-auto d-flex align-items-center">
                <ul class="navbar-nav navbar-right-wrap mx-2 flex-row">
                    <a class="rounded-circle" href="{{ Auth::check() ? route('personal') : route('login') }}" aria-expanded="false">
                            <div class="avatar avatar-md avatar-indicators avatar-online ml-3">
                                @if(Auth::check())
                                    <img alt="avatar" src="{{ Auth::user()->user_image ? asset('storage/' . Auth::user()->user_image) : asset('storage/images/default-avatar.png') }}" class="rounded-circle" style="width: 50px; height: 50px;"/>
                                @else
                                    <img alt="avatar" src="{{ asset('storage/images/default-avatar.png') }}" class="rounded-circle" style="width: 50px; height: 50px;"/>
                                @endif    
                            </div>
                        </a>
                </ul>
            </div>
        </div>
    </div>
</header>

</body>
</html>
