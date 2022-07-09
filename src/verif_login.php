<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification du login</title>
    <link href="../dist/output.css" rel="stylesheet">


</head>


<body>



    <?php
        $_POST['ident'] = htmlspecialchars($_POST['ident']);
        $_POST['passwordlog'] = htmlspecialchars($_POST['passwordlog']);
        $ident = $_POST['ident'];
        $passwordlog = $_POST['passwordlog'];

        


        if (!empty($_POST['ident']) && !empty($_POST['passwordlog'])) {

            /* connexion a la bdd */
            include('connexionbdd.php');

            /* try{
                $bdd = new PDO('mysql:host=localhost;bdname=users;charset=utf8', 'root', '');
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            } */

           /*  Ici on teste la presence du mail */

            $requete = $bdd->prepare('SELECT * FROM users.users WHERE email=?');
            $requete->execute([$ident]);
            $user = $requete->fetch();

        

            if ($user) {
                if (password_verify($passwordlog, $user['password'])){

                    /* On va essayer d'ouvrir une session et de stocker les nom et prenoms */
                    session_start();

                    $_SESSION['id'] = $user["id"];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    $_SESSION['email'] = $user['email'];

                    echo "<meta http-equiv='refresh' content='2.5;URL=index_connecte.php'>"; ?>

                    <div class="flex justify-center items-center h-screen">
                        <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-blue-600">Mot de passe correct !</p>
                    </div>
                
                <?php
                }
                else {
                    echo "<meta http-equiv='refresh' content='2.5;URL=index.php'>"; ?>

                    <div class="flex justify-center items-center h-screen">
                        <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-red-600">Mot de passe inccorect !</p>
                    </div>
                
                <?php
                }
               
            }
            else {
                echo "<meta http-equiv='refresh' content='2.5;URL=page_inscription.php'>"; ?>

            <div class="flex justify-center items-center h-screen">
                <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-red-600">Cet identifiant n'éxiste pas.</br>Veuillez vous inscrire.</p>
            </div>
        
        <?php
            }
            

           /* $username = $_POST['username'];
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
            $stmt->execute([$username]);                                        pour verifier que l'email existe
            $user = $stmt->fetch();
            if ($user) {
                // le nom d'utilisateur existe déjà
            } else { 
                // le nom d'utilisateur n'existe pas
            }  */

           /*  <?php
            $query = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $query->execute([$_POST['email']]);                                     pour verifier en meme temps le mot de passe
            $user = $query->fetch();
            if ($user && password_verify($_POST['pass'], $user['pass']))
            {
                echo "Identifiant valid!";
            } else {
                echo "Identifiant invalid!";
            }
            ?> */

        } 
        else {
            echo "<meta http-equiv='refresh' content='2.5;URL=index.php'>"; ?>

            <div class="flex justify-center items-center h-screen">
                <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-red-600">Il manque un élément dans le formulaire !</p>
            </div>
        
        <?php
        } 
        
        $bdd = null;
        
    ?>
    

</body>

</html>