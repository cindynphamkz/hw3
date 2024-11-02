<?php
require_once("model-authors.php");
$pageTitle = "Edit Author";
include "view-header.php";

$authorid = $_GET['id'];
$author = getAuthorById($authorid);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $bio = $_POST["bio"];
    updateAuthor($authorid, $name, $bio);
    echo "<script>alert('Author updated successfully!'); window.location.href='authors.php';</script>";
}
?>

<form method="POST" action="edit-author.php?id=<?php echo $authorid; ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($author['name']); ?>" required>
    <br>
    <label for="bio">Bio:</label>
    <textarea id="bio" name="bio" required><?php echo htmlspecialchars($author['bio']); ?></textarea>
    <br>
    <button type="submit" class="btn btn-primary">Update Author</button>
</form>

<?php include "view-footer.php"; ?>
