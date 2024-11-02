<?php
require_once("model-books.php");
require_once("model-authors.php");
$pageTitle = "Books";
include "view-header.php";

$genre = isset($_POST['genre']) ? $_POST['genre'] : '';
$books = selectBooksByGenre($genre);

$authors = selectAuthors();
?>

<!-- Add New Book Button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">Add New Book</button>

<!-- Add Book Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="add-book.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Add New Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                    <br>
                    <label for="genre">Genre:</label>
                    <input type="text" id="genre" name="genre" required>
                    <br>
                    <label for="authorid">Author:</label>
                    <select id="authorid" name="authorid" required>
                        <?php while ($author = $authors->fetch_assoc()): ?>
                            <option value="<?php echo $author['authorid']; ?>"><?php echo htmlspecialchars($author['name']); ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Book</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Filter Form -->
<form method="POST" action="books.php" class="mt-4">
    <label for="genre">Filter by Genre:</label>
    <select name="genre" id="genre">
        <option value="">All Genres</option>
        <option value="Fantasy" <?php if ($genre == "Fantasy") echo "selected"; ?>>Fantasy</option>
        <option value="Mystery" <?php if ($genre == "Mystery") echo "selected"; ?>>Mystery</option>
        <option value="Romance" <?php if ($genre == "Romance") echo "selected"; ?>>Romance</option>
    </select>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>

<h1>Books</h1>
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Genre</th>
            <th>Author ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($book = $books->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($book['Title']); ?></td>
                <td><?php echo htmlspecialchars($book['Genre']); ?></td>
                <td><?php echo htmlspecialchars($book['AuthorID']); ?></td>
                <td>
                    <a href="edit-book.php?id=<?php echo $book['BookID']; ?>" class="btn btn-warning">Edit</a>
                    <a href="delete-book.php?id=<?php echo $book['BookID']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include "view-footer.php"; ?>
