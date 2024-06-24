<?php
require_once("auth/auth.m.php");
require_once("auth/auth.v.php");

if(isset($_POST['id']) && isset($_POST['password'])){
    RecoverUserInfos($_POST);
}
if(!isset($_SESSION['id'])){
    DisplayAuth();

}
else{
    header("Location: index.php?target=man-product/man-product.c.php");
}



