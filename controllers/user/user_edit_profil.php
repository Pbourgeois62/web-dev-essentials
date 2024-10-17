<?php
session_start();
require_once('../../classes/user.php');
require_once('../../classes/database.php');

if (empty($_SESSION['id'])) {
    echo "user non connecté";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $new_name = trim($_POST['new_name'] ?? '');
    $new_first_name = trim($_POST['new_first_name'] ?? '');
    $new_email = trim($_POST['new_email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $ObjDb = new database;
    $objuser = new user($ObjDb);
    $objuser -> setId($_SESSION['id']);    
    $hashedPassword = $objuser-> getPassword();

   if (password_verify($_POST['password'], $hashedPassword)){

        $objuser->setname($new_name);
        $objuser->setfirst_name($new_first_name);
        $objuser->setEmail($new_email);       
        $objuser->setPassword($hashedPassword);
            
        $resultat = $objuser->updateUser();
                

        if ($resultat) {
            echo "Votre profil a été mis à jour avec succès.";
            var_dump($resultat);
            header('Location: ../../vues/profil.php');
            exit;

        } else {

            echo "Erreur lors de la mise à jour de vos données.";
                      
            header('Location: connexionuser.php');
            exit;

        }
    } else {

    echo "Méthode non autorisée.";
    exit;

    }
}
