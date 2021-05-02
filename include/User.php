<?php

class User
{
    function register($email, $password)
    {
        $hash = $this->hashPassword($password);
    }

    private function hashPassword($password)
    {
        return sha1($password);
    }

    function login($email, $password, $remember = false)
    {
        global $db;

        $hash = $this->hashPassword($password);

        $query = "SELECT id, firstname,lastname, email FROM user WHERE email='$email' AND password='$hash'";
        $result = $db->query($query);
        if (false == $result) {
            echo $query . "<br>";
            echo $db->error;
        }

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['login_user'] = $user;
            if ($remember) {
                $secret = $this->hashPassword($hash);

                setcookie('login_user_id', $user['id'], time() + 600);
                setcookie('login_user_secret', $secret, time() + 600);
            }

            return true;
        } else {
            return false;
        }
    }

    function resetPassword($code, $password){
        global $db;
        $hash = $this->hashPassword($password);
        $query = "UPDATE user SET password='$hash' WHERE reset_password_code='$code'";
        $db->query($query);
    }

    function logout()
    {
        unset($_SESSION['login_user']);
        setcookie('login_user_id', null, time() + 1);
        setcookie('login_user_secret', null, time() + 1);
    }

    function getLoginUser()
    {
        if ($this->isLogin()) {
            return $_SESSION['login_user'];
        } else {
            return false;
        }
    }

    function isLogin()
    {
        if (isset($_SESSION['login_user'])) {
            return true;
        }

        if (isset($_COOKIE['login_user_id']) && isset($_COOKIE['login_user_secret'])) {
            $user = $this->getRememberedUserIfIsValid($_COOKIE['login_user_id'], $_COOKIE['login_user_secret']);
            if ($user) {
                $_SESSION['login_user'] = $user;
                return true;
            }
        }

        return false;
    }

    function getRememberedUserIfIsValid($userId, $secret)
    {
        $user = $this->getUserById($userId);

        if ($user && $this->hashPassword($user['password']) == $secret) {
            return $user;
        }

        return false;
    }

    function getUserById($id)
    {
        global $db;


        $query = "SELECT id, firstname,lastname, email, password FROM user WHERE id=$id";
        $result = $db->query($query);
        if (false == $result) {
            echo $query . "<br>";
            echo $db->error;
        }

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}




