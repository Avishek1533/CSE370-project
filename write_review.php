<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'db_connect.php';

    // Retrieve form data
    $movie_id = isset($_POST['movie_id']) ? intval($_POST['movie_id']) : 0;
    $review_text = isset($_POST['review_text']) ? trim($_POST['review_text']) : '';

    // Validate input
    if (empty($movie_id) || empty($review_text)) {
        // Handle validation errors
        $_SESSION['error_message'] = "Please provide both movie ID and review text.";
        header("Location: movie_detail.php?id=$movie_id");
        exit();
    }

    // Insert review into the database
    $user_id = $_SESSION['user_id'];
    $insert_query = "INSERT INTO reviews (MovieID, UserID, ReviewText) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("iis", $movie_id, $user_id, $review_text);

    if ($stmt->execute()) {
        // Review inserted successfully
        $_SESSION['success_message'] = "Review submitted successfully.";
    } else {
        // Failed to insert review
        $_SESSION['error_message'] = "Failed to submit review. Please try again.";
    }

    $stmt->close();
    $conn->close();

    header("Location: movie_detail.php?id=$movie_id");
    exit();
} else {
    // Redirect if accessed directly without POST request
    header("Location: index.php");
    exit();
}
