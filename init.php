<?php
//Connection to database
$server = "localhost";
$username = "root";
$password = "";

//Create connection
$connection = mysqli_connect($server, $username, $password);
//Check connection
if(!$connection) {
    die("Connection failed: ".mysqli_connect_error()."<br>");
}

//Creating database if not available
$createDatabase = "CREATE DATABASE IF NOT EXISTS android_test";
if(!mysqli_query($connection, $createDatabase)) {
    echo "Cannot create database";
}

//After creating database, go to database
mysqli_query($connection, "USE android_test");


//Create the table for return transaction
$create_table = "CREATE TABLE IF NOT EXISTS returnTransaction(queueNumber INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(20) NOT NULL, FOREIGN KEY userToSubmit(username) REFERENCES login_id(username), name VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, phoneNumber VARCHAR(12) NOT NULL, product VARCHAR(255) NOT NULL, qty INT(3) NOT NULL, status BOOLEAN NOT NULL DEFAULT FALSE)";
//Check if the table is exist
if(!mysqli_query($connection,$create_table)) {
    echo "Cannot create table";
}

//Create the table for login member
$create_table = "CREATE TABLE IF NOT EXISTS login_id (username VARCHAR(20) NOT NULL PRIMARY KEY, password VARCHAR(50) NOT NULL);";
//Check if the table is exist
if(!mysqli_query($connection,$create_table)) {
    echo "Cannot create table";
}
?>