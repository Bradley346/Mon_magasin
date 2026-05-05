<?php
session_start();
if (!isset($_SESSION['IDuser'])) {
    header("Location: login.php");
    exit();
}

$host     = "localhost";
$dbname   = "magasin";
$user     = "root";
$password = "";

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

// Une seule requête qui récupère tout
$req = $pdo->query("
    SELECT 
        commande.IDcommande,
        commande.Date,
        client.Nom,
        client.Prenom,
        article.designation,
        article.prix,
        ligne.Qte_commande,
        (article.prix * ligne.Qte_commande) AS sous_total
    FROM commande
    JOIN client  ON commande.IDclient   = client.IDclient
    JOIN ligne   ON commande.IDcommande = ligne.IDcommande
    JOIN article ON ligne.IDarticle     = article.IDarticle
    ORDER BY commande.IDcommande
");

$ventes = $req->fetchAll();
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
<body>

<h2>Liste des Ventes</h2>

<button><a href="index.php">← Retour</a></button>
<table border="1" cellpadding="10" style="width:100%; margin-top:1rem; border-collapse:collapse;">
    <tr>
        <th>N° Commande</th>
        <th>Date</th>
        <th>Client</th>
        <th>Article</th>
        <th>Prix unitaire</th>
        <th>Quantité</th>
        <th>Sous-total</th>
    </tr>

    <?php foreach ($ventes as $v) : ?>
    <tr>
        <td><?= $v['IDcommande'] ?></td>
        <td><?= $v['Date'] ?></td>
        <td><?= $v['Nom'] . " " . $v['Prenom'] ?></td>
        <td><?= $v['designation'] ?></td>
        <td><?= $v['prix'] ?> F/td>
        <td><?= $v['Qte_commande'] ?></td>
        <td><?= $v['sous_total'] ?> F</td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>