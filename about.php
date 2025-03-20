<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About MovieDekhi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            color: black;
        }

        .navbar {
            background-color: #004f78;
            padding: 10px 0;
        }

        .navbar a,
        .navbar a:hover,
        .navbar a:active {
            margin: 0 15px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background-color: #007bff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 900px;
            width: 100%;
        }

        .centered-text {
            text-align: center;
            color: white;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .welcome,
        .slogan {
            animation: fadeIn 1s ease-in-out;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="account.php">MovieDekhi</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a> <!-- Link to the about page -->
                </li>
                <li class="nav-item">
                    <span id="local-time" class="nav-link"></span>
                </li>
            </ul>
        </div>
    </nav>
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
                hour12: true
            };
            const localTime = now.toLocaleString('en-US', options);
            document.getElementById('local-time').textContent = localTime;
        }
        updateLocalTime();
        setInterval(updateLocalTime, 1000);
    </script>
    <div class="container">
        <div class="content">
            <div class="centered-text">
                <h1 class="welcome">Welcome to MovieDekhi</h1>
                <p class="slogan">Your premier portal for all things cinema. MovieDekhi is dedicated to providing comprehensive and accurate information on movies, actors, and directors. Immerse yourself in a vast collection of movie details, explore rich biographies, and join a community of fellow movie enthusiasts. Your journey into the world of movies starts here, at MovieDekhi.</p>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and other necessary scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>