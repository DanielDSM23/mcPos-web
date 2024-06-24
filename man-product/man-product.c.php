<?php
require_once("nav/nav.v.php");
require_once("man-product/man-product.m.php");
require_once("man-product/man-product.v.php");


if(isset($_SESSION['id'])){
    DisplayNavBar(1);
    
    DisplayProducts();

}
else{
    header("Location: index.php");
}