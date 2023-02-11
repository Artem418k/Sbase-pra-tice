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
if(isset($_POST['firstname']) && $_POST['firstname']!=null){ $firstname = $_POST['firstname'];}else{ echo "Ви не ввели ім'я"; die();}
if(isset($_POST['lastname']) && $_POST['lastname']!=null){ $lastname = $_POST['lastname'];}else{ echo "Ви не ввели прізвище"; die();}
if(isset($_POST['phone']) && $_POST['phone']!=null){ $phone = $_POST['phone'];}else{ echo "Ви не ввели номер телефону"; die();}
if(isset($_POST['password']) && $_POST['password']!=null){ $password = md5($_POST['password']);}else{ echo "Ви не ввели пароль"; die();}
    include("db.php");
    $result = $mysql->query("SELECT * FROM accounts WHERE login='$login' OR (firstname='$firstname' AND lastname='$lastname') OR phone='$phone'")->fetch_array();
    if(!isset($result['id'])){
        $result = $mysql->query("INSERT INTO accounts(login,firstname,lastname,phone,password,admin) VALUES('$login','$firstname','$lastname','$phone','$password',0)");
        echo 777;
    }
    
    else{
        if($result['login']==$login){
            echo "Цей логін вже зайнятий";
        }
        else if($result['firstname']==$firstname && $result['lastname']==$lastname){
            echo "Користувач з таким іменем вже зареєстрований";
        }
        else if($result['phone']==$phone){
            echo "Телефон вже зареєстрований";
        }
        else{
            echo "Невідома помилка";
        }
    }
?>