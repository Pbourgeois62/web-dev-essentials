<!-- <?php session_start();?> -->
<nav class="top-navbar">
    <button class="darkmod-navbar-switch" id="dark-mod-toggle" onclick="showmessage()">
        <ul>
            <li><a href="#">Darkmod</a></li>
        </ul>
    </button>
    <div class="content">
        <ul>
            <li><a href="/views/home.php">Home</a></li>            
            <li><a id="visibility_switch" href="#">privé/public</a></li>
            <li><a id ="ressources" href="/views/ressources/ressources.php">Ressources</a></li>
            <li><a href="/views/snippets/home_snippets.php">Snippets</a></li>
            <li><a href="/views/sandbox">Bac à sable</a></li>

        </ul>
    </div>
    <div class="user-auth">
        <ul>
            <li><a href="/forms/user/form_login.php">Connexion</a></li>
            <li><a href="/controllers/user/user_logout.php">Déconnexion</a></li>
            <li><a href="/forms/user/form_register.php">Enregistrement</a></li>
            <li><a href="/views/user/profil.php">Profil</a></li>
        </ul>
    </div>
</nav>