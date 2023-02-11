<?php
if(isset($_POST['action']) && isset($_POST['id'])){
    include("db.php");
    if($_POST['action']=="add"){
        session_start();
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
            $userId = $user['id'];
            $productId = $_POST['id'];
            $ip ='registered';
            $result = $mysql->query("INSERT INTO basket(user_id,product_id,count,ip) VALUES('$userId','$productId',1,'$ip')");
        }
        else{
            $userId = 0;
            $productId = $_POST['id'];
            $ip = $_SERVER['REMOTE_ADDR'];
            $mysql->query("INSERT INTO basket(user_id,product_id,count,ip) VALUES('$userId','$productId',1,'registered')");
        }
    }
    
    else if($_POST['action']=="remove"){
        session_start();
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
            $userId = $user['id'];
            $productId = $_POST['id'];
            $mysql->query("DELETE FROM basket WHERE user_id='$userId' AND product_id='$productId'");
        }
        else{
            $productId = $_POST['id'];
            $ip = $_SERVER['REMOTE_ADDR'];
            $mysql->query("DELETE FROM basket WHERE ip='$ip' AND product_id='$productId'");
        }
    }
}

?>