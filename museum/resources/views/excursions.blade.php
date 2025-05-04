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
            color: white;
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
        }
        .dropdown a:hover {
            background-color: #f1f1f1;
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
            <!-- <li><a href="{{ route('create') }}">Создать материал</a></li> -->
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
    <p>Вывод постов из бд</p>
</main>

</body>
</html>
