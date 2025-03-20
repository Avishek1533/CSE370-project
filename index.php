<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"]; // Ensure the name attribute in the form matches
    $password = $_POST["password"]; // Ensure the name attribute in the form matches

    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "Moviedekhi";
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare a statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT UserID, Email, Password FROM users WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user_data = $result->fetch_assoc();
        // Verify the password with the hashed password in the database
        if (password_verify($password, $user_data['Password'])) {
            $_SESSION["user_id"] = $user_data["UserID"];
            $_SESSION["email"] = $user_data["Email"];
            header("Location: account.php"); // Redirect to the user's account page
            exit();
        } else {
            echo "Invalid login information. Try Again.";
        }
    } else {
        echo "Invalid login information. Try Again.";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MovieDekhi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }

        .navbar {
            background-color: #004f78;
            padding: 0.5rem 1rem;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-link {
            margin-left: 2rem;
        }

        #local-time {
            margin-left: 2rem;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .login-section {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-top: -50px;
        }

        .logo-container {
            padding-right: 50px;
            border-right: 2px solid #ddd;
        }

        .logo {
            width: 300px;
            height: auto;
        }

        .form-container {
            margin-left: 50px;
            max-width: 350px;
            width: 100%;
        }

        .form-container h1,
        .form-container p {
            color: #333;
            text-align: left;
            margin-bottom: 1rem;
        }

        .form-group label {
            color: #333;
            margin-bottom: .5rem;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: .5rem .75rem;
        }

        .btn-primary {
            background-color: #0062cc;
            border: none;
            padding: .5rem 1rem;
            border-radius: 5px;
            margin-top: 1rem;
        }

        .btn-primary:hover {
            background-color: #004085;
        }

        .text-center {
            text-align: center;
            margin-top: 2rem;
        }

        .text-center a {
            color: #0062cc;
            text-decoration: none;
        }

        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">MovieDekhi</a>
        <div class="navbar-nav ml-auto">
            <a class="nav-link" href="about.php">About Us</a>
            <span id="local-time" class="nav-link"></span>
        </div>
    </nav>

    <div class="container">
        <div class="login-section">
            <div class="logo-container">
                <img src="Assets/photo1713103404.jpeg" alt="MovieDekhi Logo" class="logo">
            </div>
            <div class="form-container">
                <h1>Welcome to MovieDekhi</h1>
                <p>Your portal for endless movie exploration.</p>
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <div class="text-center">
                    <a href="signup.php">Don't have an account? Sign Up</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function updateLocalTime() {
            const now = new Date();
            const options = {
                weekday: 'short',
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            };
            const localTime = now.toLocaleString('en-US', options);
            document.getElementById('local-time').textContent = localTime;
        }
        updateLocalTime();
        setInterval(updateLocalTime, 1000);
    </script>
</body>

</html>