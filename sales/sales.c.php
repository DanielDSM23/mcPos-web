<?php
require_once('nav/nav.v.php');
require_once('sales/sales.m.php');
require_once('sales/sales.v.php');


if(isset($_SESSION['id'])){
    DisplayNavBar(2);
    DisplaySalesStates();
}
else{
    header("Location: index.php");
}