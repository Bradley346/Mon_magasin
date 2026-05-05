<?php
session_start();

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

$login    = $_POST['login'];
$password = $_POST['password'];


$req = $pdo->prepare("SELECT * FROM user WHERE login = ?");
$req->execute([$login]);
$user = $req->fetch();

if ($user && $password == $user['password']) {
    
    $_SESSION['IDuser']  = $user['IDuser'];
    $_SESSION['nom']     = $user['nom'];
    $_SESSION['prenom']  = $user['prénom'];
    $_SESSION['login']   = $user['login'];

    header("Location: index.php");
    exit();
} else {
    
    header("Location: login.php?error=1");
    exit();
}
?>