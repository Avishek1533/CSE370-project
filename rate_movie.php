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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movieId = $_POST['movie_id'];
    $userId = $_SESSION['user_id'];
    $rating = $_POST['rating'];

    // Check if the user has already rated this movie
    $check_sql = "SELECT * FROM ratings WHERE MovieID = ? AND UserID = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ii", $movieId, $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Update existing rating
        $update_sql = "UPDATE ratings SET Score = ?, DateRated = NOW() WHERE MovieID = ? AND UserID = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("dii", $rating, $movieId, $userId);
        $update_stmt->execute();
        $update_stmt->close();
    } else {
        // Insert new rating
        $insert_sql = "INSERT INTO ratings (MovieID, UserID, Score) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("iid", $movieId, $userId, $rating);
        $insert_stmt->execute();
        $insert_stmt->close();
    }
    $stmt->close();
    $conn->close();
    header("Location: movie_detail.php?id=$movieId"); // Redirect back to the movie detail page
    exit();
}
