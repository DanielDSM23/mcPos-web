<?php
require_once("auth/auth.v.php");

if(!isset($_SESSION['user'])){
    DisplayAuth();

}

else{
    echo 'test';
}