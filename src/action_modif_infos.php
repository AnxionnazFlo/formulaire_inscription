<?php

session_start();

$_POST['first_name'] = htmlspecialchars($_POST['first_name']);
$_POST['last_name'] = htmlspecialchars($_POST['last_name']);
$_POST['email'] = htmlspecialchars($_POST['email']);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$id = $_SESSION['id']; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
    <link href="../dist/output.css" rel="stylesheet">


</head>

<body>
    <?php


include("connexionbdd.php");

    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email'])) {

        $requete = $bdd->prepare('UPDATE users.users SET first_name=?, last_name=?, email=? WHERE id=?');
        $requete->execute(array($first_name,$last_name, $email, $id));

        echo "<meta http-equiv='refresh' content='2.5;URL=index_connecte.php'>"; ?>

        <div class="flex justify-center items-center h-screen">
        <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-blue-600">Vos changements sont pris en compte !</p>
        </div>
    
        <?php

    }

    else {
    echo "<meta http-equiv='refresh' content='2.5;URL=modif_infos.php'>"; ?>

    <div class="flex justify-center items-center h-screen">
    <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-red-600">Il manque un élément dans le formulaire !</p>
    </div>

    <?php
    }  

    $bdd = null;


    ?>

</body>
</html>