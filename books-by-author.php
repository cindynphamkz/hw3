<?php
require_once("model-books.php");
$pageTitle = "Books by Author";
include "view-header.php";

// Get the author ID from the URL parameter
$authorId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the books for this author
$books = selectBooksByAuthor($authorId);

echo "<h1>Books by Author</h1>";
if ($books && $books->num_rows > 0) {
    echo "<table class='table'>";
    echo "<thead><tr><th>Title</th><th>Genre</th></tr></thead><tbody>";

    while ($book = $books->fetch_assoc()) {
        $title = htmlspecialchars($book['Title']);
        $genre = htmlspecialchars($book['Genre']);

        echo "<tr><td>$title</td><td>$genre</td></tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>Choose an author on the Authors page.</p>";
}

include "view-footer.php";
?>
