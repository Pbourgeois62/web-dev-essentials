<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
    <?php
    require_once '../components/header.php';
    require_once '../components/navbar.php';
    ?>
    <div class="container">
        <main class="resource-main">
            <div class="resource">
                <div class="resource-title">
                    <h2>Flexbox Froggy</h2>
                </div>
                <hr>
                <div class="resource-content">
                    <ul>
                        <li>Techno abordée: Css</li>
                        <hr>
                        <li>Pour apprendre les Flexbox de manière ludique avec des grenouilles</li>
                        <hr>
                        <li><a href="https://flexboxfroggy.com/#fr" target="_blank">Visiter</a></li>
                    </ul>
                </div>
            </div>
        </main>
        <?php require_once 'aside-navbar.php';
        ?>
    </div>
    <?php
    require_once "../components/footer.php";
    ?>
    <script src="/scripts.js"></script>
</body>

</html>