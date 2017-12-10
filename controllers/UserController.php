<?php

use models\User;

class UserController
{
    public function register()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (count($data) > 0) {
            $user = new User();
            $user->email = $data->email;
            $user->password = password_hash($data->password, PASSWORD_DEFAULT);
            if ($user->save()) {
                echo 'User saved Successfully';
            }
        }
    }

    public function login()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (count($data) > 0) {
            $email = $data->email;
            $password = $data->password;
            $user = new User();
            if ($login_user = $user->where('email', $email)->first()) {
                if (password_verify($password, $login_user->password)) {
                    $_SESSION['login'] = true;
                    $_SESSION['id'] = $email;
                } else {
                    echo 'email and password not match';
                }
            } else {
                echo 'email not found';
            }
        }
    }

    function setCookies($user)
    {
        setcookie("user", $user, time() + 3600);
    }

    function checkCookies()
    {
        if (isset($_COOKIE)) {
            if (isset($_COOKIE['user'])) {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $_COOKIE['user'];
            }
        }
    }

    function checkSession()
    {
        if (isset($_SESSION['login'])) {
            header("location: admin.php");
        }
    }
}