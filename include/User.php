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

    function login($email, $password)
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
            $_SESSION['login_user'] = $result->fetch_assoc();
            return true;
        } else {
            return false;
        }
    }

    function logout()
    {
        unset($_SESSION['login_user']);
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
        return isset($_SESSION['login_user']);
    }
}




