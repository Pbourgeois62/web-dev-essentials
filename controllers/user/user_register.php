<?php


require_once '../../classes/user.php';
require_once '../../classes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $first_name = trim($_POST['first_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    if (empty($name) || empty($first_name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "Veuillez renseigner tous les champs";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'email n'est pas valide";
        exit;
    }
    if ($password != $confirm_password) {
        echo "Les deux mots de passe ne correspondent pas";
        sleep(5);
        header('Location: ../../forms/formEnregistrement.php');
        exit;
    }
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);


    $objDb = new database;
    $user = new user($objDb);
    
    $user->setname($name);
    $user->setfirst_name($first_name);
    $user->setEmail($email);
    $user->setPassword($password_hashed);
    

    $resultat = $user->newUser();

    if ($resultat) {
        echo "Inscription réussie. Vous allez être redirigé vers la page de connexion";
        sleep(5);
        header('Location: ../../forms/user/form_login.php');
        exit;
    } else {
        echo "une erreur est survenue lors de l'inscription";
        sleep(5);
        var_dump($name);
        //header('Location: ../../forms/formEnregistrement.php');
        exit;
    }
}
