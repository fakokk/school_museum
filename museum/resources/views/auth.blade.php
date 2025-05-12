<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: rgb(21, 42, 78);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: rgb(15, 30, 60);
        }
        p {
            text-align: center;
        }
        a {
            color: rgb(21, 42, 78);
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Регистрация</h2>
    <form action="register.php" method="post">
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Повторите пароль</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
        </div>
        <input type="submit" name="submit" value="Зарегистрироваться">
    </form>
    <p>Уже зарегистрированы? <a href="login.php">Войдите в систему</a>.</p>
</div>

</body>
</html>
