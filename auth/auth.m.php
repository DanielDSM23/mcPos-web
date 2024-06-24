<?php
require_once("database/connection.php");

function GetAllUsers(){
    global $pdo;
    $stmt = $pdo->prepare('SELECT `username` FROM `manager` ORDER BY username ASC');
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    $usernames = array_column($users, 'username');
    return $usernames;
}


function RecoverUserInfos($IN){
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM `manager` WHERE username = :username");
    $stmt->execute(array('username' => $IN['id']));
    $user = $stmt->fetch();
    if($stmt->rowCount() > 0){
        $passwordDb =  $user['password'];
        $name =  $user['name'];
        $managerId =  $user['manager_id'];
        $role = $user['role'];
        if(password_verify($IN['password'], $passwordDb)){
            $_SESSION['id'] = $managerId;
            $_SESSION['name'] = $name;
            $_SESSION['username'] = $IN['id'];
            $_SESSION['role'] = $role;
        }
    }
    
}