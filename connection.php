<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name="project";

// Create connection
$conn= mysqli_connect($hostname, $username, $password,$db_name);

// Check connection
if (!$conn) {
echo"Connection failed: ";
}
else{

     echo "Connected successfully";
    }
?>
 