<!-- view-authors.php -->
<h1>Authors List</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Bio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($authors as $author): ?>
        <tr>
            <td><?php echo $author['author_id']; ?></td>
            <td><?php echo htmlspecialchars($author['name']); ?></td>
            <td><?php echo htmlspecialchars($author['bio']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
