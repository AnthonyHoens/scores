<?php


namespace Controllers;


class Login
{
    function create()
    {
        $view = './views/login/create.php';

        return compact('view');
    }
    function check()
    {
        // Collecte des données
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Identification
        $userModel = new \Models\User();
        $user = $userModel->find($email);

        //Authentification
        if (password_verify($password, $user->password)) {


            var_dump('c est bien ' . $email);
        } else {
            var_dump('c est pas ' . $email);

        }

    }
}