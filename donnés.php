<?php
    include_once 'db.php';

    if(isset($_POST['save'])){
        $image=$_FILES['avatar']['name'];
        if(!file_exists('./image/')){
            mkdir('./image/');
    }
    move_uploaded_file($_FILES['avatar']['tmp_name'],'./image/'.$_FILES['avatar']['name']);
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $enroll_number=$_POST['enroll_number'];
    $date_of_admission=$_POST['date_of_admission'];
    $insert= "INSERT INTO students(avatar,name,email,phone,enroll_number,date_of_admission) values ('$image','$name','$email','$phone','$enroll_number','$date_of_admission')";
    if(mysqli_query($connect, $insert)){
        header('location:student.php');
    }
    else{
        echo "Error: " . $insert . " " . mysqli_error($connect);
    }
    
    mysqli_close($connect);
}
?>
