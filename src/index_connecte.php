<?php

session_start();
include("../inc/update_session_infos.inc.php");

$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title>Vous êtes connecté au site</title>
</head>

<body class="">
    <div class="flex justify-center items-center mx-auto h-screen">
        <div class="border-2 border-solid border-gray-400 p-8 rounded-lg m-auto shadow-2xl">
            <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-blue-600">Vous êtes connecté au site !</br>
                Bienvenu <?php echo "$first_name $last_name" ?>
            </p>
            <div class="text-center text-white text-sm p-1 border-2 border-solid shadow border-gray-400 rounded bg-blue-600 opacity-90 my-3">
                <a href="modif_infos.php">Modifier mes informations</a>
            </div>
            <div class="text-center text-white text-sm p-1 border-2 border-solid shadow border-gray-400 rounded bg-blue-600 opacity-90 my-3">
                <a href="modif_password.php">Modifier mon mot de passe</a>
            </div>
            <div class="text-center text-white text-sm p-1 border-2 border-solid shadow border-gray-400 rounded bg-red-600 opacity-95 my-3">
                <a href="delete_account.php">Supprimer mon compte</a>
            </div>
            <div class="text-center text-white text-sm p-1 border-2 border-solid shadow border-gray-400 rounded bg-red-600 my-3">
                <a href="deconnexion.php">Deconnexion</a>
            </div>
        </div>

    </div>

</body>
<?php
$bdd = null;
?>

</html>