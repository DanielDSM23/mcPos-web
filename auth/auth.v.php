<?php

function DisplayAuth(){
    $users = GetAllUsers();
    echo '<style>';
        echo 'body { overflow: hidden; }';
    echo '</style>';
    echo '<div class="bg-green-900 bg-cover bg-center h-screen shadow-xl" style="background-image: url(\'img/bg.jpeg\');">';
        echo '<div class="flex items-center justify-center h-screen">';
            echo '<div class="bg-white rounded p-16 flex flex-col w-1/3 justify-center content-center items-center">';
                echo '<h1 class="text-3xl my-5">Connexion</h1>';
                echo '<form method="post" action="" class="w-full flex flex-col items-center">';
                    echo '<select  class="m-5 p-2 border-2 border-gray w-full" name="id" required>';
                        echo '<option disabled selected class="text-gray-500" value="">Spécifier votre identifiant</option>';
                        foreach ($users as $user){
                            echo '<option  value"'.$user.'">'.$user.'</option>';
                        }
                    echo '</select>';
                    echo '<input placeholder="Entrer votre mot de passe" class="m-5 p-2 border-2 border-gray w-full" type="password" name="password" required/>';
                    echo '<div class="w-full flex justify-center">';
                        echo '<input type="submit" class="cursor-pointer bg-green-900 text-white w-32 rounded-xl p-2 my-5" value="Se connecter">';
                    echo '</div>';
                echo '</form>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
}


