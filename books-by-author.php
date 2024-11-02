<?php
require_once("model-books.php");
$pageTitle = "Books by Author";
include "view-header.php";

$authorId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$authorName = "Author Name";
$books = selectBooksByAuthor($authorId);

include "view-books-by-author.php";

include "view-footer.php";
?>
