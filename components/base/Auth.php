<?php

namespace app\components;

use app\components\base\Base;
use app\models\Author;


class Auth extends Base {

    public $defaultPage = 'home/login';

    public static function create() {
        return new Auth();
    }

    public function login() {

        $author = Author::findByUserName($this->login);
        $this->id = $author->id;

        if (null !== $author) {
            if ($author->password === $this->password) {
                $this->setSession();
                return true;
            }
        }
        return false;
    }
    
    static function isLogged() {

        if (isset($_SESSION['id']) &&  isset($_SESSION['login']) && isset($_SESSION['password'])) {
            return false;
        }

        return true;
    }
    
    private function setSession() {

        $_SESSION['id'] = $this->id;
        $_SESSION['login'] = $this->login;
        $_SESSION['password'] = $this->password;
    }
    
    static function getSession($key) {
        return $_SESSION[$key] ?? null;
    }
    
    static function logout() {
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }

}
