<?php 
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    if($user['admin']==1){
        header("Location: admin.php");
    }
    else{
        header("Location: catalog.php");
    }
}
# 100 - no login 101 - no firstname 102 - no lastname 103 - no phone 104 - no password 
# 105 - login is exists 106 - firstname and lastname is exists 107 - phone is exists
# 777 - success
if(isset($_POST['login']) && $_POST['login']!=null){ $login = $_POST['login'];}else{ echo "Ви не ввели логін"; die();}
if(isset($_POST['password']) && $_POST['password']!=null){ $password = md5($_POST['password']);}else{ echo "Ви не ввели пароль"; die();}
    include("db.php");
    $result = $mysql->query("SELECT * FROM accounts WHERE login='$login' AND password='$password'")->fetch_array();
    if(isset($result['id'])){
        $_SESSION['user'] = $result;
        if($result['admin']==1){
            echo 1;
        }
        
        else{
            echo 0;
        }
    }
    else{
        echo "Логін або пароль неправильний";
    }
?>