<?php
session_start();
include('includes/db_connection.php');

//get tax rate based on province
function getTaxRate($province) {
    switch ($province) {
        case 'AB':
            return 0.05;
        case 'BC':
            return 0.12;
        case 'MB':
            return 0.12;
        case 'NB':
            return 0.15;
        case 'BFL':
            return 0.15;
        case 'NT':
            return 0.05;
        case 'NS':
            return 0.15;
        case 'NU':
            return 0.05;
        case 'ON':
            return 0.13;
        case 'PEI':
            return 0.15;
        case 'QU':
            return 0.14;
        case 'SA':
            return 0.11;
        case 'YU':
            return 0.05;
        default:
            return 0.0;
    }
}

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

   
    $products = array(
        array(
            'name' => 'Laptop',
            'quantity' => $_POST['product1'],
            'price' => 100
        ),
        array(
            'name' => 'Keyboard',
            'quantity' => $_POST['product2'],
            'price' => 5
        ),
        array(
            'name' => 'Mouse',
            'quantity' => $_POST['product3'],
            'price' => 4 
        ),
        array(
            'name' => 'Headphone',
            'quantity' => $_POST['product4'],
            'price' => 4 
        )
    );

    // Calculate total cost of all products
    $totalCost = 0;
    foreach ($products as $product) {
        $totalCost += $product['quantity'] * $product['price'];
    }

    // Calculate tax based on province
    $taxRate = getTaxRate($province);
    $taxAmount = $totalCost * $taxRate;

    // Calculate total amount 
    $totalAmount = $totalCost + $taxAmount;

    // Insert into the orders table
    $orderInsertSql = "INSERT INTO orders (email, phone, name, address, city, postcode, province, card_number, card_expiry_month, card_expiry_year, tax_amount, total_amount) 
            VALUES ('$email', '$phone', '$name', '$address', '$city', '$postcode', '$province', '$cardNumber', '$cardExpiryMonth', '$cardExpiryYear', '$taxAmount', '$totalAmount')";

    if ($db->query($orderInsertSql) === TRUE) {
       
        $orderID = $db->insert_id;

  
        foreach ($products as $product) {
            if ($product['quantity'] > 0) {
                $productName = $product['name'];
                $quantity = $product['quantity'];
                $price = $product['price'];
                $total = $quantity * $price;
                $productInsertSql = "INSERT INTO order_products (order_id, product_name, quantity, price, total) 
                                     VALUES ('$orderID', '$productName', '$quantity', '$price', '$total')";
                $db->query($productInsertSql);
            }
        }

        // Return Order Data
        $responseText = "<br>";
        $responseText .= "Name: $name<br>";
        $responseText .= "Email: $email<br>";
        $responseText .= "Phone: $phone<br>";
        $responseText .= "Address: $address<br>";
        $responseText .= "City: $city<br>";
        $responseText .= "Postcode: $postcode<br>";
        $responseText .= "Province: $province<br>";
        $responseText .= "Credit Card: $cardNumber<br>";
        $responseText .= "Expiry Date: $cardExpiryMonth/$cardExpiryYear<br>";

        $responseText .= "<br>List Of Products<br><br>";
        $responseText .= "<hr>";
        foreach ($products as $product) {
            if ($product['quantity'] > 0) {
                $responseText .= "Name: {$product['name']}<br>";
                $responseText .= "Quantity: {$product['quantity']}<br>";
                $responseText .= "Total Cost: $" . ($product['quantity'] * $product['price']) . "<br>";
                $responseText .= "<hr>";
            }
        }

        // Display tax details
        $responseText .= "<br>Tax: $ $taxAmount<br>";
        $responseText .= "Total Amount: $ $totalAmount<br>";

        echo $responseText;
    } else {
        echo "Error: " . $orderInsertSql . "<br>" . $db->error;
    }

    $db->close();
} else {
    echo "Invalid request method!";
}
?>
