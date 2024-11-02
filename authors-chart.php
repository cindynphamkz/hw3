<?php
require_once("model-authors.php");
$pageTitle = "Authors Chart";
include "view-header.php";

// Fetch authors data
$authors = selectAuthors();
$authorNames = [];
$bookCounts = [];

// Assuming you have a function that counts books per author
require_once("model-books.php");
while ($author = $authors->fetch_assoc()) {
    $authorNames[] = $author['name'];
    $bookCounts[] = countBooksByAuthor($author['authorid']); // Replace with the actual count function
}
?>

<div class="container">
    <h1>Authors Chart</h1>
    <canvas id="authorChart" width="400" height="200"></canvas>
</div>

<!-- Include Chart.js library from CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Get data from PHP
const authorNames = <?php echo json_encode($authorNames); ?>;
const bookCounts = <?php echo json_encode($bookCounts); ?>;

// Create the chart
const ctx = document.getElementById('authorChart').getContext('2d');
const authorChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: authorNames,
        datasets: [{
            label: 'Number of Books',
            data: bookCounts,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<?php include "view-footer.php"; ?>
