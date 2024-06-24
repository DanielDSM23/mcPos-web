<?php
require_once("nav/nav.v.php");
require_once("man-product/man-product.m.php");
require_once("man-product/man-product.v.php");


if(isset($_SESSION['id'])){
    DisplayNavBar(1);
    if(!isset($_GET['product'])){
        DisplayProducts();
    }
    if(isset($_GET['product'])){
        DisplayProductInfos($_GET);
    }

}
else{
    header("Location: index.php");
}