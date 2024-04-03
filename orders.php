<?php
session_start();
include('includes/db_connection.php');
if(!isset($_SESSION['username'])){ // you will also have to check the user type for create shop manager page
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
    <link rel="stylesheet" type="text/css" href="css/order.css">
</head>

<body>
<header class="header">
            <h1 class="green-text">QUANTUMBYTE SOLUTIONS</h1>
</header>
<div class="nav">
<?php include('includes/nav.php'); ?>
</div>

<div class="welcome">
    <?php
    if(isset($_SESSION['username'])){
      echo "Welcome ". $_SESSION['username'];
    }
  ?>
</div>

<main class="orderContainer">
    <?php
    $sqlQuery = "SELECT * FROM `orders`";
    $sqlResult = $db->query($sqlQuery); // execute the query
    if ($sqlResult->num_rows > 0) // if data is returned from DB
    {
        // iterate through the rows
        while ($row = $sqlResult->fetch_assoc()) {
    ?>
            <div class="orderCard">
                <p><strong>Order Number:</strong> <?php echo htmlspecialchars($row['orderID']); ?></p>
                <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($row['name']); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($row['address']); ?></p>
                <p><strong>City:</strong> <?php echo htmlspecialchars($row['city']); ?></p>
                <p><strong>Postcode:</strong> <?php echo htmlspecialchars($row['postcode']); ?></p>
                <p><strong>Province:</strong> <?php echo htmlspecialchars($row['province']); ?></p>
                <p><strong>Card Number:</strong> <?php echo htmlspecialchars($row['cardNumber']); ?></p>
                <p><strong>Card Expiry Month:</strong> <?php echo htmlspecialchars($row['cardExpiryMonth']); ?></p>
                <p><strong>Card Expiry Year:</strong> <?php echo htmlspecialchars($row['cardExpiryYear']); ?></p>

                <!-- Retrieve and display product details -->
                <?php
                $orderID = $row['orderID'];
                $productQuery = "SELECT * FROM order_products WHERE orderID = $orderID";
                $productResult = $db->query($productQuery);

                if ($productResult->num_rows > 0) {
                    echo "<p><strong>Products:</strong></p>";
                    echo "<ul>";
                    while ($productRow = $productResult->fetch_assoc()) {
                      echo "<p><strong>Product Name:</strong> {$productRow['productName']}</p>";
                      echo "<p><strong>Price:</strong> {$productRow['price']}</p>";
                      echo "<p><strong>Quantity:</strong> {$productRow['quantity']}</p>";
                      echo "<p><strong>Total:</strong> {$productRow['total']}</p>";
                      echo "<hr>"; 
                  }
                    echo "</ul>";
                } else {
                    echo "<p>No products found for this order.</p>";
                }
                ?>
            </div>
    <?php
        }
    }
    ?>
</main>


  <footer>
        <p>&copy; 2024 QUANTUMBYTE SOLUTIONS PVT LTD. All rights reserved.</p>
    </footer>
</body>

</html>
<?php
}