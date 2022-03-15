<?php
    include_once 'db.php';
    if($_GET["id"]){
    $update = mysqli_query($connect,"SELECT * FROM courses WHERE id='" . $_GET['id']. "'");
    $course=mysqli_fetch_array($update);
    if(count($_POST) > 0) {

        $imagename=$_FILES['logo']['name'];
            if($imagename){
                unlink('./image/'.$course['logo']);
                move_uploaded_file($_FILES['logo']['tmp_name'],'./image/'.$imagename);
            }else{
                $imagename=$course['logo'];
            }
            mysqli_query($connect,"UPDATE courses set logo='" . $imagename . "', title='" . $_POST['title'] . "', lien='" . $_POST['lien']  . "' WHERE id='" . $_POST['id'] . "'");
            if(isset($_POST['save'])){
                header('location:courses.php');
            }
    }
    }
    mysqli_close($connect);
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
    <title>Update Course</title>
</head>
<body >
<div class="container-fluid container-md vh-100 d-flex  align-items-center justify-content-center">
    
            
        <div class="col-md-6 col-auto">

            <h3 class="text-center">
                    Update Course
            </h3>
            <form method="POST"  class=" bg-white rounded-2 p-3 " enctype="multipart/form-data" action="">
                <div class="form-group mb-3">
                    <input name="id" type="hidden" class="txtField form-control-file" value="<?php echo $course['id']; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Image</label>
                    <input name="logo" type="file" class="txtField  form-control-file" value="<?php echo $course['logo']; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Title</label>
                    <input name="title" type="text"  class="txtField form-control" value="<?php echo $course['title']; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Lien</label>
                    <input name="lien" type="text" class="txtField form-control" value="<?php echo $course['lien']; ?>">
                </div>
                <div class="form-group mb-3 d-flex">
                    <input class="btn btn-outline-info text-secondary text-uppercase fw-bolder w-50" name="save" value="save" type="submit" ></input>
                    <boutton class="btn btn-outline-secondary  text-uppercase fw-bolder w-50" ><a href="courses.php" class="text-decoration-none text-info" >back</a></boutton>
                </div>
            </form>
        </div>
</div>

</body>
</html>