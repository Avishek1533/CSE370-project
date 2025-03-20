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

// Fetch latest movies
$sql_latest = "SELECT MovieID, Title, ReleaseDate, PosterURL FROM movies ORDER BY ReleaseDate DESC LIMIT 5";
$result_latest = $conn->query($sql_latest);
$latest_movies = [];
if ($result_latest->num_rows > 0) {
    while ($row = $result_latest->fetch_assoc()) {
        $latest_movies[] = $row;
    }
}

// Fetch watchlist movies
$sql_watchlist = "SELECT m.MovieID, m.Title, m.ReleaseDate, m.PosterURL FROM movies m JOIN watchlist w ON m.MovieID = w.movie_id WHERE w.user_id = ?";
$stmt = $conn->prepare($sql_watchlist);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result_watchlist = $stmt->get_result();
$watchlist_movies = [];
if ($result_watchlist->num_rows > 0) {
    while ($row = $result_watchlist->fetch_assoc()) {
        $watchlist_movies[] = $row;
    }
}

// Fetch all unique genres
$sql_genres = "SELECT DISTINCT Genre FROM movies ORDER BY Genre";
$result_genres = $conn->query($sql_genres);
$genres = [];
if ($result_genres->num_rows > 0) {
    while ($row = $result_genres->fetch_assoc()) {
        $genres[] = $row['Genre'];
    }
}

// Fetch top rated movies
$sql_top_rated = "SELECT m.MovieID, m.Title, m.ReleaseDate, m.PosterURL, AVG(r.Score) AS AvgScore FROM movies m JOIN ratings r ON m.MovieID = r.MovieID GROUP BY m.MovieID ORDER BY AvgScore DESC LIMIT 5";
$result_top_rated = $conn->query($sql_top_rated);
$top_rated_movies = [];
if ($result_top_rated->num_rows > 0) {
    while ($row = $result_top_rated->fetch_assoc()) {
        $top_rated_movies[] = $row;
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | MovieDekhi</title>
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

        .search-container {
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

        .search-category,
        .genre-select {
            margin-right: 10px;
        }

        .search-input {
            width: 300px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .search-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #0056b3;
        }

        .movie-container {
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 20px;
            justify-content: center;
            align-items: stretch;
        }

        .movie {
            background-color: #ffffff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .movie img {
            width: 100%;
            height: auto;
            display: block;
        }

        .movie-info {
            padding: 10px;
            text-align: center;
        }

        .watchlist-button,
        .remove-watchlist-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .watchlist-button:hover,
        .remove-watchlist-button:hover {
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
        <div class="search-container">
            <form action="search.php" method="GET">
                <select name="category" class="search-category">
                    <option value="movies">Movie</option>
                    <option value="actors">Actor</option>
                    <option value="directors">Director</option>
                </select>
                <input type="text" name="search" class="search-input" placeholder="Search">
                <button type="submit" class="search-button">Search</button>
            </form>
            <select class="genre-select" onchange="if (this.value) window.location.href='genre_movies.php?genre='+this.value;">
                <option value="">Select Genre</option>
                <?php foreach ($genres as $genre) : ?>
                    <option value="<?php echo urlencode($genre); ?>"><?php echo htmlspecialchars($genre); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <h2>Latest Movies</h2>
        <div class="movie-container">
            <?php foreach ($latest_movies as $movie) : ?>
                <div class="movie">
                    <a href="movie_detail.php?id=<?php echo $movie['MovieID']; ?>">
                        <img src="<?php echo htmlspecialchars($movie['PosterURL']); ?>" alt="<?php echo htmlspecialchars($movie['Title']); ?>">
                    </a>
                    <div class="movie-info">
                        <a href="movie_detail.php?id=<?php echo $movie['MovieID']; ?>">
                            <h5><?php echo htmlspecialchars($movie['Title']); ?></h5>
                        </a>
                        <p>Release Date: <?php echo htmlspecialchars($movie['ReleaseDate']); ?></p>
                        <button class="watchlist-button" data-movie-id="<?php echo $movie['MovieID']; ?>">+ Add to Watchlist</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2>Your Watchlist</h2>
        <div class="movie-container">
            <?php foreach ($watchlist_movies as $movie) : ?>
                <div class="movie">
                    <a href="movie_detail.php?id=<?php echo $movie['MovieID']; ?>">
                        <img src="<?php echo htmlspecialchars($movie['PosterURL']); ?>" alt="<?php echo htmlspecialchars($movie['Title']); ?>">
                    </a>
                    <div class="movie-info">
                        <a href="movie_detail.php?id=<?php echo $movie['MovieID']; ?>">
                            <h5><?php echo htmlspecialchars($movie['Title']); ?></h5>
                        </a>
                        <p>Release Date: <?php echo htmlspecialchars($movie['ReleaseDate']); ?></p>
                        <button class="remove-watchlist-button" data-movie-id="<?php echo $movie['MovieID']; ?>">- Remove from Watchlist</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2>Top Rated Movies</h2>
        <div class="movie-container">
            <?php foreach ($top_rated_movies as $movie) : ?>
                <div class="movie">
                    <a href="movie_detail.php?id=<?php echo $movie['MovieID']; ?>">
                        <img src="<?php echo htmlspecialchars($movie['PosterURL']); ?>" alt="<?php echo htmlspecialchars($movie['Title']); ?>">
                    </a>
                    <div class="movie-info">
                        <a href="movie_detail.php?id=<?php echo $movie['MovieID']; ?>">
                            <h5><?php echo htmlspecialchars($movie['Title']); ?></h5>
                        </a>
                        <p>Release Date: <?php echo htmlspecialchars($movie['ReleaseDate']); ?></p>
                        <button class="watchlist-button" data-movie-id="<?php echo $movie['MovieID']; ?>">+ Add to Watchlist</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
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
                        location.reload(); // Optionally, just update the watchlist section dynamically
                    },
                    error: function() {
                        alert("Error adding movie to watchlist.");
                    }
                });
            });

            $('.remove-watchlist-button').click(function() {
                var movieId = $(this).data('movie-id');
                $.ajax({
                    url: 'remove_from_watchlist.php',
                    type: 'POST',
                    data: {
                        movieId: movieId
                    },
                    success: function(response) {
                        alert("Movie removed from your watchlist!");
                        location.reload();
                    },
                    error: function() {
                        alert("Error removing movie from watchlist.");
                    }
                });
            });
        });
    </script>
</body>

</html>