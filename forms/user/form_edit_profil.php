<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAJ profil</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <?php require_once '../navbar.php';
    ?>

    <form action="../controllers/user/editerProfiluser.php" method="post">

        <h1>Modification du profil</h1>        
        
        <label for="new_name">name: </label>
        <input type="text" id="new_name" name="new_name" value="<?php echo($_SESSION['name']?? '')?>" required>
        <br>
        <br>
        <label for="new_first_name">Préname: </label>
        <input type="text" id="new_first_name" name="new_first_name"value="<?php echo($_SESSION['first_name']?? '')?>" required>
        <br>
        <br>
        <label for="new_email">E-mail: </label>
        <input type="email" id="new_email" name="new_email"value="<?php echo($_SESSION['email']?? '')?>" required>
        <br><br>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>
        <br>
        <br>        

        <button type="submit">Envoyer</button><br><br>
        <a href="./formMajPassword.php" class="btn">Réinitialisation du mot de passe</a>
    </form>        
</body>

</html>