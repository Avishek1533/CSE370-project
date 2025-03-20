<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "Moviedekhi";
$conn = new mysqli($servername, $username_db, $password_db, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$category = $_GET['category'] ?? 'movies'; // Default to 'movies' if not set
$search = $_GET['search'] ?? '';

// Sanitize the input to prevent SQL Injection
$search = $conn->real_escape_string($search);

// Select the appropriate SQL query based on the category
if ($category == 'movies') {
    $sql = "SELECT MovieID, Title, ReleaseDate, PosterURL FROM movies WHERE Title LIKE '%$search%'";
} elseif ($category == 'actors') {
    $sql = "SELECT ActorID, Name, Birthdate, Country, Biography, PhotoURL FROM actors WHERE Name LIKE '%$search%'";
} else { // 'directors'
    $sql = "SELECT DirectorID, Name, Birthdate, Country, Biography, PhotoURL FROM directors WHERE Name LIKE '%$search%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results | MovieDekhi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #004f78;
            padding: 10px 0;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: white;
        }

        .movie-container,
        .person-container {
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 20px;
            justify-content: center;
            align-items: stretch;
        }

        .movie,
        .person {
            background-color: #ffffff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .movie img,
        .person img {
            width: 100%;
            height: auto;
            display: block;
        }

        .movie-info,
        .person-info {
            padding: 10px;
            text-align: center;
        }

        .watchlist-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .watchlist-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="account.php">MovieDekhi</a>
        <div class="navbar-nav ml-auto">
            <a class="nav-link" href="about.php">About Us</a>
            <a class="nav-link" href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Search Results</h2>
        <?php if ($result->num_rows > 0) : ?>
            <?php if ($category == 'movies') : ?>
                <div class="movie-container">
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div class="movie">
                            <a href="movie_detail.php?id=<?php echo $row['MovieID']; ?>">
                                <img src="<?php echo htmlspecialchars($row['PosterURL']); ?>" alt="<?php echo htmlspecialchars($row['Title']); ?>">
                            </a>
                            <div class="movie-info">
                                <a href="movie_detail.php?id=<?php echo $row['MovieID']; ?>">
                                    <h5><?php echo htmlspecialchars($row['Title']); ?></h5>
                                </a>
                                <p>Release Date: <?php echo htmlspecialchars($row['ReleaseDate']); ?></p>
                                <button class="watchlist-button" data-movie-id="<?php echo $row['MovieID']; ?>">+ Add to Watchlist</button>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <div class="person-container">
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div class="person">
                            <img src="<?php echo htmlspecialchars($row['PhotoURL']); ?>" alt="<?php echo htmlspecialchars($row['Name']); ?>">
                            <div class="person-info">
                                <h5><?php echo htmlspecialchars($row['Name']); ?></h5>
                                <p>Birthdate: <?php echo htmlspecialchars($row['Birthdate']); ?></p>
                                <p>Country: <?php echo htmlspecialchars($row['Country']); ?></p>
                                <p><?php echo htmlspecialchars($row['Biography']); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <p>No results found for your search.</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.watchlist-button').click(function() {
                var movieId = $(this).data('movie-id');
                $.ajax({
                    url: 'add_to_watchlist.php',
                    type: 'POST',
                    data: {
                        movieId: movieId
                    },
                    success: function(response) {
                        alert("Movie added to your watchlist!");
                        location.reload();
                    },
                    error: function() {
                        alert("Error adding movie to watchlist.");
                    }
                });
            });
        });
    </script>
</body>

</html>