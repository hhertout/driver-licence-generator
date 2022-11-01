<?php

session_start();
var_dump($_POST);

$errors = [];

if($_SERVER['REQUEST_METHOD'] === "POST"){    

    $fileExtension = pathinfo($_FILES['file']['name']);
    $fileExtension = $fileExtension['extension'];
    var_dump($fileExtension);
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . uniqid('', true) . '.' .$fileExtension;
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $authorizedExtensions = ['jpg','gif','png', 'webp'];
    $maxFileSize = 1000000;
    

    if((!in_array($extension, $authorizedExtensions))){
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Gif, Webp ou Png !';
    }

    if(file_exists($_FILES['file']['tmp_name']) && filesize($_FILES['file']['tmp_name']) > $maxFileSize){
        $errors[] = "Votre fichier doit faire moins de 2M !";
    }
    if(empty($_POST['firstname'])){
        $errors[] = "Ce champ est requis";
    }
    if(empty($_POST['lastname'])){
        $errors[] = "Ce champ est requis";
    }
    if(empty($_POST['adress'])){
        $errors[] = "Ce champ est requis";
    }
    if(empty($_POST['sexe'])){
        $errors[] = "Ce champ est requis";
    }
    if(empty($_POST['height'])){
        $errors[] = "Ce champ est requis";
    }
    if(empty($_POST['weight'])){
        $errors[] = "Ce champ est requis";
    }
    if(empty($_POST['hair'])){
        $errors[] = "Ce champ est requis";
    }

    if(empty($errors)){
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);

        $_SESSION['avatar'] = $uploadFile;
        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['lastname'] = $_POST['lastname'];
        $_SESSION['adress'] = $_POST['adress'];
        $_SESSION['sex'] = $_POST['sexe'];
        $_SESSION['height'] = $_POST['height'];
        $_SESSION['weight'] = $_POST['weight'];
        $_SESSION['hair'] = $_POST['hair'];
        header('Location: /');
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Choisis ton avatar !</h2>
    <ul>
       <?php foreach($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
    <form method="POST" enctype="multipart/form-data">
        <label for="fileUpload">Avatar:</label>
        <input type="file" name="file" id="fileUpload"><br>
        
        <label for="lastname">Nom: </label>
        <input type="text" name="lastname" id="lastname"><br>

        <label for="firstname">Prénom: </label>
        <input type="text" name="firstname" id="firstname"><br>

        <label for="adress">Adresse:</label>
        <input type="text" name="adress" id="adress"><br>

        <label for="sexe">Sexe: </label>
        <select name="sexe" id="sexe">
            <option>Homme</option>
            <option>Femme</option>
        </select>

        <label for="height"></label>
        <select name="height" id="height">
            <option>Small</option>
            <option>Medium</option>
            <option>High</option>
        </select><br>

        <label for="weight">Poids: (kg)</label>
        <input type="number" name="weight" id="weight" min="0" max="300"><br>

        <label for="hair">Cheveux: </label>
        <select name="hair" id="hair">
            <option>Oui</option>
            <option>Non</option>
        </select><br>
        
        <button name="send">Creer</button>
    </form>

</body>
</html>