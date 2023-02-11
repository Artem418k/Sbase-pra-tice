<?php
$host="localhost"; 
$userDB="root"; 
$pass=""; 
$db="work_shop";
$mysql = new mysqli($host,$userDB,$pass,$db);
if ($mysql->connect_error) {
    die("Помилка сервера, спробуйте пізніше.");
}
?>
