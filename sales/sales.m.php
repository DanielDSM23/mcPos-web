<?php
require_once("database/connection.php");

function GetTotalSalesRevenus($idManager){
    global $pdo;
    $stmt = $pdo->prepare('SELECT SUM(price) AS total_sales_revenus FROM sale WHERE DATE(`date`) = CURDATE() AND manager_id = :id');
    $stmt->execute(array(
        'id' => $idManager
    ));
    $totalSalesRevenus = $stmt->fetch(PDO::FETCH_ASSOC);
    return $totalSalesRevenus['total_sales_revenus'];
}



function GetTotalSales($idManager){
    global $pdo;
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM `sale` WHERE manager_id = :id AND DATE(`date`) = CURDATE()');
    $stmt->execute(array(
        'id' => $idManager
    ));
    $totalSalesRevenus = $stmt->fetch(PDO::FETCH_ASSOC);
    return $totalSalesRevenus['COUNT(*)'];
}