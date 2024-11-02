<?php
require_once("db.php");

function selectBooksByGenre($genre) {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }

    // Check if a specific genre was selected
    if ($genre) {
        $stmt = $conn->prepare("SELECT BookID, AuthorID, Title, Genre FROM Books WHERE genre = ?");
        $stmt->bind_param("s", $genre);
    } else {
        $stmt = $conn->prepare("SELECT BookID, AuthorID, Title, Genre FROM Books");
    }

    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result) {
        die("Getting result set failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    return $result;
}
?>
