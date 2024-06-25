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
                echo '<button onclick="window.location.href = \'index.php?target=man-product/man-product.c.php&product='.$product["id"].'\';" class="cursor-pointer bg-green-900 text-white w-32 rounded-xl p-2 my-5">Voir Details</button>';
            echo '</div>';
        }
        echo '</div>';
    echo '</div>';
}



function DisplayProductInfos($IN, $success = null){
    $product = GetProductInfo($IN);
    $categories = GetAllCatgories();
    $locations = GetAllLocations();
    $translationCatgory = GetAllTranslations();
    echo '<div class="container mx-auto mt-10">';
    $products = GetAllProducts();
    echo '<div class="container mx-auto py-8">';
    if($success){
        DisplaySuccess('Vos modifications ont été prises en compte');
    }
    if($success == false && $success != null){
        DisplayError("Une erreur s'est produite");
    }
    echo '
        <form method="post" class="bg-white p-8 rounded-xl">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-4">
                    <h1 class="mt-4 font-semibold text-2xl">'.htmlspecialchars($product["name_kiosk"]).'</h1>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-4" required>
                    <img class="h-64 w-64" src="'.htmlspecialchars($product["image_url_kiosk"]).'" alt="'.htmlspecialchars($product["name_kiosk"]).'">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-4" required>
                    <label for="name" class="block text-gray-700">Nom du produit borne</label>
                    <input type="text" id="name" name="name_kiosk" class="w-full p-2 border rounded-xl" value="'.htmlspecialchars($product["name_kiosk"]).'">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-4" required>
                    <label for="is_disabled" class="block text-gray-700">Est désactivé</label>
                    <input type="checkbox" id="is_disabled" name="is_disabled" class="p-2 border rounded-xl" '.(boolval($product["is_disabled"]) ? "checked" : '').'  value="true">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-4" required>
                    <label for="name_kiosk" class="block text-gray-700">Nom du produit caisse</label>
                    <input type="text" id="name_kiosk" name="name" class="w-full p-2 border rounded-xl" value="'.htmlspecialchars($product["name"]).'">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-4">
                    <label for="location" class="block text-gray-700">Emplacement sur la caisse</label>';
                    
                    echo'<select id="location" name="location" class="w-full p-2 border rounded-xl" required>';
                        foreach($locations as $location){
                            echo '<option value="'.htmlspecialchars($location['id_location']).'" '.(($product["location"] == $location['id_location']) ? 'selected' : '' ).'>'.htmlspecialchars($location['description']).'</option>';
                        }
                echo '</select>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-4">
                    <label for="price" class="block text-gray-700">Prix</label>
                    <input type="number" id="price" name="price" class="w-full p-2 border rounded-xl" value="'.htmlspecialchars($product["price"]).'" required>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-4">
                    <label for="image_url_kiosk" class="block text-gray-700">URL de l\'image</label>
                    <input type="text" id="image_url_kiosk" name="image_url_kiosk" class="w-full p-2 border rounded-xl" value="'.htmlspecialchars($product["image_url_kiosk"]).'" required>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-4">
                    <label for="category" class="block text-gray-700">Catégorie</label>';
                    echo '<select id="category" name="category" class="w-full p-2 border rounded-xl" required>';
                        foreach($categories as $category){
                            echo '<option value="'.htmlspecialchars($category['name']).'" '.(($product["category"] == $category['name']) ? 'selected' : '' ).'>'.htmlspecialchars($translationCatgory[$category['name']]).'</option>';
                        }
                echo '</select>
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="cursor-pointer bg-green-900 text-white w-32 rounded-xl p-2 my-5">Modifier</button>
            </div>
        </form>
    </div>';
}



function DisplaySuccess($msg){
    echo'<div class="flex justify-center items-center">
        <div class="rounded border bg-green-100 px-4 py-2 text-green-700 w-1/2" role="alert">
            
            <p class="text-center"><strong>Succès!</strong> '.$msg.'</p>
        </div>
    </div>';
}

function DisplayError($msg) {
    echo '<div class="flex justify-center items-center">
        <div class="rounded border bg-red-100 px-4 py-2 text-red-700 w-1/2" role="alert">
            <p class="text-center"><strong>Erreur!</strong> ' . htmlspecialchars($msg) . '</p>
        </div>
    </div>';
}