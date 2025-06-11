<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .museum-title::before {
            content: "Виртуальный музей";
        }
        /* Для экранов меньше 400px */
        @media (max-width: 400px) {
            .museum-title::before {
                content: "Музей";
            }
        }

        :root {
            --primary-color: rgb(53, 73, 106);
            --secondary-color: rgb(63, 86, 123);
            --text-color: white;
            --hover-color: rgba(255, 255, 255, 0.1);
            --dropdown-bg: rgba(63, 86, 123, 0.95);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Noto Sans', sans-serif;
        }

        header {
            position: fixed;
            background-color: var(--primary-color);
            color: var(--text-color);
            display: flex;
            align-items: center;
            height: 90px;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px 20px;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .container-fluid {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            position: relative;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            margin-right: 20px;
            max-width: calc(100% - 60px);
        }

        .logo img {
            height: 70px;
            width: auto;
            transition: var(--transition);
        }

        .logo:hover img {
            transform: scale(1.05);
        }

        .logo a {
            margin-left: 15px;
            font-size: 24px;
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            white-space: nowrap;
        }

        .navbar {
            display: flex;
            align-items: center;
            flex-grow: 1;
        }

        .nav-content {
            display: flex;
            align-items: center;
            width: 100%;
            justify-content: space-between;
        }

        .menu {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            align-items: center;
        }

        .menu li {
            position: relative;
            margin: 0 10px;
        }

        .menu > li > a {
            color: var(--text-color);
            text-decoration: none;
            font-size: 18px;
            padding: 10px 15px;
            border-radius: 4px;
            transition: var(--transition);
            display: block;
            font-weight: 500;
        }

        .menu > li > a:hover {
            background-color: var(--hover-color);
        }

        .dropdown {
            display: none;
            position: absolute;
            background-color: var(--dropdown-bg);
            top: 100%;
            left: 0;
            z-index: 1000;
            min-width: 220px;
            border-radius: 0 0 8px 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .menu li:hover .dropdown {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .dropdown li {
            padding: 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .dropdown li:last-child {
            border-bottom: none;
        }

        .dropdown li a {
            color: var(--text-color);
            text-decoration: none;
            font-size: 16px;
            padding: 12px 20px;
            display: block;
            transition: var(--transition);
        }

        .dropdown li a:hover {
            background-color: var(--hover-color);
            padding-left: 25px;
        }

        .search-form {
            display: flex;
            margin-left: auto;
            margin: 0 20px;
        }

        .search-form input {
            padding: 8px 15px;
            border-radius: 20px;
            border: none;
            outline: none;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            transition: var(--transition);
            width: 200px;
        }

        .search-form input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-form input:focus {
            background-color: rgba(255, 255, 255, 0.3);
            width: 250px;
        }

        .user-menu {
            display: flex;
            align-items: center;
        }

        .avatar {
            transition: var(--transition);
        }

        .avatar:hover {
            transform: scale(1.1);
        }

        .avatar img {
            border: 2px solid rgba(255, 255, 255, 0.3);
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }

        /* Гамбургер-меню */
        .hamburger {
            display: none;
            cursor: pointer;
            width: 30px;
            height: 20px;
            position: relative;
            margin-left: auto;
        }

        .hamburger span {
            display: block;
            position: absolute;
            height: 3px;
            width: 100%;
            background: var(--text-color);
            border-radius: 3px;
            opacity: 1;
            left: 0;
            transform: rotate(0deg);
            transition: .25s ease-in-out;
        }

        .hamburger span:nth-child(1) {
            top: 0px;
        }

        .hamburger span:nth-child(2), .hamburger span:nth-child(3) {
            top: 10px;
        }

        .hamburger span:nth-child(4) {
            top: 20px;
        }

        .hamburger.open span:nth-child(1) {
            top: 10px;
            width: 0%;
            left: 50%;
        }

        .hamburger.open span:nth-child(2) {
            transform: rotate(45deg);
        }

        .hamburger.open span:nth-child(3) {
            transform: rotate(-45deg);
        }

        .hamburger.open span:nth-child(4) {
            top: 10px;
            width: 0%;
            left: 50%;
        }

        /* Адаптивные стили */
        @media (max-width: 992px) {
            .logo a {
                font-size: 20px;
            }
            
            .menu > li > a {
                font-size: 16px;
                padding: 8px 12px;
            }
            
            .search-form input {
                width: 150px;
            }
        }

        @media (max-width: 900px) {
            header {
                height: 80px;
                padding: 10px 15px;
            }
            
            .logo img {
                height: 60px;
            }
            
            .logo a {
                font-size: 18px;
                margin-left: 10px;
            }
            
            .nav-content {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 80px);
                background-color: var(--dropdown-bg);
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
                transition: all 0.3s ease;
                z-index: 999;
            }
            
            .nav-content.active {
                left: 0;
            }
            
            .menu {
                flex-direction: column;
                width: 100%;
                align-items: flex-start;
            }
            
            .menu li {
                margin: 5px 0;
                width: 100%;
            }
            
            .menu > li > a {
                padding: 12px 20px;
                width: 100%;
            }
            
            .dropdown {
                position: static;
                display: none;
                width: 100%;
                box-shadow: none;
                border-radius: 0;
                background-color: rgba(0, 0, 0, 0.2);
                animation: none;
            }
            
            .dropdown.active {
                display: block;
            }
            
            .search-form {
                margin: 20px 0;
                width: 100%;
            }
            
            .search-form input {
                width: 100%;
            }
            
            .user-menu {
                margin-top: 20px;
                width: 100%;
                justify-content: center;
            }
            
            .hamburger {
                display: block;
                position: absolute;
                right: 20px;
                top: 50%;
                transform: translateY(-50%);
            }
        }

        @media (max-width: 576px) {
            .logo a {
                font-size: 16px;
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
        <a href="{{ route('welcome') }}" class="logo">
            <img alt="avatar" src="{{ asset('storage/images/logo.jpg') }}"/>
            <h4 style="margin-left: 10px; color: #ffffff;" class="museum-title"></h4>
        </a>
        
        <div class="navbar">
            <div class="nav-content" id="navContent">
                <ul class="menu" id="mainMenu">
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
                
                <div class="user-menu">
                    <a class="avatar" href="{{ Auth::check() ? route('personal') : route('login') }}" aria-expanded="false">
                        @if(Auth::check())
                            <img alt="avatar" src="{{ Auth::user()->user_image ? asset('storage/' . Auth::user()->user_image) : asset('storage/images/default-avatar.png') }}"/>
                        @else
                            <img alt="avatar" src="{{ asset('storage/images/default-avatar.png') }}"/>
                        @endif    
                    </a>
                </div>
            </div>
        </div>
        
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.getElementById('hamburger');
        const navContent = document.getElementById('navContent');
        
        hamburger.addEventListener('click', function() {
            this.classList.toggle('open');
            navContent.classList.toggle('active');
        });
        
        // Обработка выпадающих меню на мобильных устройствах
        const dropdownParents = document.querySelectorAll('.menu > li:has(.dropdown)');
        
        dropdownParents.forEach(parent => {
            const link = parent.querySelector('a:first-child');
            const dropdown = parent.querySelector('.dropdown');
            
            link.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    dropdown.classList.toggle('active');
                }
            });
        });
    });
</script>

</body>
</html>