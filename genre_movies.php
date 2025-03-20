<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require_once 'db_connect.php';

$genre = isset($_GET['genre']) ? $_GET['genre'] : '';

// Fetch movies by genre
$sql = "SELECT MovieID, Title, ReleaseDate, PosterURL FROM movies WHERE Genre = ? ORDER BY ReleaseDate DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $genre);
$stmt->execute();
$result = $stmt->get_result();
$movies = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
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
    <title><?php echo htmlspecialchars($genre); ?> Movies | MovieDekhi</title>
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
        <h2><?php echo htmlspecialchars($genre); ?> Movies</h2>
        <div class="movie-container">
            <?php foreach ($movies as $movie) : ?>
                <div class="movie">
                    <a href="movie_detail.php?id=<?php echo $movie['MovieID']; ?>">
                        <img src="<?php echo htmlspecialchars($movie['PosterURL']); ?>" alt="<?php echo htmlspecialchars($movie['Title']); ?>">
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
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>