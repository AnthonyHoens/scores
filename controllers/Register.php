<?php


namespace Controllers;


class Register
{
    public function create ()
    {
        $view = './views/register/create.php';

        return compact('view');
    }
}