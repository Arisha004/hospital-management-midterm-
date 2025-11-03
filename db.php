<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="midterm";
/*$conn  a variable that holds the database connection.
new mysqli creates a new connection to your MySQL database.*/
$conn=new mysqli($servername, $username, $password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}


?>