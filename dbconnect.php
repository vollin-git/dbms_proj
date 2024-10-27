<?php
echo " trying to connect to db" ;

// connecting to the database
$servername ="localhost";
$username ="root";
$password ="";

//create a connection
$conn = mysqli_connect($servername,$username,$password); 

if(!$conn){
    die("sorry failed to connect". mysqli_connect_error());
}
echo "<br>";
echo " connection  successful ";


//creating a db
$sql = "CREATE DATABASE customers";
mysqli_query($conn,$sql);
?>