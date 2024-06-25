<?php
require_once("nav/nav.v.php");
require_once("man-product/man-product.m.php");
require_once("man-product/man-product.v.php");


if(isset($_SESSION['id'])){
    $success = null;
    DisplayNavBar(1);
    if(isset($_POST['name_kiosk']) && isset($_POST['name_kiosk']) && isset($_POST['location']) && isset($_POST['price']) && isset($_POST['image_url_kiosk']) && isset($_POST['location']) && isset($_GET['product'])){
        $success = UpdateProductById($_GET['product'], $_POST);
    }
    if(!isset($_GET['product'])){
        DisplayProducts();
    }
    if(isset($_GET['product'])){
        DisplayProductInfos($_GET, $success);
    }


}
else{
    header("Location: index.php");
}