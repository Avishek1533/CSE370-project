<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require_once 'db_connect.php';

$actor_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch actor details
$actor_query = "SELECT * FROM actors WHERE ActorID = ?";
$stmt = $conn->prepare($actor_query);
$stmt->bind_param("i", $actor_id);
$stmt->execute();
$actor = $stmt->get_result()->fetch_assoc();

// Fetch movies in which the actor has appeared
$movies_query = "SELECT m.* FROM movies m JOIN movie_actors ma ON m.MovieID = ma.MovieID WHERE ma.ActorID = ?";
$stmt = $conn->prepare($movies_query);
$stmt->bind_param("i", $actor_id);
$stmt->execute();
$movies_result = $stmt->get_result();
$movies = $movies_result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actor Details | MovieDekhi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            width: 85%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .info,
        .list-group {
            margin-top: 20px;
        }

        .info h2 {
            color: #0056b3;
        }

        .info img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .list-group-item {
            position: relative;
            display: block;
            padding: 10px 15px;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="account.php" class="btn btn-primary mb-3">Home</a>
        <div class="info">
            <h1><?php echo htmlspecialchars($actor['Name']); ?></h1>
            <img src="<?php echo htmlspecialchars($actor['PhotoURL']); ?>" alt="Photo of <?php echo htmlspecialchars($actor['Name']); ?>">
            <p><strong>Birthdate:</strong> <?php echo htmlspecialchars($actor['Birthdate']); ?></p>
            <p><strong>Country:</strong> <?php echo htmlspecialchars($actor['Country']); ?></p>
            <p><strong>Biography:</strong> <?php echo htmlspecialchars($actor['Biography']); ?></p>
        </div>

        <div class="info">
            <h2>Movies</h2>
            <ul class="list-group">
                <?php foreach ($movies as $movie) : ?>
                    <li class="list-group-item"><a href="movie_detail.php?id=<?php echo $movie['MovieID']; ?>"><?php echo htmlspecialchars($movie['Title']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>