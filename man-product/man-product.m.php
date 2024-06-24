<?php

require_once("database/connection.php");


function GetAllProducts() {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM `product` WHERE name_kiosk != "" ORDER BY category;');
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $namesCategory = [
        'beverage' => 'Les Boissons, Les Salades',
        'dessert' => 'Les Desserts',
        'fries' => 'Les Frites',
        'kitchen' => 'Les Burgers',
        'sauce' => 'Les Sauces'
    ];

    $allProducts = []; 
    $element = 0;
    $oldCategory = "";
    foreach ($products as $product) {
        $categoryName = '';
        if($element == 0){
            $categoryName = isset($namesCategory[$product['category']]) ? $namesCategory[$product['category']] : $product['category'];
        }
        else{
            if($oldCategory != $product['category']){
                $categoryName = isset($namesCategory[$product['category']]) ? $namesCategory[$product['category']] : $product['category'];;
            }
        }
        $singleProduct = [
            'id' => $product['id'],
            'name' => $product['name'],
            'name_kiosk' => $product['name_kiosk'],
            'location' => $product['location'],
            'price' => $product['price'],
            'image_forground' => $product['image_forground'],
            'image_url_kiosk' => $product['image_url_kiosk'],
            'category' => $product['category'],
            'categoryName' => $categoryName,
        ];
        $allProducts[] = $singleProduct;
        $element++;
        $oldCategory = $product['category'];
    }

    return $allProducts;
}

