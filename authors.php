<?php
require_once("model-authors.php");
$pageTitle = "Authors";
include "view-header.php";

$authors = selectAuthors();
?>

<h1>Authors</h1>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Bio</th>
                <th>Books</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($author = $authors->fetch_assoc()): ?>
            <tr>
                <td><?php echo $author['authorid']; ?></td>
                <td><?php echo htmlspecialchars($author['name']); ?></td>
                <td><?php echo htmlspecialchars($author['bio']); ?></td>
                <td><a href="books-by-author.php?id=<?php echo $author['authorid']; ?>">View Books</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include "view-footer.php"; ?>
