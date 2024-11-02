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

    <!-- Search form to filter authors by name -->
    <form method="POST" action="index.php">
        <input type="text" name="author_name" placeholder="Search by author name">
        <button type="submit">Search</button>
    </form>

    <?php
    // Check if there is a search term submitted via POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['author_name'])) {
        $name = "%" . $_POST['author_name'] . "%";
        $stmt = $pdo->prepare("SELECT * FROM Authors WHERE Name LIKE ?");
        $stmt->execute([$name]);
        $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Default query to retrieve all authors
        $authors = $pdo->query("SELECT * FROM Authors")->fetchAll(PDO::FETCH_ASSOC);
    }

    // Display authors and their related books
    foreach ($authors as $author) {
        echo "<h2><a href='author.php?id=" . $author['AuthorID'] . "'>" . htmlspecialchars($author['Name']) . "</a></h2>";
        echo "<p>" . htmlspecialchars($author['Bio']) . "</p>";

        // Retrieve related books for each author
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
