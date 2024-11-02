<?php
require_once("db.php");

function selectBooksByAuthor($authorId) {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }
    $stmt = $conn->prepare("SELECT book_id, title, genre FROM books WHERE author_id = ?");
    $stmt->bind_param("i", $authorId);
    $stmt->execute();
    $result = $stmt->get_result();
    $conn->close();
    return $result;
}

function selectBooks() {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }
    $stmt = $conn->prepare("SELECT book_id, title, genre FROM books");
    $stmt->execute();
    $result = $stmt->get_result();
    $conn->close();
    return $result;
}
?>
