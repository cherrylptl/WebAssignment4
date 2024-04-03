<?php
//start session
session_start(); // get access to $_SESSION[]
include('includes/db_connection.php');

if(!empty($_POST)){ // check if the form was submitted
  $username = $db->real_escape_string($_POST['username']);
  $password = $db->real_escape_string($_POST['password']);

  $sqlQuery = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";

 /* echo $sqlQuery;
  exit;*/

  $sqlResult = $db->query($sqlQuery); // execute the query

  if($sqlResult->num_rows > 0) // if data is returned from DB
  {
    // iterate through the rows
    while($row = $sqlResult->fetch_assoc())
    {
      $_SESSION['username'] = $row['username'];
      //$_SESSION['type'] = $row['type']; // create a new column for your assignment and use it for the shop logic
      break;
    }
    header('Location:orders.php');
  }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Assignment 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
 
<body>
    <div class="container">
        <header class="header">
            <h1 class="green-text">QUANTUMBYTE SOLUTIONS</h1>
        </header>
    <div class="nav">
<?php include('includes/nav.php'); ?>

</div >
<div class="login">
                <form name="myform" method="POST" action="">
                    <div class="slider">

                        <h1>Login</h1>
                        <br>
                        <label>Username</label>
                        <input id="username" type="text" name="username"><br />

                        <label>Password</label>
                        <input id="password" type="password" name="password"><br />

                        <br><br>

                        <input type="submit" value="Login">
                    </div>
                </form>
                </div>
    </div>

    <footer>
        <p>&copy; 2024 QUANTUMBYTE SOLUTIONS PVT LTD. All rights reserved.</p>
    </footer>
</body>

</html>