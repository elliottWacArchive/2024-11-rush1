<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Navigator</title>
    <link rel="stylesheet" href="../css/my_style.css">
    <link rel="stylesheet" href="../css/cursor.css">
    <link rel="icon" href="../img/mikuicon.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bokor&display=swap" rel="stylesheet" />
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        echo '<h1>' . htmlspecialchars($_SESSION['username']) . ' connecté!</h1>';
        echo '<form method="post" action="logout.php">
                <button id="subButton" type="submit">Se déconnecter</button>
            </form>';
    } else {
        echo '<h1>Pas connecté</h1>';
    }
    ?>
</body>

</html>