<?php
require_once("model-authors.php");

$authorid = $_GET['id'];
deleteAuthor($authorid);
echo "<script>alert('Author deleted successfully!'); window.location.href='authors.php';</script>";
?>
