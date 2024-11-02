<?php
require_once("model-books.php");
$pageTitle = "Books by Author";
include "view-header.php";

$authorId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$authorName = "Author Name"; // Replace with a function or query to retrieve the actual author name
$books = selectBooksByAuthor($authorId);

// Include the view file for displaying books by author
include "view-books-by-author.php";

include "view-footer.php";
?>
