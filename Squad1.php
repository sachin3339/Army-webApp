<?php
//Start the session to see if the user is authenticated user. 

$squad = $_POST['squad']; 
$captain = $_POST['captain']; 
$year_no = $_POST['year_no']; 
$capacity = $_POST['capacity']; 

//If all valsquadations are correct, connect to MySQL and execute the query 

//Connect to mysql server 
$link = mysqli_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
//Select database 
$db = mysqli_select_db($link,'armydb'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Create Insert query 
$query = "INSERT INTO squads VALUES ('$squad','$captain','$year_no','$capacity')"; 
//Execute query 
$results = mysqli_query($link,$query); 
 
//Check if query executes successfully 
if($results == FALSE) 
{echo mysqli_error($link) ; }
else
    {

        echo '<script language="javascript">';
        echo 'alert("Successfully Registered"); location.href="Squad.php"';
        echo '</script>';
    }  

 
 


 
?>
