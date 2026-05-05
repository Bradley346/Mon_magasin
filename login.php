<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&family=Inter:wght@400;500&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <title>Login</title>
</head>

<body>
    <h2>🔐 Connexion</h2>

    <h3 >Default login : Useradmin</h3>
    <h3 >Default password : abcd</h3>
    <div class="contener">

        <?php
        if (isset($_GET['error'])) {
            echo "<p class='error'>Login ou mot de passe incorrect !</p>";
        }
        ?>

        <form action="traitement_login.php" method="POST">
            <label>Login:</label><br>
            <input type="text" name="login" required>
            <label>Password :</label><br>
            <input type="password" name="password" required>

            
            <button type="submit">Se connecter</button>
        </form>
    </div>

</body>

</html>
</body>

</html>