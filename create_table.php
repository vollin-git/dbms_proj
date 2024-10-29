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
// Creating Menu Table
$sql="CREATE TABLE Menu (
    Item_ID INT AUTO_INCREMENT PRIMARY KEY,
    Item_Name VARCHAR(100) NOT NULL,
    Quantity INT NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    Description TEXT
)";


$result=mysqli_query($conn,$sql);
echo"<br>";
if($result){
    echo " table created";
}
else{
    echo " table not created".mysqli_error($conn);
}
