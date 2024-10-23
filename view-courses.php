<head>
  <!-- Bootstrap CSS (if needed) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="row">
    <div class="col">
      <h1>Courses</h1>
    </div>
    <div class="col-auto">
      <!-- Embed the downloaded SVG file -->
      <img src="assets/icons/plus-circle.svg" alt="Plus Circle" width="32" height="32">
    </div>
  </div>

  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Number</th>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while ($course = $courses->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $course['course_id']; ?></td>
          <td><?php echo $course['course_number']; ?></td>
          <td><?php echo $course['course_description']; ?></td>
          <td>
            <form method="post" action="sections-by-course.php">
              <input type="hidden" name="cid" value="<?php echo $course['course_id']; ?>">
              <button type="submit" class="btn btn-primary">Sections</button>
            </form>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
