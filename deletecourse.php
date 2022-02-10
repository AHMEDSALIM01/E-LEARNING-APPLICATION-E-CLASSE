<?php
    include_once 'db.php';
    $dlt= "DELETE FROM courses WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($connect, $dlt)) {
        header('location:courses.php');
    } else {
        echo "Error deleting record: " . mysqli_error($connect);
    }
    mysqli_close($connect);
?>