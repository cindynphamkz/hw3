<?php
require_once("model-books.php");
require_once("model-authors.php");
$pageTitle = "Edit Book";
include "view-header.php";

$bookid = $_GET['id'];
$book = getBookById($bookid);
$authors = selectAuthors();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $genre = $_POST["genre"];
    $authorid = $_POST["authorid"];
    updateBook($bookid, $title, $genre, $authorid);
    echo "<script>alert('Book updated successfully!'); window.location.href='books.php';</script>";
}
?>

<form method="POST" action="edit-book.php?id=<?php echo $bookid; ?>">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($book['Title']); ?>" required>
    <br>
    <label for="genre">Genre:</label>
    <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($book['Genre']); ?>" required>
    <br>
    <label for="authorid">Author:</label>
    <select id="authorid" name="authorid" required>
        <?php while ($author = $authors->fetch_assoc()): ?>
            <option value="<?php echo $author['authorid']; ?>" <?php if ($book['AuthorID'] == $author['authorid']) echo 'selected'; ?>>
                <?php echo htmlspecialchars($author['name']); ?>
            </option>
        <?php endwhile; ?>
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Update Book</button>
</form>

<?php include "view-footer.php"; ?>
