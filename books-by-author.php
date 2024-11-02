<?php
require_once("model-books.php");
$pageTitle = "Books by Author";
include "view-header.php";

$authorId = $_GET['id'];
$books = selectBooksByAuthor($authorId);
?>

<h1>Books by Author</h1>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($book = $books->fetch_assoc()): ?>
            <tr>
                <td><?php echo $book['book_id']; ?></td>
                <td><?php echo htmlspecialchars($book['title']); ?></td>
                <td><?php echo htmlspecialchars($book['genre']); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include "view-footer.php"; ?>
