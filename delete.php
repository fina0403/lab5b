<?php
include 'config.php';

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    $conn->query("DELETE FROM users WHERE matric = '$matric'");
}

header("Location: display.php");
exit();
?>
