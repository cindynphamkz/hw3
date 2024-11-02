<?php
require_once("db.php");

// Function to select books by genre
function selectBooksByGenre($genre) {
    $conn = get_db_connection();
    if ($genre) {
        $stmt = $conn->prepare("SELECT BookID, AuthorID, Title, Genre FROM Books WHERE genre = ?");
        $stmt->bind_param("s", $genre);
    } else {
        $stmt = $conn->prepare("SELECT BookID, AuthorID, Title, Genre FROM Books");
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    return $result;
}

// Function to select books by author
function selectBooksByAuthor($authorId) {
    $conn = get_db_connection();
    if (!$conn) {
        die("Database connection failed.");
    }

    $stmt = $conn->prepare("SELECT BookID, Title, Genre FROM Books WHERE AuthorID = ?");
    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }

    $stmt->bind_param("i", $authorId);
    $stmt->execute();

    $result = $stmt->get_result();
    if (!$result) {
        die("Getting result set failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    return $result;
}

// Function to count books by author
function countBooksByAuthor($authorId) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT COUNT(*) as book_count FROM Books WHERE AuthorID = ?");
    $stmt->bind_param("i", $authorId);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc()['book_count'];
    $stmt->close();
    $conn->close();
    return $count;
}

// Function to add a new book
function addBook($title, $genre, $authorid) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("INSERT INTO Books (Title, Genre, AuthorID) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $genre, $authorid);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

// Function to get a single book by ID
function getBookById($bookid) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT BookID, Title, Genre, AuthorID FROM Books WHERE BookID = ?");
    $stmt->bind_param("i", $bookid);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $book;
}

// Function to update an existing book
function updateBook($bookid, $title, $genre, $authorid) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("UPDATE Books SET Title = ?, Genre = ?, AuthorID = ? WHERE BookID = ?");
    $stmt->bind_param("ssii", $title, $genre, $authorid, $bookid);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

// Function to delete a book by ID
function deleteBook($bookid) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("DELETE FROM Books WHERE BookID = ?");
    $stmt->bind_param("i", $bookid);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
