<?php 
session_start();
if(isset($_SESSION['user']) && $_SESSION['user']['admin']==1){
    include("db.php");
    $res = $mysql->query("SELECT COUNT(*) as c FROM catalog")->fetch_array();
    $count = md5($res['c']+1);
    $target_dir = "../products/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $filename = $target_dir . $count.".".$imageFileType;
    if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
    || $imageFileType == "gif" ) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $filename);
    }
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $photo=$count.".".$imageFileType;
    echo($title);
    $mysql->query("INSERT INTO catalog(title,description,price,image,category) VALUES('$title','$description','$price','$photo','$category')");
}
header("Location: ../catalog.php");
?>
