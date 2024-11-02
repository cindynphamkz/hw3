<?php
include 'db.php';

$authorId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$author = $pdo->prepare("SELECT * FROM Authors WHERE AuthorID = ?");
$author->execute([$authorId]);
$author = $author->fetch(PDO::FETCH_ASSOC);

if (!$author) {
    echo "Author not found!";
    exit;
}

$books = $pdo->prepare("SELECT * FROM Books WHERE AuthorID = ?");
$books->execute([$authorId]);
$books = $books->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($author['Name']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($author['Name']); ?></h1>
    <p><?php echo htmlspecialchars($author['Bio']); ?></p>

    <h2>Books by this author:</h2>
    <ul>
        <?php foreach ($books as $book): ?>
            <li><?php echo htmlspecialchars($book['Title']) . " (" . htmlspecialchars($book['Genre']) . ")"; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Back to all authors</a>
</body>
</html>
