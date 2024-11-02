<?php
require_once("model-books.php");
$pageTitle = "Books by Author";
include "view-header.php";

$authorId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$books = selectBooksByAuthor($authorId);

if ($books && $books->num_rows > 0) {
    echo "<h1>Books by Author</h1>";
    echo "<table class='table'>";
    echo "<thead><tr><th>Title</th><th>Genre</th></tr></thead><tbody>";

    while ($book = $books->fetch_assoc()) {
        // Use the correct lowercase keys
        $title = isset($book['title']) ? htmlspecialchars($book['title']) : 'N/A';
        $genre = isset($book['genre']) ? htmlspecialchars($book['genre']) : 'N/A';

        echo "<tr><td>" . $title . "</td><td>" . $genre . "</td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>No books found for this author.</p>";
}

include "view-footer.php";
?>
