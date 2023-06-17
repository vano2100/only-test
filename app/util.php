<?
const SALT = 'pasw@rd';

function registerNewUser($userName, $phone, $email, $password)
{
    $sql = "INSERT INTO users (name, email, phone, password) VALUES (:uname, :email, :phone, :pass)";
    $result = DB::sql($sql, [':uname' => $userName, ':email' => $email, ':phone' => $phone, ':pass' => getPasswordHash($password)]);
    return $result;
}

function checkExistUser($form)
{
    $errors = [];
    $sql = "select id from users where name = :name";
    $result = DB::getRow($sql, [':name' => $form->userName]);
    if ($result) {
        $errors[] = "Пользователь с таким именем уже зарегистрирован";
    }
    $sql = "select id from users where email = :email";
    $result = DB::getRow($sql, [':email' => $form->email]);
    if ($result) {
        $errors[] = "Пользователь с таким email уже зарегистрирован";
    }
    $sql = "select id from users where phone = :phone";
    $result = DB::getRow($sql, [':phone' => $form->phoneNumber]);
    if ($result) {
        $errors[] = "Пользователь с таким номером телефона уже зарегистрирован";
    }

    if (count($errors) > 0) {
        return $errors;
    } else {
        return true;
    }
}

function getPasswordHash($pass)
{
    return crypt($pass, SALT);
}

function login($id, $pass)
{
    $sql = "SELECT id, name, email, phone, password FROM users WHERE phone = :login";
    $result = DB::getRow($sql, [':login' => $id]);
    if ($result) {
        $sql = "SELECT id, name, email, phone, password FROM users WHERE phone = :login";
        if (password_verify($pass, $result["password"])) {
            $_SESSION['id'] = $result["id"];
            return true;
        } else {
            return false;
        }
    }
    $sql = "SELECT id, name, email, phone, password FROM users WHERE email = :login";
    $result = DB::getRow($sql, [':login' => $id]);
    if ($result) {
        $sql = "SELECT id, name, email, phone, password FROM users WHERE email = :login";
        if (password_verify($pass, $result["password"])) {
            $_SESSION['id'] = $result["id"];
            return true;
        } else {
            return false;
        }
    }
    return false;
}

function logout()
{
    unset($_SESSION['id']);
}

function isLogin()
{
    return isset($_SESSION['id']);
}

function isGet()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function isPost()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

define('SMARTCAPTCHA_SERVER_KEY', '<ключ_сервера>');

function check_captcha($token) {
    $ch = curl_init();
    $args = http_build_query([
        "secret" => SMARTCAPTCHA_SERVER_KEY,
        "token" => $token,
        "ip" => $_SERVER['REMOTE_ADDR'], // Нужно передать IP-адрес пользователя.
                                         // Способ получения IP-адреса пользователя зависит от вашего прокси.
    ]);
    curl_setopt($ch, CURLOPT_URL, "https://smartcaptcha.yandexcloud.net/validate?$args");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);

    $server_output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode !== 200) {
        echo "Allow access due to an error: code=$httpcode; message=$server_output\n";
        return true;
    }
    $resp = json_decode($server_output);
    return $resp->status === "ok";
}