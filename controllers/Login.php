<?php


namespace Controllers;


class Login
{
    function create()
    {
        $view = './views/login/create.php';
        return compact('view');
    }
}