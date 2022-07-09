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
    $_POST['first_name'] = htmlspecialchars($_POST['first_name']);
    $_POST['last_name'] = htmlspecialchars($_POST['last_name']);
    $_POST['password'] = htmlspecialchars($_POST['password']);
    $_POST['password_verif'] = htmlspecialchars($_POST['password_verif']);
    $_POST['email'] = htmlspecialchars($_POST['email']);

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

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

    /* Procédure de verification des entrées du formulaire */

    include("connexionbdd.php");

    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['password']) && !empty($_POST['password_verif']) && !empty($_POST['email'])) {

            /* Ici on verifie si le mail existe déjà dans la bdd */

            $mailexist = $bdd->prepare('SELECT * FROM users.users WHERE email=?');
            $mailexist->execute([$email]);
            $user = $mailexist->fetch();

            if (!$user){


                if (verificationPassword($_POST['password'])) {

                    if ($_POST['password'] != $_POST['password_verif']) {
                        echo "<meta http-equiv='refresh' content='2.5;URL=page_inscription.php'>";
                    ?>

                        <div class="flex justify-center items-center h-screen">
                            <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-red-600">Attention vos mots de passes sont différents !</p>
                        </div>

                    <?php

                    } else {
                        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $_POST['password'] = $hashed_password;
                        $_POST['password_verif'] = $hashed_password;

                        

                  

                            $requete = $bdd->prepare('INSERT INTO users.users(first_name, last_name, password, email) VALUES (?, ?, ?, ?)');
                            $requete->execute(array($first_name,$last_name,$hashed_password, $email));
                        

                        echo "<meta http-equiv='refresh' content='2.5;URL=index.php'>";
                    ?>
                        <div class="flex justify-center items-center h-screen">
                            <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-blue-600">Vous êtes bien inscrit sur le site !</br>Votre identifiant est : <?php echo $_POST['email'];?></p>
                        </div>

                    <?php
                    }
                }
                else {
                    echo "<meta http-equiv='refresh' content='2.5;URL=page_inscription.php'>"; ?>

                    <div class="flex justify-center items-center h-screen">
                        <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-red-600">Votre mot de passe ne respecte pas les critères !</p>
                    </div>

                <?php
                }
            }
            else {
                echo "<meta http-equiv='refresh' content='2.5;URL=index.php'>"; ?>

                    <div class="flex justify-center items-center h-screen">
                        <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-red-600">Vous avez déjà un compte</br>Identifiez vous !</p>
                    </div>

                <?php
                
            }

    }

    else {
    echo "<meta http-equiv='refresh' content='2.5;URL=page_inscription.php'>"; ?>

    <div class="flex justify-center items-center h-screen">
        <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-red-600">Il manque un élément dans le formulaire !</p>
    </div>

     <?php
    }  
    
    $bdd = null;

    ?>




   

</body>

</html>