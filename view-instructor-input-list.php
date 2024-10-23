<select class="form-select" id="iid" name="iid">
<?php
while ($instructorItem = $instructorList->fetch_assoc()) {
?>
  <option value=<?php echo $instructorItem['instructor_id']; ?>"><?php echo $instructorItem['instructor_name']; ?></option>
<?php
}
?>
</select>
