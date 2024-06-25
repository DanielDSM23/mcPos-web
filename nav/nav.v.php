<?php


function DisplayNavBar($choice = null){
    $array = [false, false, false];
    if($choice != null){
        $array[$choice - 1] = true;
    }
    echo '<div class="w-64 bg-white h-screen-64 shadow-md sticky top-16">
            <div>
                <div class="cursor-pointer flex items-center space-x-2 py-4 '.($array[0] ? 'bg-gray' : '').'" onclick="window.location.href = \'index.php?target=man-product/man-product.c.php\';">
                    <i class="fa-solid fa-burger-lettuce fa-2xl ml-2'.($array[0] ? ' yellow-arch' : '').'"></i>
                    <span class="font-bold text-xl'.($array[0] ? ' yellow-arch' : ' text-black').'">Gestion Produits</span>
                </div>
                <div class="cursor-pointer flex items-center space-x-2 py-4 '.($array[1] ? 'bg-gray' : '').'" onclick="window.location.href = \'index.php?target=sales/sales.c.php\'">
                    <i class="fa-solid fa-coins fa-2xl ml-2'.($array[1] ? ' yellow-arch' : '').'"></i>
                    <span class="font-bold text-xl'.($array[1] ? ' yellow-arch' : ' text-black').'">Ventes</span>
                </div>';
                if($_SESSION['role'] == 'ADMIN'){
                    echo '<div class="cursor-pointer flex items-center space-x-2 py-4 '.($array[2] ? 'bg-gray' : '').'">
                    <i class="fa-solid fa-users fa-2xl ml-2'.($array[2] ? ' yellow-arch' : '').'"></i>
                    <span class="font-bold text-xl'.($array[2] ? ' yellow-arch' : ' text-black').'">Gestion Utilisateurs</span>
                </div>';
                }
                
            echo '</div>
        </div>
    ';
};