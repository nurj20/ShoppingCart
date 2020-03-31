<?php

$host='localhost:3306';
$username= "root";
$pwd = "root";
$dbname="shoppingcartdb";


$conn = new mysqli($host, $username, $pwd, $dbname);
if($conn->connect_error){
     dies("connection error ". $conn->connect_error);
}

$sql = "select * from shopping_card;";

$result = $conn->query($sql);

session_start();


