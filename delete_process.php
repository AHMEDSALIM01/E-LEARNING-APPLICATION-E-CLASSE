<?php
    include_once 'db.php';
    $dlt= "DELETE FROM students WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($connect, $dlt)) {
        header('location:student.php');
    } else {
        echo "Error deleting record: " . mysqli_error($connect);
    }
    mysqli_close($connect);
?>