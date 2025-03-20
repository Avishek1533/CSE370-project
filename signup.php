<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $joinDate = date('Y-m-d');

    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "Moviedekhi";
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email already exists
    $email_query = "SELECT * FROM users WHERE email = '$email'";
    $email_result = $conn->query($email_query);

    if ($email_result->num_rows > 0) {
        echo "Error: An account has already been made with this email. Please use a different email.";
    } else {
        // Hashing the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_user_sql = "INSERT INTO users (username, email, password, JoinDate) VALUES ('$username', '$email', '$hashed_password', '$joinDate')";
        if ($conn->query($insert_user_sql) === TRUE) {
            header("Location: index.php");  // Redirect to login page
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp | MovieDekhi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #004f78;
            margin: 0;
            padding: 0;
            color: #ffffff;
        }

        .navbar {
            background-color: #ffffff;
            padding: 10px 0;
        }

        .navbar a {
            margin: 0 15px;
            color: #004f78;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .content {
            text-align: center;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-control {
            border-radius: 8px;
            background-color: #ffffff;
            color: #000000;
            width: 100%;
        }

        .submit-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

        /* Added CSS for changing text color */
        .welcome {
            color: #000000;
            /* Changing the color of welcome text to black */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="index.php">MovieDekhi</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="content">
            <h2 class="welcome">Welcome to MovieDekhi!</h2>
            <p class="welcome">Join us and explore the world of cinema.</p>
            <form action="signup.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="Username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="Email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="Password" placeholder="Password" required>
                </div>
                <button type="submit" class="submit-button">Sign Up</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>