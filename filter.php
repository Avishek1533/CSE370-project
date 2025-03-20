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

// Fetch genres
$sql_genres = "SELECT DISTINCT Genre FROM movies";
$result_genres = $conn->query($sql_genres);
$genres = [];
if ($result_genres->num_rows > 0) {
    while ($row = $result_genres->fetch_assoc()) {
        $genres[] = $row['Genre'];
    }
}

// Handle search
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql_search = "SELECT * FROM movies WHERE Title LIKE '%$search%' OR Genre LIKE '%$search%'";
    $result_search = $conn->query($sql_search);
    $search_movies = [];
    if ($result_search->num_rows > 0) {
        while ($row = $result_search->fetch_assoc()) {
            $search_movies[] = $row;
        }
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Movies | MovieDekhi</title>
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

        .genre-container {
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 20px;
            justify-content: center;
            align-items: stretch;
        }

        .genre-button {
            background-color: #004f78;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
            text-align: center;
        }

        .genre-button:hover {
            background-color: #00364d;
        }

        .search-form {
            margin-top: 20px;
            margin-bottom: 20px;
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

    <div class="container">
        <h2>Filter Movies by Genre</h2>
        <div class="genre-container">
            <?php foreach ($genres as $genre) : ?>
                <a href="filtered_movies.php?genre=<?php echo urlencode($genre); ?>" class="genre-button"><?php echo $genre; ?></a>
            <?php endforeach; ?>
        </div>

        <form action="filter.php" method="GET" class="search-form">
            <input type="text" name="search" class="search-input" placeholder="Search by title or genre">
            <button type="submit" class="search-button">Search</button>
        </form>

        <?php if (isset($search_movies) && !empty($search_movies)) : ?>
            <h2>Search Results</h2>
            <div class="movie-container">
                <?php foreach ($search_movies as $movie) : ?>
                    <div class="movie">
                        <a href="movie_detail.php?id=<?php echo $movie['MovieID']; ?>">
                            <img src="<?php echo htmlspecialchars($movie['posterURL']); ?>" alt="<?php echo htmlspecialchars($movie['Title']); ?>">
                        </a>
                        <div class="movie-info">
                            <a href="movie_detail.php?id=<?php echo $movie['MovieID']; ?>">
                                <h5><?php echo htmlspecialchars($movie['Title']); ?></h5>
                            </a>
                            <p>Release Date: <?php echo htmlspecialchars($movie['ReleaseDate']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php elseif (isset($search_movies) && empty($search_movies)) : ?>
            <p>No movies found.</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>