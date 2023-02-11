<?php
if(isset($_POST['action'])){
    include("db.php");
    if($_POST['action']=="send"){
        session_start();
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
            $userId = $user['id'];
            $text = $_POST['text'];
            $mysql->query("INSERT INTO chat(user_id,message) VALUES('$userId','$text')");
        }
    }
    else if($_POST['action']=="update"){
        session_start();
        $result = $mysql->query("SELECT * FROM chat LIMIT 50");
        $messages = array();
        while ($message = $result->fetch_array()){
            $uid = $message['user_id'];
            $mUser = $mysql->query("SELECT concat(firstname,' ',lastname) as fl FROM accounts WHERE id='$uid'")->fetch_array();
            array_push($messages,array(
                "author"=>$mUser['fl'],
                "text"=>$message['message']
            ));
        }
        
        echo json_encode(array_reverse($messages));

    }
}

?>