<?php
$host     = "localhost";
$dbname   = "magasin";
$user     = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur connexion : " . $e->getMessage());
}




$Nom     = $_POST['nom'];
$Prenom  = $_POST['prenom'];
$Mail    = $_POST['mail'];
$Adresse = $_POST['adresse'];
$Age     = intval($_POST['age']);
$Ville   = $_POST['ville'];


$req_check = $pdo->prepare("SELECT IDclient FROM client WHERE Mail = ?");
$req_check->execute([$Mail]);

if ($req_check->rowCount() > 0) {
    $ligne    = $req_check->fetch();
    $IDclient = $ligne['IDclient'];
} else {
    $req_client = $pdo->prepare("INSERT INTO client (Nom, Prenom, Mail, Adresse, Age, Ville) 
                                 VALUES (?, ?, ?, ?, ?, ?)");
    $req_client->execute([$Nom, $Prenom, $Mail, $Adresse, $Age, $Ville]);
    $IDclient = $pdo->lastInsertId();
}


$Date = $_POST['date'];

$req_commande = $pdo->prepare("INSERT INTO commande (Date, IDclient) VALUES (?, ?)");
$req_commande->execute([$Date, $IDclient]);
$IDcommande = $pdo->lastInsertId();


$articles  = $_POST['idarticle'];
$quantites = $_POST['qte'];

for ($i = 0; $i < count($articles); $i++) {
    $IDarticle    = intval($articles[$i]);
    $Qte_commande = intval($quantites[$i]);

    
    $req_check_art = $pdo->prepare("SELECT IDarticle FROM article WHERE IDarticle = ?");
    $req_check_art->execute([$IDarticle]);

    if ($req_check_art->rowCount() == 0) {
        header("Location: vendre.php?error=Article+$IDarticle+inexistant");
        exit();
    }

    $req_ligne = $pdo->prepare("INSERT INTO ligne (IDarticle, IDcommande, Qte_commande) 
                                VALUES (?, ?, ?)");
    $req_ligne->execute([$IDarticle, $IDcommande, $Qte_commande]);
}

header("Location: vendre.php?success=1");
exit();



?>