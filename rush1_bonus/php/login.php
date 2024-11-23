<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/my_style.css">
    <link rel="stylesheet" href="../css/cursor.css">
    <link rel="icon" href="../img/mikuicon.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bokor&display=swap" rel="stylesheet" />
</head>

<body>
    <form id="loginForm" method="POST">
        <fieldset class="formContainer">
            <a href="signin.php">S'inscrire</a>
            <legend>Connexion:</legend>
            <div class="elementContainer">
                <label for="mail">mail :</label>
                <input type="email" id="mail" name="mail" required>
            </div>
            <div class="elementContainer">
                <label for="password">mdp :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" id="subButton" value="Se connecter">
        </fieldset>
        <div id="errorMessage" style="color: red;"></div>
    </form>
</body>

</html>
<?php
session_start();

$email = ''; //sinon quand on se deco ça bug faut def vide pour dire quelle existe
$password = ''; //pareil

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['mail'];
    $password = $_POST['password'];
}

$accounts = json_decode(file_get_contents('user.json'), true);

foreach ($accounts as $account) {
    if (($email === $account['email'] || $email === $account['username']) && $password === $account['password']) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $account['username'];
        header('Location: my_navigator.php');
        exit();
    }
}
