<?php 
  session_start();
  session_destroy(); // deletes the session
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Assignment 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/logout.css">
</head>
<body>
<header class="header">
            <h1 class="green-text">QUANTUMBYTE SOLUTIONS</h1>
</header>
<div class="nav">
<?php include('includes/nav.php'); ?>
</div>
  <main>
  

    <div class="logout slider">
        <?php 
            echo 'Successfully logged out!';
        ?>
    </div>
  </main>
    
</body>
</html>




