<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title>Page de connexion</title>
</head>

<body class="">
    <div class="flex justify-center items-center mx-auto h-screen">
        <div class="border-2 border-solid border-gray-400 p-8 rounded-lg m-auto shadow-2xl">
            <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-blue-600">Accéder au site</p>

            <form class="text-center p-4" action="verif_login.php" method="POST">

                <div class="relative mx-1 my-3">
                    <input class="peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-600" type="email" name="ident" id="ident" placeholder=" " />
                    <label for="ident" class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Identifiant</label>
                </div>
                <div class="relative mx-1 my-3">
                    <input pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" class="invalid:border-red-600 peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-600" type="password" name="passwordlog" id="password" placeholder=" " />
                    <label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm" for="floating_last_name">Mot de passe</label>
                </div>
                <div class="flex justify-center">
                    <div class="border-2 border-solid border-x-gray-400 rounded-md mt-6 bg-blue-600">
                        <button type="submit" class="text-white p-1">Se connecter</button>
                    </div>
                </div>
            </form>
            <div class="text-center">
                <a href="page_inscription.php" class="text-sm opacity-95 text-blue-600">Créer un compte</a>
            </div>
        </div>
    </div>

</body>


</html>