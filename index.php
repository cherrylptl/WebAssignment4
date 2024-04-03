<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Assignment 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#myform').on('submit', function(e){
            e.preventDefault(); // Prevent default form submission
            
            // Fetch the form data
            var formData = $(this).serialize();

            // AJAX call
            $.ajax({
                type: 'POST',
                url: 'orderprocess.php',
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
        <div class="nav">
            <?php include('includes/nav.php'); ?>
        </div>
       
        <?php
            if(isset($_SESSION['username'])){
            echo "Welcome ". $_SESSION['username'];
            }
        ?>
        <div class="main-container">
            <div class="product-page">
                <div class="slider">
                    <h1>Select Products</h1>
                    <br>

                    <div class="product-card">
                        <div class="product-info">
                            <img src="image\laptop.jpeg" alt="Laptop">
                            <div class="product-details">
                                <h3>Laptop</h3>
                                <p>$100</p>
                            </div>
                        </div>
                        <div class="quantity">
                            <label for="product1">Quantity:</label>
                            <input type="number" id="product1" name="product1" value="0">
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-info">
                            <img src="image\keyboard.jpg" alt="Keyboard">
                            <div class="product-details">
                                <h3>Keyboard</h3>
                                <p>$5</p>
                            </div>
                        </div>
                        <div class="quantity">
                            <label for="product2">Quantity:</label>
                            <input type="number" id="product2" name="product2" value="0">
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-info">
                            <img src="image\mouse.jpg" alt="Mouse">
                            <div class="product-details">
                                <h3>Mouse</h3>
                                <p>$4</p>
                            </div>
                        </div>
                        <div class="quantity">
                            <label for="product3">Quantity:</label>
                            <input type="number" id="product3" name="product3" value="0">
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-info">
                            <img src="image\headphone.jpg" alt="HeadPhone">
                            <div class="product-details">
                                <h3>HeadPhone</h3>
                                <p>$4</p>
                            </div>
                        </div>
                        <div class="quantity">
                            <label for="product4">Quantity:</label>
                            <input type="number" id="product4" name="product4" value="0">
                        </div>
                    </div>

            </div>
            <div class="slider">
                    <h1>Receipt Details</h1>
                    <p id="formResult">The receipt will show .</p>
            </div>
        </div>
            <div class="form-page">
            <form name="myform" id="myform" method="Post" action="">
                    <div class="slider">

                        <h1>Customer Details</h1>
                        <br>
                        <label>Name:</label>
                        <input id="name" placeholder="First Last" type="text" name="name">

                        <label>Email:</label>
                        <input id="email" placeholder="email@domain.com" type="text" name="email">

                        <label>Phone:</label>
                        <input id="phone" placeholder="123-123-1234" type="text" name="phone">

                        <label>Address:</label>
                        <input id="address" placeholder="Address" type="text" name="address">

                        <label>City:</label>
                        <input id="city" placeholder="City" type="text" name="city">

                        <label>Postcode:</label>
                        <input id="postcode" placeholder="X0X 0X0" type="text" name="postcode">

                        <label>Province:</label>
                        <select id="province" name="province">
                            <option value="" disabled selected>Select Province</option>
                            <option value="AB">Alberta</option>
                            <option value="BC">British Columbia</option>
                            <option value="MB">Manitoba</option>
                            <option value="NB">New Brunswick</option>
                            <option value="BFL">Newfoundland and Labrador</option>
                            <option value="NT">Northwest Territories</option>
                            <option value="NS">Nova Scotia</option>
                            <option value="NU">Nunavut</option>
                            <option value="ON">Ontario</option>
                            <option value="PEI">Prince Edward Island</option>
                            <option value="QU">Quebec</option>
                            <option value="SA">Saskatchewan</option>
                            <option value="YU">Yukon</option>
                        </select>

                        <br><br>

                        <h1>Card Details</h1>
                        <br>
                        <label>Credit Card:</label>
                        <input id="creditcard" placeholder="1234-1234-1234-1234" type="text" name="creditcard">

                        <div class="creditcard-expiry">
                            <label for="expirydate">Expiry Date:</label>
                            <input id="expirydate" placeholder="MMM" type="text" name="expirydate">
                            <input id="year" placeholder="YYYY" type="text" name="year">
                        </div>

                        <!-- 
                        <h1>Password</h1>
                        <br>
                        <label>Password:</label>
                        <input id="password" placeholder="Password" type="password" name="password">

                        <label>Confirm Password:</label>
                        <input id="confirmPassword" placeholder="Confirm Password" type="password"
                            name="confirmPassword"> -->

                        <br><br>

                        <input type="submit" value="Place Order" name="submit">
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