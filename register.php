<?php
require("database/database-config.php");
require("utilities.php");
$user_name = "admin1";
$password = "123";
$password = password_hash($password, PASSWORD_DEFAULT);
$full_name = "Admin1";
$user_type ="Admin";

$addUser = $sqlConn->query("INSERT INTO users(full_name, user_name, password) VALUES('$full_name','$user_name','$password');");

if($addUser){
    $selectLastRow = "SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1;";
    $runQuery = mysqli_query($sqlConn,$selectLastRow);
    $lastRow = mysqli_fetch_assoc($runQuery);
    $lastRow = $lastRow['user_id'];
    $addUserCategory = $sqlConn->query("INSERT INTO user_category(user_id, user_type) VALUES('$lastRow','$user_type');");

    if($addUserCategory){
        alert("User Added Successfuly","index.php");
    }
    else{
        alert("There was an error please try again","index.php");
    }
}
else{
    alert("There was an error please try again","index.php");
}
?>