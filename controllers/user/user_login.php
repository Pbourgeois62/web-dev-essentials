<?php

require_once '../../classes/user.php';
require_once '../../classes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'email n'est pas valide";
        exit;
    }
    if (empty($email) || empty($password)) {
        echo "Veuillez renseigner tous les champs";
        exit;
    }
    $objDb= new database;
    $user = new user($objDb);
    $user->setEmail($email);
    $user->setPassword($password);
    $resultat = $user->connectUser($email, $password);

    

    if ($resultat) {
        // echo $resultat;
        header('Location: /views/home.php');
    } else {
        echo "une erreur est survenue lors de la connexion";        
        
        exit;
    }
}
