<?php
require_once("model-authors.php");
$pageTitle = "Authors";
include "view-header.php";

// Retrieve authors
$authors = selectAuthors();

if ($authors && $authors->num_rows > 0) {
    echo "<h1>Authors</h1>";
    echo "<table class='table'>";
    echo "<thead><tr><th>Name</th><th>Bio</th><th>Books</th></tr></thead><tbody>";

    while ($author = $authors->fetch_assoc()) {
        $authorId = $author['authorid'];
        $authorName = htmlspecialchars($author['name']);
        $bio = htmlspecialchars($author['bio']);

        echo "<tr>";
        echo "<td>$authorName</td>";
        echo "<td>$bio</td>";
        echo "<td><a href='books-by-author.php?id=$authorId'>View Books</a></td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>No authors found.</p>";
}

include "view-footer.php";
?>
