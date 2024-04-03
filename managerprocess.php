<?php
session_start();
include('includes/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security

    // Insert data into the database
    $sql = "INSERT INTO users (username, password, role) 
            VALUES ('$username', '$password', 'manager')";

    if ($db->query($sql) === TRUE) {
        $response = array(
            'name' => $username,
        );

        echo "Manager named '$username' created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
} else {
    echo "Invalid request method!";
}
?>
