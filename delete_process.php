<?php
    include_once 'db.php';
    session_start();
    if(!isset($_SESSION['name']) || !isset($_SESSION['email'])){
        header('location:index.php');
    }
    else{
        
        $dlt= "DELETE FROM students WHERE id='" . $_GET["id"] . "'";
        if (mysqli_query($connect, $dlt)) {
            header('location:student.php');
        } else {
            echo "Error deleting record: " . mysqli_error($connect);
        }
        mysqli_close($connect);

    }
    
?>