<?php

class RegisterForm
{
    public $fields = ["userName", "phoneNumber", "email", "password", "passwordRepeat"];
    public $errors = [];
    public $userName;
    public $phoneNumber;
    public $email;
    public $password;
    public $passwordRepeat;

    public function loadData($data)
    {
        foreach ($this->fields as $field) {
            $this->$field = $data[$field];
        }
    }

    public function validate()
    {
        // password check
        if ($this->password <> $this->passwordRepeat) {
            $this->errors[] = "Пароль и повтор пароля не равны.";
        }
        if (strlen($this->password) < 6) {
            $this->errors[] = "Пароль слишком слабый. Минимальная длина 6 символов.";
        }
        // проверка поля email
        if (!strpos($this->email, '@')) {
            $this->errors[] = "Поле email заполнено некорректно.";
        }

        if (count($this->errors) > 0) {
            return false;
        } else {
            return true;
        }
    }
}
