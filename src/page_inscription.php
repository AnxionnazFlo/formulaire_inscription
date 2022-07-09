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
    <div class="flex items-center h-screen mx-auto container p-1">

        <div class="border-2 border-solid border-gray-400 p-8 rounded-lg mx-auto my-auto shadow-2xl">
            <p class="text-center text-white text-3xl p-8 border-2 border-solid shadow border-gray-400 rounded bg-blue-600">Formulaire d'inscription</p>
            <form class="text-center p-8" action="inscription_bdd.php" method="POST">
                <div class="flex">
                    <div class="">
                        <div class="relative mr-3">
                            <input pattern="^[a-zA-Z]+$" class="invalid:border-red-600 peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-600" type="text" name="first_name" id="floating_input" placeholder=" " />
                            <label for="floating_input" class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Prénom</label>
                        </div>
                    </div>
                    <div class="">
                        <div class="relative ml-3">
                            <input pattern="^[a-zA-Z]+$" class="invalid:border-red-600 peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-600" type="text" name="last_name" id="floating_last_name" placeholder=" " />
                            <label class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm" for="floating_last_name">Nom</label>
                        </div>
                    </div>
                </div>

                <div class="relative mt-4">
                    <input pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" class="invalid:border-red-600 peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-600" type="password" name="password" id="password" placeholder=" " />
                    <label class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm" for="password">Mot de passe</label>
                </div>
                <div class="text-sm text-slate-400 p-1 my-1">8 caractères min, dont un chiffre une majuscule et une minuscule</div>
                <div class="relative mt-4">
                    <input pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" class="invalid:border-red-600 peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-600" type="password" name="password_verif" id="password_verif" placeholder=" " />
                    <label for="password_verif" class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Vérification du mot de passe</label>
                </div>
                <div class="relative mt-4">
                    <input class="invalid:border-red-600 peer h-10 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-600" type="email" name="email" id="email" placeholder=" " />
                    <label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Adresse email</label>
                </div>

                <div class="flex justify-center">
                    <div class="border-2 border-solid border-x-gray-400 rounded-md mt-6 bg-blue-600">
                        <button type="submit" class="text-white p-1">S'inscrire</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</body>

</html>