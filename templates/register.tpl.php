<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Only test - register page</title>
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
        <h1>Страница регистрации нового пользователя</h1>
        <? if ($errors): ?>
            <p class="text-danger">Форма заполнена с ошибками:</p>
            <? foreach($errors as $error): ?>
                <p class="text-danger"><?= $error ?></p>
            <? endforeach; ?>
        <? endif; ?>
        <form method="POST" action="/register.php">
            <div class="form-group">
                <label for="userName">Имя:</label>
                <input name="userName" type="text" class="form-control" id="userName" placeholder="Username" value="<?=$userName ?>">
            </div>
            <div class="form-group">
                <label for="phoneNumber">Номер телефона:</label>
                <input name="phoneNumber" type="phone" class="form-control" id="phoneNumber" placeholder="Phone number" value="<?=$phone ?>">
            </div>                        
            <div class="form-group">
                <label for="email">Email адрес:</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?=$email ?>">
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="passwordRepeat">Еще разок:</label>
                <input name="passwordRepeat" type="password" class="form-control" id="passwordRepeat" placeholder="Password">
            </div>            
            <button type="submit" class="btn btn-default">Зарегистрироваться</button>
        </form>
    </div>
</body>

</html>