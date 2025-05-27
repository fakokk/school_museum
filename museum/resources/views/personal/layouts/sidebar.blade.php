<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .sidebar-menu {
            position: fixed;  
            height: calc(100vh - 70px);
            width: 280px; 
            left: 0; 
            background: rgb(63, 86, 123);
            z-index: 999; 
            top: 70px;
        }
        .sidebar-menu .menu {
            margin-top: 20px;
        }
        .sidebar-menu .menu li {
            margin-top: 6px; 
            list-style: none; 
            padding: 14px 0; /* Убрали отступ справа */
        }
        .sidebar-menu .menu a {
            color: #fff; 
            font-size: 18px; 
            text-decoration: none; 
        }
        .sidebar-menu .menu li:hover {
            border-left: 1px solid #fff; 
            box-shadow: 0 0 4px rgba(255, 255, 255, 0.84); 
        }
        main {
            margin-left: 300px; 
            padding: 20px; 
        }
        @media (max-width: 768px) {
            .sidebar-menu {
                width: 100%; 
                height: auto; 
                position: relative; 
                top: 0; 
            }
            .sidebar-menu .menu li {
                padding: 10px; 
            }
            main {
                margin-left: 0; 
                padding: 10px; 
            }
        }
    </style>
</head>
<body>
    <div class="sidebar-menu">
        <div class="menu">
            <ul>
                <li class="nav-item">
                    <a href="{{route('personal')}}" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <p>Профиль</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('personal.likes')}}" class="nav-link">
                        <i class="fa-solid fa-heart"></i>
                        <p>Избранное</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.comments') }}" class="nav-link">
                        <i class="fa-solid fa-comment"></i>
                        <p>Комментарии</p>
                    </a>
                </li>
                <!-- Условный вывод для администраторов -->
                @if(auth()->user() && auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link">
                        <i class="fa-solid fa-cog"></i>
                        <p>Администрирование</p>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</body>
</html>
