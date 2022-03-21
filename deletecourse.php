<?php
    include_once 'db.php';
    session_start();
    if(!isset($_SESSION['name']) || !isset($_SESSION['email'])){
        header('location:index.php');
    }
    else{
        $dlt= "DELETE FROM courses WHERE id='" . $_GET["id"] . "'";
        if (mysqli_query($connect, $dlt)) {
            header('location:courses.php');
        } else {
            echo "Error deleting record: " . mysqli_error($connect);
        }
        mysqli_close($connect); 
    }
    
?>