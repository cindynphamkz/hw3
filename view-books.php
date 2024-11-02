<div class="container mt-5">
    <h1>Books</h1>

    <?php if ($books && $books->num_rows > 0): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Author ID</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($book = $books->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($book['Title']); ?></td>
                        <td><?php echo htmlspecialchars($book['Genre']); ?></td>
                        <td><?php echo htmlspecialchars($book['AuthorID']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No books found for this genre.</p>
    <?php endif; ?>
</div>
