<?php
session_start();
include('includes/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username already exists
    $checkuser= "SELECT * FROM users WHERE username = '$username'";
    $result = $db->query($checkuser);

    if ($result->num_rows > 0) {
        // Username already exists
        echo "Error: Username '$username' already exists. Please choose a different username.";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO users (username, password, role) 
                VALUES ('$username', '$password', 'manager')";

        if ($db->query($sql) === TRUE) {
            $response = array(
                'username' => $username,
            );
            echo "Manager named '$username' created successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }

    $db->close();
} else {
    echo "Invalid request method!";
}
?>
