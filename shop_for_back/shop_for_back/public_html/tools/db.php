<?php
$host="localhost"; 
$userDB="kernyab5_shop"; 
$pass="passforbd123!"; 
$db="kernyab5_shop";
$mysql = new mysqli($host,$userDB,$pass,$db);
if ($mysql->connect_error) {
    die("Помилка сервера, спробуйте пізніше.");
}
?>
