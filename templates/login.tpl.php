<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Only test - login page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body style="padding-top: 50px;">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Only test</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">Задание</a></li>
                    <li><a href="/profile.php">Профиль</a></li>
                    <li><a href="/login.php">Войти</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="container">
        <h1>Страница входа</h1>
        <? if ($error) { ?>
            <p class="text-danger">Не правильный логин либо пароль.</p>
        <? } ?>
        <form method="POST" action="/login.php">
            <div class="form-group">
                <label for="emailOrPhoneNumber">Email адрес либо номер телефона:</label>
                <input name="emailOrPhoneNumber" type="text" class="form-control" id="emailOrPhoneNumber" placeholder="Email or phone number">
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Войти</button>
        </form>
    </div>
</body>

</html>