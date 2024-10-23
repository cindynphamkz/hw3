<html>
<head>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
  <h1>Test Page</h1>
  <!-- Using the Bootstrap icon via <i> tag -->
  <i class="bi bi-plus-circle" style="font-size: 32px; color: black;"></i>
</body>
</html>

<head>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
  <div class="row">
    <div class="col">
      <h1>Courses</h1>
    </div>
    <div class="col-auto">
      <!-- Using the Bootstrap icon via <i> tag -->
      <i class="bi bi-plus-circle" style="font-size: 32px;"></i>
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
