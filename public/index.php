<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheets/style.css">
</head>
<body>
    <h1>Permis de Conduire Générateur</h1>
    <div class="link-container">
        <a href="/form.php">Crée un profil</a>
        <a href="logout.php">Logout</a>
    </div>
    

    <div class="card">
        <img src="<?= $_SESSION['avatar'] ?? "./uploads/defaut.jpg" ?>" alt="avatar" style="width:100px; height:100px; object-fit:cover">
        <div class="info-container">
            <h3>Permis de conduire</h3>
            <div class="info" id="lastname">Nom: <?= $_SESSION['lastname'] ?? "John" ?></div>
            <div class="info" id="firstname">Prénom: <?= $_SESSION['firstname'] ?? "Doe" ?></div>
            <div class="info" id="sex">Sexe: <?= $_SESSION['sex'] ?? "" ?></div>
            <div class="info" id="adress">Adresse: <?= $_SESSION['adress'] ?? "" ?></div>
            <div class="info" id="height">Taille: <?= $_SESSION['height'] ?? "" ?></div>
            <div class="info" id="weight">Poids: <?= $_SESSION['weight'] ?? "" ?></div>
            <div class="info" id="hair">Cheveux: <?= $_SESSION['hair'] ?? "" ?></div>
        </div>
    </div>

</body>
</html>