<?php
require_once("db.php");

function selectAuthors() {
    $conn = get_db_connection();

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $stmt = $conn->prepare("SELECT authorid, name, bio FROM `Authors`;");
    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }

    if (!$stmt->execute()) {
        die("Query execution failed: " . $stmt->error);
    }

    $result = $stmt->get_result();
    if (!$result) {
        die("Getting result set failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    return $result;
}
?>
