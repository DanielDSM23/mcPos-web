<?php

function DisplayAuth(){
    echo'<div class="bg-green-900 text-white py-2">
        <div class="container mx-auto flex justify-center items-center">
            <div class="flex-shrink-0">
                <img class="h-12" src="img/logo.png" alt="Logo">
            </div>
        </div>
    </div>
    <div class="bg-green-900 bg-cover bg-center h-screen" style="background-image: url(\'img/bg.jpeg\');">
       <div class="flex items-center justify-center h-screen">
        <div class="bg-white rounded p-4 flex flex-col w-2/6 justify-center content-center items-center">
            <select id="monselect" class="m-5 p-2 border-2 border-gray">
                <option disabled selected>Selectionner votre identifiant</option>
                <option value="valeur1">Valeur 1</option>
                <option value="valeur2">Valeur 2</option>
                <option value="valeur3">Valeur 3</option>
            </select>
            <input placeholder="Entrer votre mot de passe" class="m-5 p-2 border-2 border-gray"/>
            <input rel="shortcut icon" href="/path/to/your/favicon.ico" type="submit" class="cursor-pointer bg-green-900 text-white w-20 rounded-xl p-2">
        </div>
       </div>
    </div>'; 

}