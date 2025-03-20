<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require_once 'db_connect.php';

$movie_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch movie details
$movie_query = "SELECT * FROM movies WHERE MovieID = ?";
$stmt = $conn->prepare($movie_query);
$stmt->bind_param("i", $movie_id);
$stmt->execute();
$movie = $stmt->get_result()->fetch_assoc();

// Fetch actors for this movie
$actors_query = "SELECT a.* FROM actors a JOIN movie_actors ma ON a.ActorID = ma.ActorID WHERE ma.MovieID = ?";
$stmt_actors = $conn->prepare($actors_query);
$stmt_actors->bind_param("i", $movie_id);
$stmt_actors->execute();
$actors_result = $stmt_actors->get_result();
$actors = $actors_result->fetch_all(MYSQLI_ASSOC);

// Fetch directors for this movie
$directors_query = "SELECT d.* FROM directors d JOIN movie_directors md ON d.DirectorID = md.DirectorID WHERE md.MovieID = ?";
$stmt_directors = $conn->prepare($directors_query);
$stmt_directors->bind_param("i", $movie_id);
$stmt_directors->execute();
$directors_result = $stmt_directors->get_result();
$directors = $directors_result->fetch_all(MYSQLI_ASSOC);

// Fetch reviews for this movie
$reviews_query = "SELECT r.*, u.Username FROM reviews r JOIN users u ON r.UserID = u.UserID WHERE r.MovieID = ?";
$stmt_reviews = $conn->prepare($reviews_query);
$stmt_reviews->bind_param("i", $movie_id);
$stmt_reviews->execute();
$reviews_result = $stmt_reviews->get_result();
$reviews = $reviews_result->fetch_all(MYSQLI_ASSOC);

// Fetch average rating for this movie
$rating_query = "SELECT AVG(Score) AS Rating, COUNT(*) AS RatingCount FROM ratings WHERE MovieID = ?";
$stmt_rating = $conn->prepare($rating_query);
$stmt_rating->bind_param("i", $movie_id);
$stmt_rating->execute();
$rating_result = $stmt_rating->get_result()->fetch_assoc();
$average_rating = $rating_result['Rating'];
$rating_count = $rating_result['RatingCount'];

$stmt->close();
$stmt_actors->close();
$stmt_directors->close();
$stmt_reviews->close();
$stmt_rating->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details | MovieDekhi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            width: 95%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .info img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .rating-section h2 {
            margin-bottom: 10px;
        }

        .rating-section select,
        .rating-section button {
            font-size: 16px;
            padding: 5px;
            margin-right: 10px;
            cursor: pointer;
        }

        .rating-section button {
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
        }

        .rating-section button:hover {
            background-color: #0056b3;
        }

        .review-box {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .review-box strong {
            font-weight: bold;
        }

        .dekhbometer {
            background-color: #ececec;
            /* Light grey background */
            border: 1px solid #dcdcdc;
            /* Grey border */
            border-radius: 10px;
            /* Rounded corners */
            padding: 15px;
            /* Padding around the text */
            text-align: center;
            /* Centering the text */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Slight shadow for depth */
            position: relative;
            /* Relative to its normal position */
            top: 20px;
            /* Pushed down a bit */
            margin-top: 20px;
            /* Additional space above */
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="account.php" class="btn btn-primary mb-3">Home</a>
        <div class="row">
            <div class="col-md-8">
                <div class="info">
                    <h1><?php echo htmlspecialchars($movie['Title']); ?></h1>
                    <img src="<?php echo htmlspecialchars($movie['PosterURL']); ?>" alt="Poster for <?php echo htmlspecialchars($movie['Title']); ?>">
                    <p><strong>Genre:</strong> <?php echo htmlspecialchars($movie['Genre']); ?></p>
                    <p><strong>Release Date:</strong> <?php echo htmlspecialchars($movie['ReleaseDate']); ?></p>
                    <p><strong>Country:</strong> <?php echo htmlspecialchars($movie['Country']); ?></p>
                    <p><strong>Language:</strong> <?php echo htmlspecialchars($movie['Language']); ?></p>
                    <p><strong>Duration:</strong> <?php echo htmlspecialchars($movie['Duration']); ?> minutes</p>
                    <p><strong>Plot:</strong> <?php echo htmlspecialchars($movie['Plot']); ?></p>
                    <?php if ($rating_count > 0) : ?>
                        <p class="average-rating">Rating: <strong><?php echo number_format($average_rating, 1); ?>/10</strong> based on <?php echo $rating_count; ?> ratings.</p>
                    <?php else : ?>
                        <p class="average-rating">Rating: No ratings yet.</p>
                    <?php endif; ?>
                    <form action="add_to_watchlist.php" method="POST">
                        <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
                        <button type="submit" class="btn btn-warning">Add to Watchlist</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="rating-section">
                    <h2>Rate This Movie</h2>
                    <form action="rate_movie.php" method="POST">
                        <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
                        <select name="rating" required>
                            <option value="">Select a rating...</option>
                            <?php for ($i = 1; $i <= 10; $i++) : ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                        <button type="submit">Submit Rating</button>
                    </form>
                    <hr>
                    <h2>Write a Review</h2>
                    <form action="write_review.php" method="POST">
                        <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
                        <textarea name="review_text" rows="4" required></textarea>
                        <button type="submit">Submit Review</button>
                    </form>
                </div>
                <!-- DekhboMeter Section -->
                <div class="dekhbometer">
                    <h4>DekhboMeter</h4>
                    <?php
                    if ($rating_count > 0) {
                        if ($average_rating < 6) {
                            echo "<p>Na dekhle hobe</p>";
                        } elseif ($average_rating >= 6 && $average_rating < 9) {
                            echo "<p>Dekha jai</p>";
                        } else {
                            echo "<p>Must dekhte hobe</p>";
                        }
                    } else {
                        echo "<p>No ratings yet to evaluate.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Actors Section -->
        <div class="info">
            <h2>Actors</h2>
            <ul class="list-group">
                <?php foreach ($actors as $actor) : ?>
                    <li class="list-group-item">
                        <a href="actor.php?id=<?php echo $actor['ActorID']; ?>">
                            <?php echo htmlspecialchars($actor['Name']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Directors Section -->
        <div class="info">
            <h2>Directors</h2>
            <ul class="list-group">
                <?php foreach ($directors as $director) : ?>
                    <li class="list-group-item">
                        <a href="director.php?id=<?php echo $director['DirectorID']; ?>">
                            <?php echo htmlspecialchars($director['Name']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Reviews Section -->
        <div class="info">
            <h2>Reviews</h2>
            <?php if (empty($reviews)) : ?>
                <p>No reviews available.</p>
            <?php else : ?>
                <?php foreach ($reviews as $review) : ?>
                    <div class="review-box">
                        <strong><?php echo htmlspecialchars($review['Username']); ?>:</strong>
                        <p><?php echo htmlspecialchars($review['ReviewText']); ?></p>
                        <span class="review-date"><?php echo htmlspecialchars($review['DatePosted']); ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>