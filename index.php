<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors and Books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Authors and Their Books</h1>
    <?php
    $authors = $pdo->query("SELECT * FROM Authors")->fetchAll(PDO::FETCH_ASSOC);

    foreach ($authors as $author) {
        echo "<h2><a href='author.php?id=" . $author['AuthorID'] . "'>" . htmlspecialchars($author['Name']) . "</a></h2>";
        echo "<p>" . htmlspecialchars($author['Bio']) . "</p>";

        $books = $pdo->prepare("SELECT * FROM Books WHERE AuthorID = ?");
        $books->execute([$author['AuthorID']]);
        $books = $books->fetchAll(PDO::FETCH_ASSOC);

        if ($books) {
            echo "<ul>";
            foreach ($books as $book) {
                echo "<li>" . htmlspecialchars($book['Title']) . " (" . htmlspecialchars($book['Genre']) . ")</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No books found for this author.</p>";
        }
    }
    ?>
</body>
</html>
