<?php

session_start();
include("connexionbdd.php");
$id = $_SESSION['id'];

$delete = $bdd->prepare('DELETE FROM users.users WHERE id=?');
$delete->execute([$id]);

echo "<meta http-equiv='refresh' content='2.5;URL=index.php'>"; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title>Vous êtes déconnecté u site</title>
</head>

<body class="">


<div class="flex justify-center items-center h-screen">
    <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-red-600">Votre compte à été supprimé !</p>
</div>



</body>
<?php
$bdd = null;
?>