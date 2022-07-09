<?php

include("connexionbdd.php");

            /* $requete = $bdd->query('SELECT * FROM users.users');
            
            $user = $requete->fetch(); */
            if (!empty($_SESSION['id'])){
                $id = $_SESSION['id'];

                $requete = $bdd->prepare('SELECT * FROM users.users WHERE id=?');
                $requete->execute([$id]);
                $user = $requete->fetch();


                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['email'] = $user['email'];
            }
            else {
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
    <title>Vous êtes connecté au site</title>
</head>

<body class="">


<div class="flex justify-center items-center h-screen">
    <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-red-600">Identifiez vous afin d'accéder à votre compte !</p>
</div>



</body>
<?php
            }

$bdd = null;
?>