<?php


function DisplayProducts(){
    $products = GetAllProducts();
    echo '<div class="container mx-auto py-8">';
        echo '<div class="grid grid-cols-1 md:grid-cols-3 gap-8">';
        foreach($products as $product){
            if($product['categoryName'] != ''){
                echo "</div>";
                echo '<h1 class="text-center text-3xl my-10">'.$product['categoryName'].'</h1>';
                echo '<div class="grid grid-cols-1 md:grid-cols-3 gap-8">'; 
            }
            echo '<div class="bg-white flex flex-col items-center py-11 border-solid border-2 border-gray-200 rounded">';
                echo '<img class="h-32 w-32" src="'.$product["image_url_kiosk"].'" alt="'.$product["name_kiosk"].'">';
                echo '<p class="mt-4 text-center font-semibold">'.$product["name_kiosk"].'</p>';
                echo '<button onclick="window.location.href = \'index.php?man-product/man-product.c.php&product='.$product["id"].'\';" class="cursor-pointer bg-green-900 text-white w-32 rounded-xl p-2 my-5">Voir Details</button>';
            echo '</div>';
        }
        echo '</div>';
    echo '</div>';
}