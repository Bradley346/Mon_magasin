<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plateforme de Gestion de Ventes - EPAM / UAC</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&family=Inter:wght@400;500&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <header class="topbar">
    <div class="topbar-left">
        <img class="logo-eneam" src="Ressources\Gemini_Generated_Image_cvdd7dcvdd7dcvdd.png" alt="ENEAM">
    </div>
    <div class="topbar-center">
        <h1 class="topbar-title">Bienvenue sur ma plateforme</h1>
    </div>
    <div class="topbar-right">
        <img class="logo-uac" src="Ressources/logo_uac.png" alt="UAC">
    </div>
</header>


<?php
session_start();
if (!isset($_SESSION['IDuser'])) {
    header("Location: login.php");
    exit();
}
?>
<button>
    <a href="deconnexion.php">
        <div >
            <i data-lucide="log-out" class="icon"></i>
            Déconnexion
        </div>
    </a>

</button>

<div class="menu">

    <a href="clients.php">
        <div class="menu-item">
            <i data-lucide="users" class="icon"></i>
            Liste Clients
        </div>
    </a>
    <a href="users.php">
        <div class="menu-item">
            <i data-lucide="user" class="icon"></i>
            Liste Utilisateurs
        </div>
    </a>
    <a href="Articles.php">
        <div class="menu-item">
            <i data-lucide="boxes" class="icon"></i>
            Liste Articles
        </div>
    </a>
    <a href="ventes.php">
        <div class="menu-item"><i data-lucide="shopping-cart" class="icon"></i>
            Liste Ventes
        </div>
    </a>

    <a href="vendre.php">
        <div class="menu-item menu-item--ventes">
            <i data-lucide="receipt-text" class="icon"></i>
                Effectuer Vente
    </div>
    </a>
    </p>
</div>
</body>



<script>
    lucide.createIcons();
</script>