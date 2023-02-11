<?php
if(isset($_POST['category'])){
    include("db.php");
    $category = $_POST['category'];
    if($category=="all"){
        $result = $mysql->query("SELECT * FROM catalog LIMIT 32");
    }
    else{
        $result = $mysql->query("SELECT * FROM catalog WHERE category='$category' LIMIT 32");
    }
    $array = array();
    while($product = $result->fetch_assoc()){
        array_push($array,$product);
    }
    echo json_encode($array);
}

?>
