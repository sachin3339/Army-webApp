<?php
//Start the session to see if the user is authenticated user. 

$id = $_POST['id']; 
$alive = $_POST['alive']; 
$waryear = $_POST['waryear']; 
$pincode = $_POST['pincode']; 

//If all validations are correct, connect to MySQL and execute the query 

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
$query = "INSERT INTO soldierstatus VALUES ('$id','$alive','$waryear','$pincode')"; 
//Execute query 
$results = mysqli_query($link,$query); 
 
//Check if query executes successfully 
if($results == FALSE) 
{echo mysqli_error($link) ; }
else
    {

        echo '<script language="javascript">';
        echo 'alert("Successfully Registered"); location.href="Status.php"';
        echo '</script>';
    }  

 
 


 
?>
