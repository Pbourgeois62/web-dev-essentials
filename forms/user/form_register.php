<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles.css">
</head>

<body>
    <?php 
    require_once '../../views/components/navbar.php';
    ?>

    <form action="../../controllers/user/user_register.php" method="post">

        <h1>Enregistrement</h1>


        <label for="name">name: </label>
        <input type="text" id="name" name="name" required>
        <br>
        <br>
        <label for="first_name">Préname: </label>
        <input type="text" id="first_name" name="first_name" required>
        <br>
        <br>
        <label for="email">E-mail: </label>
        <input type="email" id="email" name="email">
        <br><br>
        <label for="password">Mot de passe: </label>
        <input type="password" id="password" name="password" required>
        <br>
        <br>
        <label for="confirm_password">Confirmer Mot de passe: </label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br>
        <br>

        <button type="submit">Envoyer</button>
    </form>

</body>

</html>