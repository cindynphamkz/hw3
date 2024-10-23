<div class="row">
  <div class="col">
    <h1>Courses</h1>
  </div>
  <div class="col-auto">
    <!-- Plus Circle Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14z"/>
      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
    </svg>
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
<?php
while ($course = $courses->fetch_assoc()){
?>
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
<?php
}
?>
    </tbody>
  </table>
</div>
