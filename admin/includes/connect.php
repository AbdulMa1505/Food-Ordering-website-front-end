<?php
$server ='localhost';
$dbname ='restaurant';
$user ='root';
$password ='';
$conn =new PDO("mysql:host=$server;dbname=$dbname", $user,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if(!$conn){
    die("mysqli.error").mysqli_error();
}

?>