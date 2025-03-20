<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require_once 'db_connect.php';

$director_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch director details
$director_query = "SELECT * FROM directors WHERE DirectorID = ?";
$stmt = $conn->prepare($director_query);
$stmt->bind_param("i", $director_id);
$stmt->execute();
$director = $stmt->get_result()->fetch_assoc();

// Fetch movies directed by the director
$movies_query = "SELECT m.* FROM movies m JOIN movie_directors md ON m.MovieID = md.MovieID WHERE md.DirectorID = ?";
$stmt = $conn->prepare($movies_query);
$stmt->bind_param("i", $director_id);
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
    <title>Director Details | MovieDekhi</title>
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
            <h1><?php echo htmlspecialchars($director['Name']); ?></h1>
            <img src="<?php echo htmlspecialchars($director['PhotoURL']); ?>" alt="Photo of <?php echo htmlspecialchars($director['Name']); ?>">
            <p><strong>Birthdate:</strong> <?php echo htmlspecialchars($director['Birthdate']); ?></p>
            <p><strong>Country:</strong> <?php echo htmlspecialchars($director['Country']); ?></p>
            <p><strong>Biography:</strong> <?php echo htmlspecialchars($director['Biography']); ?></p>
        </div>

        <div class="info">
            <h2>Movies Directed</h2>
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