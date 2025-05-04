
<!-- resources/views/auth.blade.php -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация и Авторизация</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://example.com/path-to-your-image.jpg'); /* Замените на URL вашего изображения */
            background-size: cover;
            background-position: center;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            width: 400px;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        .toggle-button {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .toggle-button button {
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .toggle-button button:hover {
            background-color: #0056b3;
        }
        form {
            display: none; /* Скрываем формы по умолчанию */
        }
        .active {
            display: block; /* Показываем активную форму */
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Добро пожаловать</h1>
    <div class="toggle-button">
        <button id="register-btn">Регистрация</button>
        <button id="login-btn">Вход</button>
    </div>

    <form id="register-form" class="active" action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Имя пользователя" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Зарегистрироваться</button>
    </form>

    <form id="login-form" action="{{ route('login') }}" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Имя пользователя" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Войти</button>
    </form>
</div>

<script>
    const registerBtn = document.getElementById('register-btn');
    const loginBtn = document.getElementById('login-btn');
    const registerForm = document.getElementById('register-form');
    const loginForm = document.getElementById('login-form');

    registerBtn.addEventListener('click', () => {
        registerForm.classList.add('active');
        loginForm.classList.remove('active');
    });

    loginBtn.addEventListener('click', () => {
        loginForm.classList.add('active');
        registerForm.classList.remove('active');
    });
</script>

</body>
</html>
