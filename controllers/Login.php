<?php


namespace Controllers;


class Login
{
    public function create()
    {
        $view = './views/login/create.php';

        return compact('view');
    }
    public function check()
    {
        // Collecte des données
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Identification
        $userModel = new \Models\User();
        $user = $userModel->find($email);

        //Authentification
        if (password_verify($password, $user->password)) {
            $_SESSION['user'] = $user;
            header('Location: index.php');

        } else {
            header('Location: index.php?action=view&resource=login-form');
        }

        exit();
    }
    public function delete() {
        // Détruit toutes les variables de session
        $_SESSION = array();

        // Si vous voulez détruire complètement la session, effacez également
        // le cookie de session.
        // Note : cela détruira la session et pas seulement les données de session !
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finalement, on détruit la session.
        session_destroy();
        
        header('Location: index.php');
        exit();
    }
}