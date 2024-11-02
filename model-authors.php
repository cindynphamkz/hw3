<?php
require_once("db.php");

function selectAuthors() {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }
    $stmt = $conn->prepare("SELECT author_id, name, bio FROM authors");
    $stmt->execute();
    $result = $stmt->get_result();
    $conn->close();
    return $result;
}
?>
