<?php


$user = $_POST['user'];
$pass = $_POST['pas'];
if(isset($_POST['SignIn']))
{
    if ($user=='sachin' && $pass=='123456') 
    {
        header('User.html');
    }
    else
    {
        echo"unscccessful login";
    }
}
?>