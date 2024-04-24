<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "information"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("خطا في اتصال قاعدة البيانات  " . $conn->connect_error);
}
?>
