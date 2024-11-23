<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
            <legend>Inscription:</legend>
            <div class="elementContainer">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="elementContainer">
                <label for="mail">Email :</label>
                <input type="email" id="mail" name="mail" required>
            </div>
            <div class="elementContainer">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" id="subButton" value="S'inscrire">
        </fieldset>
        <div id="errorMessage" style="color: red;"></div>
    </form>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $users = json_decode(file_get_contents('user.json'), true);
    $users[] = ['username' => $username, 'email' => $email, 'password' => $password];
    file_put_contents('user.json', json_encode($users));
    header('Location: login.php');
    exit();
}
?>
