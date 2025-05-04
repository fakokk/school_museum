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
            width: 100%; /*Шапка займёт всю ширину окна браузера */
            z-index: 1000; /* Высокое значение, чтобы шапка была всегда на первом плане */
            margin: 0;
            padding: 0;
        }
        header {
            background-color:rgb(21, 42, 78);
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
            position: relative;
            color: white;
        }
        .menu li a{
            color: rgb(220, 220, 220);
            font-family: 'Inter', sans-serif;
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
            background-color:rgb(178, 178, 178);
        }
        .dropdown a:hover {
            background-color:rgb(139, 139, 139);
        }
        .profile-menu:hover .dropdown {
            display: block;
        }
        p{
            font-size: 20px;
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
    <h1>Добро пожаловать на Главную страницу сайта!</h1>
    <p>Историко-краеведческая группа "Караульская тропа" Кыринского района сегодня 29 октября 2024 года приняла решение продолжить свою деятельность. В ближайшее время выйдут фильмы, где мы расскажем нашим зрителям о Куранже, Усть-Иле, Могойтуе (Акшинский район) Старом и Новом Дурулгуе, Кубухае и Нижнем Цасучее. Премного были бы благодарны критике нашей деятельности, как отрицательной, так и положительной, да и... нейтральной. Спасибо.</p>
    <img src="{{ asset('https://vki4.okcdn.ru/i?r=B1JAm_VFBkioSGBqh1KrmLm0WVhGab5ldvCi_aw1Lk6xODbOTOklIyfWwpxlmpJ_QVyK3tOm3g9EWO2GNo6KU0zq4OPEFvlLyTWZw4S_AN44YI8AAAAp&dpr=2') }}" 
        alt="Тимофеев Юрий Петрович" style="max-width: 50%; height: auto;">
</main>

</body>
</html>
