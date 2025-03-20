<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit;
}

require_once 'db_connect.php';

$movieId = $_POST['movieId'] ?? null;
$userId = $_SESSION['user_id'];

if ($movieId) {
    $sql = "INSERT INTO watchlist (user_id, movie_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ii", $userId, $movieId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Movie added successfully.";
        } else {
            echo "Failed to add movie.";
        }
        $stmt->close();
    } else {
        echo "Failed to prepare statement.";
    }
} else {
    echo "Invalid movie ID.";
}

$conn->close();
