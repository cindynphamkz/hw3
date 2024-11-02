<?php
require_once("db.php");

function selectAuthors() {
    $conn = get_db_connection();

    // Check if the connection was successful
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT authorid, name, bio FROM `Authors`;");
    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }

    // Execute the query and check for errors
    if (!$stmt->execute()) {
        die("Query execution failed: " . $stmt->error);
    }

    // Get the result and handle any potential errors
    $result = $stmt->get_result();
    if (!$result) {
        die("Getting result set failed: " . $stmt->error);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    return $result;
}
?>
