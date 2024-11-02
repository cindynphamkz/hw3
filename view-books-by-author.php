<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books by <?php echo htmlspecialchars($authorName); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Books by <?php echo htmlspecialchars($authorName); ?></h1>
    
    <?php if ($books && $books->num_rows > 0): ?>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Genre</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($book = $books->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($book['title']); ?></td>
                        <td><?php echo htmlspecialchars($book['genre']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No books found for this author.</p>
    <?php endif; ?>
</div>

<!-- Bootstrap JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
