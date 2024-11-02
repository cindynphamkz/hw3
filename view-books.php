<!-- view-books.php -->
<h1>Books List</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Author ID</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?php echo $book['book_id']; ?></td>
            <td><?php echo htmlspecialchars($book['title']); ?></td>
            <td><?php echo htmlspecialchars($book['genre']); ?></td>
            <td><?php echo $book['author_id']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
