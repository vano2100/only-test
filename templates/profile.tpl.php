<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Only test - profile page</title>
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
                    <li><a href="/logout.php">Выйти</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="container">
        <h1>Страница редактирования профиля пользователя</h1>
        <form method="POST" action="/profile.php">
            <div class="form-group">
                <label for="userName">Имя:</label>
                <input name="userName" type="text" class="form-control" id="userName" placeholder="Username" value="<?= $userName ?>">
            </div>
            <div class="form-group">
                <label for="phoneNumber">Номер телефона:</label>
                <input name="phoneNumber" type="phone" class="form-control" id="phoneNumber" placeholder="Phone number" value="<?= $phoneNumber ?>">
            </div>                        
            <div class="form-group">
                <label for="email">Email адрес:</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?= $email ?>">
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password" value="<?= $password ?>">
            </div>
            <button type="submit" class="btn btn-default">Сохранить</button>
        </form>
    </div>
</body>

</html>