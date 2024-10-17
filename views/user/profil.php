<?php session_start(); ?>
<?php
require_once('../components/navbar.php');
require_once('../../classes/user.php');

if (isset($_SESSION['id'])) {

    $user_name = $_SESSION['name'];
    $user_first_name = $_SESSION['first_name'];
    $user_email = $_SESSION['email'];
} else {
    echo "user non connecté";
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../../styles.css">
</head>

<body>
    <?php
    require_once '../components/header.php';
    require_once '../components/navbar.php';
    ?>
    <div class="container">
        <main>
            <ul>
                <li>
                    nom: <?php echo htmlspecialchars($user_name) ?><br><br>
                </li>
                <li>
                    prénom: <?php echo htmlspecialchars($user_first_name) ?><br><br>
                </li>
                <li>
                    Email: <?php echo htmlspecialchars($user_email) ?><br><br>
                </li>
                <li>

                    <a href="/forms/formMajuser.php" class="button">Modifier le profil</a>
                </li>
            </ul>
        </main>
    </div>
    <?php
    require_once "../components/footer.php";
    ?>
    <script src="../../scripts.js"></script>
</body>