<?php
require_once("auth/auth.m.php");
require_once("auth/auth.v.php");


if(!isset($_SESSION['name'])){
    DisplayAuth();

}
else{
    echo 'test';
}


if(isset($_POST['id']) && isset($_POST['password'])){
   
    RecoverUserInfos($_POST);
}

