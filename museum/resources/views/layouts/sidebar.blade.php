<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0; /* Убираем отступы по умолчанию */
            padding: 0; /* Убираем отступы по умолчанию */
        }

        .header {
            z-index: 1200; /* Устанавливаем z-index выше, чем у бокового меню */
        }

        .sidebar-menu {
            position: fixed;  
            height: calc(100vh - 70px); /* Высота бокового меню с учетом высоты заголовка */
            width: 280px; 
            left: 0; 
            background: rgb(63, 86, 123);
            overflow: hidden; 
            transition: all 0.3s linear; 
            z-index: 999; 
            top: 70px; /* Устанавливаем верхнюю границу на высоту заголовка */
        }

        .sidebar-menu .menu {
            margin-top: 20px; /* Уменьшаем отступ сверху для бокового меню */
        }

        .sidebar-menu .menu li {
            margin-top: 6px; 
            list-style: none; 
            padding: 14px 2px; 
        }

        .sidebar-menu .menu i {
            color: #fff; 
            font-size: 20px; 
            padding-right: 8px; 
        }

        .sidebar-menu .menu a {
            color: #fff; 
            font-size: 20px; 
            text-decoration: none; 
        }

        .sidebar-menu .menu li:hover {
            border-left: 1px solid #fff; 
            box-shadow: 0 0 4px rgba(255, 255, 255, 0.84); 
        }

        .sidebar-menu .social_media {
            position: absolute; 
            left: 50%; 
            transform: translateX(-50%); 
            bottom: 20px; 
            list-style: none; 
            cursor: pointer; 
        }

        .sidebar-menu .social_media i {
            text-decoration: none; 
            padding: 0 5px; 
            color: #fff; 
            opacity: 0.6; 
            font-size: 20px; 
        }

        .sidebar-menu .social_media i:hover {
            opacity: 1; 
            transition: all 0.2s linear; 
            transform: scale(1.01); 
        }

        main {
            margin-left: 300px; /* Увеличиваем отступ слева, чтобы избежать наложения */
            padding: 20px; /* Добавляем отступы для основного контента */
        }

        /* Адаптивные стили */
        @media (max-width: 768px) {
            .sidebar-menu {
                width: 100%; /* Ширина бокового меню на всю ширину экрана */
                height: auto; /* Автоматическая высота для адаптивности */
                position: relative; /* Изменяем позиционирование на относительное */
                top: 0; /* Убираем отступ сверху для мобильных устройств */
            }

            .sidebar-menu .menu {
                margin-top: 20px; /* Уменьшаем отступ сверху для мобильных устройств */
            }

            .sidebar-menu .menu li {
                padding: 10px; /* Уменьшаем внутренние отступы для мобильных устройств */
            }

            .sidebar-menu .menu i {
                font-size: 18px; /* Уменьшаем размер иконок для мобильных устройств */
            }

            .sidebar-menu .menu a {
                font-size: 18px; /* Уменьшаем размер шрифта для ссылок */
            }

            .sidebar-menu .social_media {
                bottom: 10px; /* Уменьшаем отступ снизу для мобильных устройств */
            }

            .sidebar-menu .social_media i {
                font-size: 18px; /* Уменьшаем размер шрифта для иконок социальных сетей */
            }

            main {
                margin-left: 0; /* Убираем отступ слева для мобильных устройств */
                padding: 10px; /* Уменьшаем отступы для мобильных устройств */
            }
        }
    </style>
</head>

<body>
    <div class="sidebar-menu">
        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('showpiece') }}">Экспонаты</a>
                </li>
                <li>
                    <a href="#">Экскурсии</a>
                </li>
                <li>
                    <a href="{{ route('excursions') }}">Новости</a>
                </li>
                <li>
                    <a href="#">Мероприятия</a>
                </li>
                <li>
                    <a href="#">Фотоархив</a>
                </li>
                <li>
                    <a href="#">Видеоклипы</a>
                </li>
                <li>
                    <a href="#">Контакты</a>
                </li>
                <li>
                    <a href="#">Обратная связь</a>
                </li>
                <li>
                    <a href="#">Документы</a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
