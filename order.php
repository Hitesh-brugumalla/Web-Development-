<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "bakery_db";
$table = "orders";

// Connect to the database
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the orders table if it doesn't exist
$query = "CREATE TABLE IF NOT EXISTS $table (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    item_name VARCHAR(100) NOT NULL
)";
mysqli_query($connection, $query);

// Initialize the success message variable
$successMessage = "";

// Process order form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $item_name = $_POST["item_name"];

    // Perform database query
    $query = "INSERT INTO $table (name, phone_number, email, item_name) VALUES ('$name', '$phone_number', '$email', '$item_name')";
    $result = mysqli_query($connection, $query);

    // Check query result
    if ($result) {
        $successMessage = "Order placed successfully!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Now</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('B1.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 350px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 120px;
            border-radius: 30px;
            box-shadow: 4px 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            display: block;
            margin: 0 auto;
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .success-message {
            text-align: center;
            color: #4caf50;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Order Now</h1>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" id="phone_number" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" id="item_name" required><br>

        <input type="submit" value="Order Now">
    </form>
    <div id="success-message" class="success-message"></div>
</div>
<script>
    // Function to show success message as a pop-up
    function showSuccessMessage() {
        var successMessage = document.getElementById("success-message");
        successMessage.innerHTML = "Order placed successfully!";
        successMessage.style.display = "block";
    }

    // Add event listener to the form submission
    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission
        showSuccessMessage();
    });
</script>

</body>
</html>
