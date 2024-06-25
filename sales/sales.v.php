<?php

function DisplaySalesStates(){
    $poucent = intval(GetTotalSalesRevenus($_SESSION['id'])) / 2200 * 100;
    echo '<div class="container mx-auto py-8">';
    echo '<div class="text-center">
        <div class="mb-4 text-left">
            <h1 class="text-xl font-bold">Chiffre du '.date('d/m/Y').'</h1>
            <p class="text-sm text-gray-600">actualisé à '.date('H:i:s').'</p>
        </div>
        <div class="relative flex items-center justify-center w-2/3 h-80 mx-auto my-20">
            <svg class="absolute w-full h-full transform" viewBox="0 -7 36 50">
                <path style="stroke: #E5E7EB; stroke-width: 2;" d="M18 2.0845
                a 15.9155 15.9155 0 0 1 0 31.831
                a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" />
                <path style="stroke: #065F46; stroke-width: 5; filter: drop-shadow(0 0 3px #000000); border-radius:5px;" d="M18 2.0845
                a 15.9155 15.9155 0 0 1 0 31.831
                a 15.9155 15.9155 0 0 1 0 -31.831" fill="none"
                stroke-dasharray="'.$poucent.', 100" />
            </svg>
            <div class="absolute text-2xl font-bold">'.round($poucent, 1).'%</div>
        </div>
        <div class="text-center">
            <p class="font-bold">Nombre de ventes : <span class="font-normal">'.GetTotalSales($_SESSION['id']).'</span></p>
            <p class="font-bold">Chiffre d\'affaire actuel : <span class="font-normal">'.number_format(GetTotalSalesRevenus($_SESSION['id']), 2, ',', ' ').' €</span></p>
            <p class="font-bold">Chiffre d\'affaire prévu : <span class="font-normal">2 200,00 €</span></p>
        </div>
    </div>';
    echo '</div>';
}