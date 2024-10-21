<?php

class session
{
    public $user = 'user';

    public function getUser()
    {
        return isset($_SESSION[$this->user]) ? $_SESSION[$this->user] : null;
    }

    public function getUserName()
    {
        return $_SESSION[$this->user]['full_name'];
    }
}
