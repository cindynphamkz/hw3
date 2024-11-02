<?php
require_once("model-books.php");
$pageTitle = "Books";
include "view-header.php";

// Get the selected genre from the POST request
$genre = isset($_POST['genre']) ? $_POST['genre'] : '';

// Fetch books based on the selected genre (or all books if no genre is selected)
$books = selectBooksByGenre($genre);
?>

<!-- Filter Form -->
<form method="POST" action="books.php" class="mt-4">
    <label for="genre">Filter by Genre:</label>
    <select name="genre" id="genre">
        <option value="">All Genres</option>
        <option value="Fantasy" <?php if ($genre == "Fantasy") echo "selected"; ?>>Fantasy</option>
        <option value="Mystery" <?php if ($genre == "Mystery") echo "selected"; ?>>Mystery</option>
        <option value="Romance" <?php if ($genre == "Romance") echo "selected"; ?>>Romance</option>
        <!-- Add more genres as needed -->
    </select>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>

<?php
// Display the books using the view file
include "view-books.php";

include "view-footer.php";
?>
