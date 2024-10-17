<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <?php
       
    require_once 'components/header.php';
    require_once 'components/navbar.php';
    ?>
    <?php
    if (isset($_SESSION['first_name'])) {
        $first_name = $_SESSION['first_name'];
    } else {
        $first_name = "invité";
    }    
    ?>
    <div class="container">
        <main>
            <h1>Bonjour <?php echo htmlspecialchars($first_name) . ", vous vous trouvez dans la section MAIN" ?></h1>
            <br><br>
            <h2>Site en construction</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur, repellendus. Quos reiciendis molestias, a mollitia voluptatibus natus aperiam adipisci? Omnis laboriosam quod quas, illum magni error harum obcaecati voluptas atque?
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur, repellendus. Quos reiciendis molestias, a mollitia voluptatibus natus aperiam adipisci? Omnis laboriosam quod quas, illum magni error harum obcaecati voluptas atque?
            </p>
        </main>
        <aside>
            <h2>Je suis le ASIDE</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur eligendi voluptatum odit libero iste distinctio in voluptate! Harum eligendi omnis quis natus praesentium recusandae accusantium, laborum inventore cumque eos quaerat?</p>
        </aside>
    </div>
    <?php
    require_once "components/footer.php";
    ?>
    <script src="../../scripts.js"></script>
</body>

</html>