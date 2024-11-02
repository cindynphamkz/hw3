<?php
require_once("model-books.php");
$pageTitle = "Books by Author";
include "view-header.php";

// Assume author ID is passed as a query parameter, e.g., books-by-author.php?id=1
$authorId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$books = selectBooksByAuthor($authorId);

if ($books->num_rows > 0) {
    echo "<h1>Books by Author</h1>";
    echo "<table class='table'>";
    echo "<thead><tr><th>Title</th><th>Genre</th></tr></thead><tbody>";
    while ($book = $books->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($book['Title']) . "</td><td>" . htmlspecialchars($book['Genre']) . "</td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>No books found for this author.</p>";
}

include "view-footer.php";
?>
