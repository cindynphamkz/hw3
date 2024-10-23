<?php
function selectInstructors() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT instructor_id, instructor_name, office_number FROM `instructor`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectCoursesByInstructor($iid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT c.course_id, course_number, course_description, semester, room, day_time FROM `course` c join section s on s.course_id = c.course_id where s.instructor_id=?");
        $stmt->bind_param("i", $iid);
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectInstructorsForInput() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT instructor_id, instructor_name FROM `instructor` order by instructor_name");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectCoursesForInput() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT course_id, course_number FROM `course` order by course_number");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}


function insertSection($iid, $cid, $sem, $room, $time) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `section` (`instructor_id`, `course_id`, `semester`, `room`, `time`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisss", $iid, $cid, $sem, $room, $time);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function updateSection($iid, $cid, $sem, $room, $time, $sid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `section` SET `instructor_id` = ?, `course_id` = ?, `semester` = ?, `room` = ?, `time` = ? WHERE `section_id` = ?");
        $stmt->bind_param("iisssi", $iid, $cid, $sem, $room, $time, $sid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deleteSection($sid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("DELETE FROM `section` WHERE `section_id` = ?");
        $stmt->bind_param("i", $sid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

?>
