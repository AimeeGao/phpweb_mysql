<?php
$servername = "localhost";
$username = "root";
$password = "123456";

// Create connection
$conn = new mysqli($servername, $username, $password, "test");

// Check connection
if ($conn->connect_error) {
    echo "die";
}

if (mysql_query("CREATE DATABASE my_db",$conn))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

echo "Connected successfully";
?>
