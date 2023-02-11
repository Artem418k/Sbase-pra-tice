<?php 
session_start();
if(isset($_SESSION['user']) && $_SESSION['user']['admin']==1 && isset($_GET['id'])){
    include("db.php");
    $id = $_GET['id'];
    $mysql->query("DELETE FROM catalog WHERE id='$id'");
}
header("Location: ../catalog.php");
?>
