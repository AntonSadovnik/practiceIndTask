<?php
try{
    $conn = new PDO("mysql:host=localhost;dbname=practice","root","root");
    if(empty($_POST["name"]).exit("Field is empty"));
    if(empty($_POST["email"]).exit("Field is empty"));
    if(empty($_POST["message"]).exit("Field is empty"));

    $query = "INSERT INTO user_message VALUES (NULL, :name, :email, :message)";
    $msg=$conn->prepare($query);
    $msg->execute(["name" => $_POST["name"], "email" => $_POST["email"], "message" => $_POST["message"]]);

    $msg_id = $conn->lastInsertId();

    $query="INSERT INTO users VALUES (NULL, :name, :email)";
    $msg = $conn->prepare($query);
    $msg->execute(["name" => $_POST["name"], "email" =>$_POST["email"]]);

    
}
catch(PDOException $e){
    echo "error".$e->getMessage();
}
?>