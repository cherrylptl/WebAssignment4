<?php
$servername = 'localhost'; 
$username = 'root';  
$password = '';
$dbname = 'quantumbyte'; 

// create a connection
$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_error)
{
    die('Something is not working. Please come back later....');
}
