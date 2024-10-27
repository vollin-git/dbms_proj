<?php
echo " trying to create table" ;

// connecting to the database
$servername ="localhost";
$username ="root";
$password ="";
$database="customers";

//create a connection
$conn = mysqli_connect($servername,$username,$password,$database); 

if(!$conn){
    die("sorry failed to connect". mysqli_connect_error());
}
echo "<br>";
echo " connection  successful ";

//create a table in db
$sql = "CREATE TABLE customers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50)
)";

$result=mysqli_query($conn,$sql);
echo"<br>";
if($result){
    echo " table created";
}
else{
    echo " table not created".mysqli_error($conn);
}
