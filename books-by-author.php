<?php
require_once("model-books.php");
$pageTitle = "Books by Author";
include "view-header.php";

// Retrieve the author ID from the query parameter
$authorId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Placeholder author name; replace this with a query to fetch the actual author name if available
$authorName = "Author Name"; // Optional: Retrieve actual name if possible
$books = selectBooksByAuthor($authorId);

// Include the view file for displaying books by author
include "view-books-by-author.php";

include "view-footer.php";
?>
