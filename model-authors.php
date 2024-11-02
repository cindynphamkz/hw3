<?php
require_once("db.php");

function selectAuthors() {
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT authorid, name, bio FROM Authors;");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    return $result;
}

function addAuthor($name, $bio) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("INSERT INTO Authors (name, bio) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $bio);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function getAuthorById($authorid) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT authorid, name, bio FROM Authors WHERE authorid = ?");
    $stmt->bind_param("i", $authorid);
    $stmt->execute();
    $result = $stmt->get_result();
    $author = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $author;
}

function updateAuthor($authorid, $name, $bio) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("UPDATE Authors SET name = ?, bio = ? WHERE authorid = ?");
    $stmt->bind_param("ssi", $name, $bio, $authorid);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function deleteAuthor($authorid) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("DELETE FROM Authors WHERE authorid = ?");
    $stmt->bind_param("i", $authorid);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
