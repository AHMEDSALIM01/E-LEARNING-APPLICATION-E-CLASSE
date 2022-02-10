<?php
    include_once 'db.php';
    if($_GET['id']){
        $update = mysqli_query($connect,"SELECT * FROM students WHERE id='" . $_GET['id']. "'");
        $Students=mysqli_fetch_array($update);
    }   
    if(count($_POST)>0){
        $imagename=$_FILES['avatar']['name'];
        if($imagename){
            unlink('./image/'.$imagename);
            move_uploaded_file($_FILES['avatar']['tmp_name'],'./image/'.$imagename);
        }
        else{
            $imagename=$Students['avatar'];
        }
        mysqli_query($connect,"UPDATE students set avatar='" . $imagename . "', name='" . $_POST['name'] . "', email='" . $_POST['email'] . "', phone='" . $_POST['phone'] . "', enroll_number='" . $_POST['enroll_number'] . "', date_of_admission='" . $_POST['date_of_admission'] . "' WHERE id='" . $_POST['id'] . "'");
        if(isset($_POST['save'])){
            header('location:student.php');
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/my-bootstrap.css">
    <link rel="shortcut icon" type="image/png" href="img/favicons.png">
    <title>Update Student</title>
</head>
<body >
<div class="container-fluid container-md vh-100 d-flex  align-items-center justify-content-center">
    
            
        <div class="col-md-6 col-auto">

            <h3 class="text-center">
                    Update Student
            </h3>
            <form method="POST"  class=" bg-white rounded-2 p-3 " enctype="multipart/form-data" action="">
                <div class="form-group mb-3">
                    <input name="id" type="hidden" class="txtField form-control-file" value="<?php echo $Students['id']; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Image</label>
                    <input name="avatar" type="file" class="txtField  form-control-file" value="<?php echo $Students['avatar']; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input name="name" type="text"  class="txtField form-control" value="<?php echo $Students['name']; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input name="email" type="email" class="txtField form-control" value="<?php echo $Students['email']; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Phone</label>
                    <input name="phone" type="text" class="txtField form-control" value="<?php echo $Students['phone']; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Enroll Number</label>
                    <input name="enroll_number" type="text" class="txtField form-control" value="<?php echo $Students['enroll_number']; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Date Of Admission</label>
                    <input name="date_of_admission" type="date" class="txtField form-control" value="<?php echo $Students['date_of_admission']; ?>">
                </div>
                <div class="form-group mb-3 d-flex">
                    <input class="btn btn-outline-info text-secondary text-uppercase fw-bolder w-50" name="save" value="save" type="submit" ></input>
                    <boutton class="btn btn-outline-secondary  text-uppercase fw-bolder w-50" ><a href="student.php" class="text-decoration-none text-info" >back</a></boutton>
                </div>
            </form>
        </div>
</div>

</body>
</html>