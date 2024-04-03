<?php
session_start();
include('includes/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $province = $_POST['province'];
    $cardNumber = $_POST['creditcard']; 
    $cardExpiryMonth = $_POST['expirydate']; 
    $cardExpiryYear = $_POST['year']; 

    // Insert data into the database
    $sql = "INSERT INTO orders (email, phone, name, address, city, postcode, province, cardNumber, cardExpiryMonth, cardExpiryYear) 
            VALUES ('$email', '$phone', '$name', '$address', '$city', '$postcode', '$province', '$cardNumber', '$cardExpiryMonth', '$cardExpiryYear')";

    if ($db->query($sql) === TRUE) {
        // Return inserted data as response
        $response = array(
            'rname' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'postcode' => $postcode,
            'province' => $province,
            'cardNumber' => $cardNumber,
            'cardExpiryMonth' => $cardExpiryMonth,
            'cardExpiryYear' => $cardExpiryYear
        );
        
        // Construct multiline response text
        $responseText = "Customer Name: " . $response['customername'] . "<br>";
        $responseText .= "Email: " . $response['email'] . "<br>";
        $responseText .= "Phone: " . $response['phone'] . "<br>";
        $responseText .= "Address: " . $response['customeraddress'] . "<br>";
        $responseText .= "City: " . $response['city'] . "<br>";
        $responseText .= "Postcode: " . $response['postcode'] . "<br>";
        $responseText .= "Province: " . $response['province'] . "<br>";
        $responseText .= "Card Number: " . $response['cardNumber'] . "<br>";
        $responseText .= "Card Expiry Date: " . $response['cardExpiryMonth'] . "/" . $response['cardExpiryYear'] . "<br>";
        echo $responseText;

    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
} else {
    echo "Invalid request method!";
}
?>
