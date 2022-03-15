<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname="e_classe_db";
    $connect=mysqli_connect($servername,$username,$password,"$dbname");
    if(!$connect){
        die('Could not connect My sql:' .mysql_error());
    }
?>