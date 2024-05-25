<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('Baker.jpg');
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
            max-width: 600px;
            margin: 0 auto;
            padding: 100px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            height: 100px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .success-message {
            margin-top: 20px;
            text-align: center;
            color: green;
            font-weight: bold;
        }

        .error-message {
            margin-top: 20px;
            text-align: center;
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>

        <?php
        // Database configuration
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "bakery_db";
        $table = "contact_us";

        // Create a new database connection or use an existing one
        $connection = mysqli_connect($host, $username, $password);
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Create the database if it doesn't exist
        $createDbQuery = "CREATE DATABASE IF NOT EXISTS $database";
       

        // Select the database
        mysqli_select_db($connection, $database);

        // Create the table if it doesn't exist
        $createTableQuery = "CREATE TABLE IF NOT EXISTS $table (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(50) NOT NULL,
            message TEXT NOT NULL
        )";
        
        // Process contact form data
        $successMessage = $errorMessage = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $name = $_POST["name"];
            $email = $_POST["email"];
            $message = $_POST["message"];

            // Perform database query to insert the data
            $insertQuery = "INSERT INTO $table (name, email, message) VALUES ('$name', '$email', '$message')";
            if (mysqli_query($connection, $insertQuery)) {
                $successMessage = "Contact form submitted successfully!";
            } else {
                $errorMessage = "Error: " . mysqli_error($connection);
            }
        }

        // Close the database connection
        mysqli_close($connection);
        ?>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <input type="submit" value="Submit">

            <?php if (!empty($successMessage)) { ?>
                <p class="success-message"><?php echo $successMessage; ?></p>
            <?php } ?>

            <?php if (!empty($errorMessage)) { ?>
                <p class="error-message"><?php echo $errorMessage; ?></p>
            <?php } ?>
        </form>
    </div>
</body>
</html>
