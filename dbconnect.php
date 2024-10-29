<?php


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



?>