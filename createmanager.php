<?php
session_start();
include('includes/db_connection.php');
if(!isset($_SESSION['username']) || $_SESSION['username'] != "admin"){ 
  header('Location:login.php');
  exit();
}
else{
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
    <link rel="stylesheet" type="text/css" href="css/createmanager.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#form').on('submit', function(e){
            e.preventDefault(); 
            
            // Fetch the form data
            var formData = $(this).serialize();

            // AJAX call
            $.ajax({
                type: 'POST',
                url: 'managerprocess.php',
                data: formData,
                success: function(response){
                    // Update receipt section with received data
                    $('#formResult').html(response);
                },
                error: function(xhr, status, error){
                    // Handle error response
                    console.error(xhr.responseText);
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
    </script>
</head>

<body>
  <div class="container">
        <header class="header">
            <h1 class="green-text">QUANTUMBYTE SOLUTIONS</h1>
        </header>
    <div class="nav"> <?php include('includes/nav.php'); ?> </div >

    <div class="message">
        <?php
            if(isset($_SESSION['username'])){
            echo "Welcome ". $_SESSION['userrole']." : ". $_SESSION['username'];
            }
        ?>
    </div> 

    <div class="main-container createmanager">
            <div class="form-page">
            <form name="form" id="form" method="Post" action="">
                    <div class="slider">

                        <h1>Create New Manager</h1>
                        <br>
                        <label>Username</label>
                        <input id="username" type="text" name="username" require><br/>

                        <label>Password</label>
                        <input id="password" type="password" name="password" require><br/>

                        <label>Confirm Password</label>
                        <input id="confirmpassword" type="password" name="confirmpassword" require><br />

                        <br><br>

                        <input type="submit" value="Create" name="submit">
                        <div class="message">
                            <h3 id="formResult"></h3>
                        </div>
                    </div>
                </form>
            </div>
            </div>
    </div>
    <footer>
        <p>&copy; 2024 QUANTUMBYTE SOLUTIONS PVT LTD. All rights reserved.</p>
    </footer>
    </body>
</html>
<?php
}


