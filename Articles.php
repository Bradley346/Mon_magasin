<?php

session_start();
if (!isset($_SESSION['IDuser'])) {
    header("Location: login.php");
    exit();
}


$host = "localhost";
$dbname = "magasin";
$user = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur connexion : " . $e->getMessage());
}


$stmt = $pdo->query("SELECT * FROM Article");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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

<div class="tab">
    <h2 class="titre">Liste des Clients</h2>
    <button><a href="index.php">← Retour</a></button>

    <table border="1" cellpadding="10" style="width:100%; margin-top:1rem; border-collapse:collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Désignation</th>
                <th>Prix</th>
                <th>Catégorie</th>
            </tr>
        </thead>
            <?php foreach ($clients as $article): ?>
                <tr>
                    <td><?= htmlspecialchars($article['IDarticle']) ?></td>
                    <td><?= htmlspecialchars($article['designation']) ?></td>
                    <td><?= htmlspecialchars($article['prix']) ?></td>
                    <td><?= htmlspecialchars($article['categorie']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>

</html>