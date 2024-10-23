<select class="form-select" id="iid" name="iid">
<?php
while ($instructorItem = $instructorList->fetch_assoc()) {
    $selText = "";
    if ($selectedInstructor == $instructorItem['instructor_id']) {
        $selText = " selected";
    }
?>
    <option value="<?php echo $instructorItem['instructor_id']; ?>"<?php echo $selText; ?>><?php echo $instructorItem['instructor_name']; ?></option>
<?php
}
?>
</select>
