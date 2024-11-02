<?php
require_once("model-authors.php");
$pageTitle = "Authors";
include "view-header.php";

$authors = selectAuthors();
?>

<!-- Add New Author Button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAuthorModal">Add New Author</button>

<!-- Add Author Modal -->
<div class="modal fade" id="addAuthorModal" tabindex="-1" aria-labelledby="addAuthorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="add-author.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAuthorModalLabel">Add New Author</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    <br>
                    <label for="bio">Bio:</label>
                    <textarea id="bio" name="bio" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Author</button>
                </div>
            </form>
        </div>
    </div>
</div>

<h1>Authors</h1>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Bio</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($author = $authors->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($author['name']); ?></td>
                <td><?php echo htmlspecialchars($author['bio']); ?></td>
                <td>
                    <a href="books-by-author.php?id=<?php echo $author['authorid']; ?>" class="btn btn-info">View Books</a> <!-- Added View Books link -->
                    <a href="edit-author.php?id=<?php echo $author['authorid']; ?>" class="btn btn-warning">Edit</a>
                    <a href="delete-author.php?id=<?php echo $author['authorid']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this author?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include "view-footer.php"; ?>
