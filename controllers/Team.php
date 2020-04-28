<?php

namespace Controllers;

class Team
{
    function store()
    {
        if(!isset($_POST['name']) || trim($_POST['name'])==='') {
            $_SESSION['errors']['name'] = 'Vous devez entrer un nom pour une équipe';
        }
        if(!isset($_POST['slug']) || trim($_POST['slug'])==='') {
            $_SESSION['errors']['slug'] = 'Vous devez entrer un slug pour une équipe';
        } elseif(strlen($_POST['slug'])!=3) {
            $_SESSION['errors']['slug'] = 'Vous devez entrer un slug de 3 caractères exactement';

        }

        $name = $_POST['name'];
        $slug = $_POST['slug'];

        if(!$_SESSION['errors']) {
            $teamModel = new \Models\Team();
            $teamModel->save(compact('name', 'slug'));
            header('Location: index.php');
            exit();
        }

        $_SESSION['old']['name'] = $_POST['name'];
        $_SESSION['old']['slug'] = $_POST['slug'];

        header('Location: index.php?action=create&resource=team');
        exit();
    }

    function create()
    {
        $view = './views/team/create.php';

        return compact('view');
    }
}


