<?php
    include_once 'db.php';

    if(isset($_POST['save'])){
        $image=$_FILES['logo']['name'];
        if(!file_exists('./image/')){
            mkdir('./image/');
        }
        move_uploaded_file($_FILES['logo']['tmp_name'],'image/'.$_FILES['logo']['name']);
        $title=$_POST['title'];
        $lien=$_POST['lien'];
        $insert= "INSERT INTO courses(logo,title,lien) values ('$image','$title','$lien')";
        $course['logo'] = $image;
        if(mysqli_query($connect, $insert)){
            header('location:courses.php');
        }
        else{
            echo "Error: " . $insert . "
    " . mysqli_error($connect);
        }
        
        mysqli_close($connect);
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
    <title>Add New Course</title>
</head>
<body >
<div class="container-fluid container-md vh-100 d-flex  align-items-center justify-content-center">
    
            
        <div class="col-md-6 col-auto">

            <h3 class="text-center">
                    Add New Course
            </h3>
            <form method="POST"  class=" bg-white rounded-2 p-3 " enctype="multipart/form-data"> 
                <div class="form-group mb-3 ">
                    <label >Image</label>
                    <input name="logo" type="file" class="form-control-file w-100">
                </div>
                <div class="form-group mb-3">
                    <label>Title</label>
                    <input name="title"  class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Lien</label>
                    <input name="lien"  class="form-control">
                </div>
                <div class="form-group mb-3 d-flex">
                    <input class="btn btn-outline-info text-secondary text-uppercase fw-bolder w-50" name="save" value="save" type="submit" ></input>
                    <boutton class="btn btn-outline-secondary  text-uppercase  fw-bolder w-50" type="submit"><a href="courses.php" class="text-decoration-none text-info" >back</a></boutton>
                </div>
            </form>
        </div>
</div>

</body>
</html>