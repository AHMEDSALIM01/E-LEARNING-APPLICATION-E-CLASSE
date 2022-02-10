<php>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/my-bootstrap.css">
    <link rel="shortcut icon" type="image/png" href="img/favicons.png">
    <title>Add New Student</title>
</head>
<body >
<div class="container-fluid container-md vh-100 d-flex  align-items-center justify-content-center">
    
            
        <div class="col-md-6 col-auto">

            <h3 class="text-center">
                    Add new Student
            </h3>
            <form method="POST"  class=" bg-white rounded-2 p-3 " action="donnés.php" enctype="multipart/form-data"> 
                <div class="form-group mb-3">
                    <label>Image</label>
                    <input name="avatar" type="file" class="form-control-file w-100">
                </div>
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input name="name"  class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input name="email"  class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Phone</label>
                    <input name="phone" class="form-control  ">
                </div>
                <div class="form-group mb-3">
                    <label>Enroll Number</label>
                    <input name="enroll_number" class="form-control ">
                </div>
                <div class="form-group mb-3">
                    <label>Date Of Admission</label>
                    <input name="date_of_admission" type="date" class="form-control ">
                </div>
                <div class="form-group mb-3 d-flex">
                    <input class="btn btn-outline-info text-secondary text-uppercase fw-bolder w-50" name="save" value="save" type="submit" ></input>
                    <boutton class="btn btn-outline-secondary  text-uppercase  fw-bolder w-50" type="submit"><a href="student.php" class="text-decoration-none text-info" >back</a></boutton>
                </div>
            </form>
        </div>
</div>

</body>
</html>