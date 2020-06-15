<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "demo_mvc";

// create connection
$conn = new mysqli($servername, $username, $password);
// check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully\n";

// create database
$db= "CREATE DATABASE demo_mvc";
if ($conn->query($db) === TRUE) {
    echo "Database created sucessfully\n";
}else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();

// create connection
$conn1 = new mysqli($servername, $username, $password, $dbname);
// check connection
if (!$conn1) {
    die("Connection failed: " . $conn1->connect_error); 
}

// create table
$table = " CREATE TABLE posts (
    id INT(6) AUTO_INCREMENT UNIQUE PRIMARY KEY,
    title varchar(255),
    content text
)";
if ($conn1->query($table) === TRUE) {
    echo "Table allposts Created successfully";
}else {
    echo "Error creating table: " . $conn1->error;
}
?>
