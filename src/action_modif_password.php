<?php

session_start();

$_POST['password'] = htmlspecialchars($_POST['password']);
$_POST['password_verif'] = htmlspecialchars($_POST['password_verif']);


$password = $_POST['password'];
$password_verif = $_POST['password_verif'];
$id = $_SESSION['id'];

function verificationPassword($string)
    {
        $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/"; // le regex verifie chaque caractère pour voir si tout est présent

        if (preg_match($regex, $string))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

?>

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

    if (!empty($_POST['password']) && !empty($_POST['password_verif'])) {

        if (verificationPassword($_POST['password'])) {

            if ($_POST['password'] != $_POST['password_verif']) {
                echo "<meta http-equiv='refresh' content='2.5;URL=modif_password.php.php'>";
            ?>

                <div class="flex justify-center items-center h-screen">
                    <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-red-600">Attention vos mots de passes sont différents !</p>
                </div>

            <?php

            } else {
                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $_POST['password'] = $hashed_password;
                $_POST['password_verif'] = $hashed_password;

                $requete = $bdd->prepare('UPDATE users.users SET password=? WHERE id=?');
                $requete->execute(array($hashed_password, $id));
        
                echo "<meta http-equiv='refresh' content='2.5;URL=index_connecte.php'>"; ?>
        
                <div class="flex justify-center items-center h-screen">
                <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-blue-600">Vos changements sont pris en compte !</p>
                </div>
            
                <?php

            
                    
            }
        }
        else {
            echo "<meta http-equiv='refresh' content='2.5;URL=modif_password.php'>"; ?>

            <div class="flex justify-center items-center h-screen">
                <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-red-600">Votre mot de passe ne respecte pas les critères !</p>
            </div>

        <?php
        }

       

    }

    else {
    echo "<meta http-equiv='refresh' content='2.5;URL=modif_password.php'>"; ?>

    <div class="flex justify-center items-center h-screen">
    <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-red-600">Il manque un élément dans le formulaire !</p>
    </div>

    <?php
    }  

    $bdd = null;


    ?>

</body>
</html>