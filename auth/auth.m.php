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
    echo "tets";
    // global $pdo;
    // $stmt = $pdo->prepare("SELECT * FROM `manager` WHERE username = :username");
    // $stmt->bindParam(':username', $IN['username'], PDO::PARAM_STR);
    // $stmt->execute();
    // if($stmt->rowCount() > 0){
    //     $user = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    //     $passwordDb = array_column($user, 'password')[0];
    //     $name = array_column($user, 'name')[0];
    //     $managerId = array_column($user, 'manager_id')[0];
    //     $role = array_column($user, 'manager_id')[0];
    //     var_dump(password_verify($IN['password'], $passwordDb));
    //     if(password_verify($IN['password'], $passwordDb)){
    //         $_SESSION['id'] = $managerId;
    //         $_SESSION['name'] = $name;
    //         $_SESSION['username'] = $IN['username'];
    //         $_SESSION['role'] = $role;
    //     }
    // }
    
}