<?php

require_once("database/connection.php");

function GetAllProducts() {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM product WHERE name_kiosk != "" AND id NOT IN (SELECT product_id FROM menu) ORDER BY category;');
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


function GetProductInfo($IN) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM `product` WHERE id=:id');
    $stmt->execute(array('id' => $IN['product']));
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $singleProduct = [];
    if($stmt->rowCount() > 0){ 
        $id = $product['id'];
        $name = $product['name'];
        $isDisabled = $product['is_disabled'];
        $nameKiosk = $product['name_kiosk'];
        $location = $product['location'];
        $price = $product['price'];
        $imageForground = $product['image_forground'];
        $imageUrlKiosk = $product['image_url_kiosk'];
        $imageCheckout = $product['image_checkout'];
        $category = $product['category'];
        $singleProduct = [
            'id' => $id,
            'name' => $name,
            'name_kiosk' => $nameKiosk,
            'location' => $location,
            'price' => $price,
            'image_forground' => $imageForground,
            'image_url_kiosk' => $imageUrlKiosk,
            'image_checkout' => $imageCheckout,
            'category' => $category, 
            'is_disabled' => $isDisabled
        ];
    }
    
    return $singleProduct;
}


function GetAllCatgories(){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM `category` WHERE 1;');
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    $allCategories = [];
    foreach ($categories as $category) {
        $singleCategory = [
            'name' => $category['name']
        ];
        $allCategories[] = $singleCategory;
    }
    return $allCategories;
}

function GetAllLocations(){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM `location` WHERE 1;');
    $stmt->execute();
    $locations = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    $allLocations = [];
    foreach ($locations as $location) {
        $singleLocation = [
            'id_location' => $location['id_location'],
            'description' => $location['description']
        ];
        $allLocations[] = $singleLocation;
    }
    return $allLocations;
}

function GetAllTranslations(){
    return [
        'beverage' => 'Les Boissons, Les Salades',
        'dessert' => 'Les Desserts',
        'fries' => 'Les Frites',
        'kitchen' => 'Les Burgers',
        'sauce' => 'Les Sauces'
    ];
}


function UpdateProductById($id, $IN){
    if(!is_numeric($IN['price'])){
        return false;
    }
    try{
        $isDisabled = 0;
        if(isset($IN['is_disabled'])){
            $isDisabled = 1;
        }
        global $pdo;
        $stmt = $pdo->prepare('UPDATE `product` SET `name`=:name,`is_disabled`=:is_disabled,`name_kiosk`=:name_kiosk,`location`=:location,`price`=:price,`image_url_kiosk`=:image_url_kiosk,`category`=:category WHERE `id` = :id');
        $stmt->execute(array(
            'name' => $IN['name'],
            'price' => $IN['price'],
            'category' => $IN['category'],
            'is_disabled' => $isDisabled,
            'name_kiosk' => $IN['name_kiosk'],
            'location' => $IN['location'],
            'image_url_kiosk' => $IN['image_url_kiosk'],
            'id' => $id
        ));
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        return true;
    }
    catch (\PDOException $e) {
        return false;
    }
    
    
}