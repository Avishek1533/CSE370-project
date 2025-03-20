<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit;
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
    $movieId = intval($_POST['movieId']);
    $userId = $_SESSION['user_id'];

    $sql = "DELETE FROM watchlist WHERE movie_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $movieId, $userId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Movie removed successfully.";
    } else {
        echo "Failed to remove movie.";
    }

    $stmt->close();
    $conn->close();
}
