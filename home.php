<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('Home.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 200px;
        }

        .container {
            background-image: url('BG.jpg');
            max-width: 1500px;
            margin: 0 auto;
            padding: 300px;
            background-color: #fff;
            box-shadow: 0 0 100px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 500px;
            height: auto;
        }

        .navigation {
            text-align: center;
            margin-bottom: 140px;
        }

        .navigation a {
            display: inline-block;
            margin: 0 10px;
            padding: 20px 120px;
            text-decoration: none;
            color: #fff;
            background-color: #333;
            border-radius: 7px;
        }

        .section {
            margin-bottom: 40px;
        }

        .section-heading {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .section-content {
            font-size: 16px;
        }

        .bakery-pics {
            text-align: center;
            margin-bottom: 70px;
            overflow: hidden;
        }

        .bakery-pics-container {
            display: flex;
            transition: transform 0.3s ease;
        }

        .bakery-pics img {
            width: 800px;
            height: auto;
            margin: 100px;
        }

        .slider-controls {
            text-align: center;
            margin-top: 20px;
        }

        .slider-controls button {
            border: none;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            margin: 0 5px;
            cursor: pointer;
        }

        footer {
            background-color: grey;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="SRM_LOGO.jpg" alt="Logo">
        </div>

        <div class="navigation">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="order.php">Order Now</a>
        </div>

        <div class="section">
            <h2 class="section-heading">Bakery Pictures</h2>
            <div class="section-content bakery-pics">
                <div class="bakery-pics-container">
                    <img src="Cake.jpg" alt="Bakery Picture">
                    <img src="Sweets.jpg" alt="Bakery Picture">
                    <img src="Chocolate.jpg" alt="Bakery Picture">
                    <img src="Biscuits.jpg" alt="Bakery Picture">
                </div>
            </div>
            <div class="slider-controls">
                <button id="prevBtn"><h3>Prev</h3></button>
                <button id="nextBtn"><h4>Next</h4></button>
            </div>
        </div>
    </div>
    <footer>
        <p>Contact Us</p>
        <p>TEAM_ID-12</p>
        <p>Email: SRM_AP@gmail.com</p>
        <p>Phone: 123456789</p>
    </footer>

    <script>
        var slideIndex = 0;
        var bakeryPicsContainer = document.querySelector(".bakery-pics-container");
        var prevBtn = document.getElementById("prevBtn");
        var nextBtn = document.getElementById("nextBtn");
        var picWidth = 320; // Width of each picture, adjust as needed

        // Function to move the pictures to the left
        function moveLeft() {
            if (slideIndex > 0) {
                slideIndex--;
                bakeryPicsContainer.style.transform = "translateX(-" + (slideIndex * picWidth) + "px)";
            }
        }

        // Function to move the pictures to the right
        function moveRight() {
            if (slideIndex < bakeryPicsContainer.childElementCount - 1) {
                slideIndex++;
                bakeryPicsContainer.style.transform = "translateX(-" + (slideIndex * picWidth) + "px)";
            }
        }

        // Event listeners for the buttons
        prevBtn.addEventListener("click", moveLeft);
        nextBtn.addEventListener("click", moveRight);
    </script>
</body>
</html>
