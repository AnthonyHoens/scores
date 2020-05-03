<?php

namespace Controllers;

use Intervention\Image\ImageManagerStatic;

class Team
{
    function store()
    {

        if(
            !isset($_FILES['logo']['error']) ||
            is_array($_FILES['logo']['error'])
        ) {
            $_SESSION['errors']['logo'] = 'Tentative d\'attaque, entrez un fichier valide';
            header('Location: index.php?resource=team&action=create');

            exit();
        }

        switch ($_FILES['logo']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                $_SESSION['errors']['logo'] = 'Vous devez fournir une image png du logo du club';
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $_SESSION['errors']['logo'] = 'Vous avez dépassé la taille maximale autorisée, soit '. ini_get('upload_max_filesize');
                break;
            default:
                $_SESSION['errors']['logo'] = 'Vous avez réalisé quelque chose d\'inattendu qui a provoqué une erreur';
        }

        if ($_FILES['logo']['size'] > 32000000) {
            $_SESSION['errors']['logo'] = 'Vous avez dépassé la taille maximale autorisée, soit 32 Méga';
        }

        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
                $finfo->file($_FILES['logo']['tmp_name']),
                array(
                    'png' => 'image/png',
                ),
                true
            )) {
            $_SESSION['errors']['logo'] = 'Le fichier que vous avez fourni n\'est pas du type attendu (une image png)';
        }

        $full_file_path = './assets/images/full/';
        $thumbs_file_path = './assets/images/thumbs/';
        $file_name = sprintf('%s.%s',
            sha1_file($_FILES['logo']['tmp_name']),
            $ext
        );

        ImageManagerStatic::configure(['driver' => 'imagick']);
        $image = ImageManagerStatic::make($_FILES['logo']['tmp_name']);


        if (!move_uploaded_file(
            $_FILES['logo']['tmp_name'], $full_file_path.$file_name)
        ) {
            $_SESSION['errors']['logo'] = 'Le fichier n\'a pas pu être enregistré sur le serveur. Contactz l\'administrateur';
            header('Location: index.php?resource=team&action=create');

            exit();
        }

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
            $teamModel->save(compact('name', 'slug', 'file_name'));
            header('Location: index.php');
            exit();
        }

        $_SESSION['old']['name'] = $name;
        $_SESSION['old']['slug'] = $slug;

        header('Location: index.php?action=create&resource=team');
        exit();
    }

    function create()
    {
        $view = './views/team/create.php';

        return compact('view');
    }
}


