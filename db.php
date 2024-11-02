<?php
function get_db_connection() {
    $conn = new mysqli('138.197.17.168', 'cindypha_hw3user', 'mI$04K.pv3-i', 'cindypha_hw3');
    if ($conn->connect_error) {
        return false;
    }
    return $conn;
}
?>
