<?php
    include_once 'db.php';
    session_start();
        $phoneErr="";
        $emailErr="";
        $nameErr="";
        $enrollErr="";
        $dateErr="";
        $pregphone="";
        $pregname="";
        $pregemail="";
        $pregDate="";
        $pregenroll="";
    // if(!isset($_SESSION['name']) || !isset($_SESSION['email'])){
    //     header('location:index.php');
    // }
    // else{
        if(isset($_POST['save'])){
            $image=$_FILES['avatar']['name'];
            if(!file_exists('./image/')){
                mkdir('./image/');
            }
            move_uploaded_file($_FILES['avatar']['tmp_name'],'./image/'.$_FILES['avatar']['name']);
            if(empty($_POST['name'])){
                $nameErr="Name is required";
            }
            elseif(empty($_POST['email'])){
                $emailErr="Email is required";
            }
            elseif(empty($_POST['phone'])){
                $phoneErr="Phone is required";
            }
            elseif(empty($_POST['enroll_number'])){
               $enrollErr="Enroll no is required";
            }
            else{
                if(!preg_match("/^[a-zA-Z ]{3,20}$/",$_POST['name']) ){
                    $pregname="Minimum three in length,only lowercase,uppercase letters and space.";
                }
               
                elseif(!preg_match("/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/",$_POST['email'])){
                    $pregemail="Please write your email correctly with this form example@gmail.com";
                }
                
                elseif(!preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/",$_POST['phone'])){
                    $pregphone="Invalid phone number please write a correct phone number";
                }
                
                elseif(!preg_match("/^[0-9]{4,40}$/",$_POST['enroll_number'])){
                    $pregenroll="Minimum four in length,only numbers";
                }
                else{

                $name=htmlspecialchars($_POST['name']);
                $email=htmlspecialchars($_POST['email']);
                $phone=htmlspecialchars($_POST['phone']);
                $enroll_number=htmlspecialchars($_POST['enroll_number']);
                $date_of_admission=htmlspecialchars($_POST['date_of_admission']);
            
                $insert= "INSERT INTO students(avatar,name,email,phone,enroll_number,date_of_admission) values ('$image','$name','$email','$phone','$enroll_number','$date_of_admission')";
                if(mysqli_query($connect, $insert)){
                    header('location:student.php');
                }
                else{
                    echo "Error: " . $insert . " " . mysqli_error($connect);
                }
                
                mysqli_close($connect);}
            }
        }
    // }
    
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
    <title>Add New Student</title>
</head>
<body >
<div class="container-fluid container-md vh-100 d-flex  align-items-center justify-content-center">
    
            
        <div class="col-md-6 col-auto">

            <h3 class="text-center">
                    Add new Student
            </h3>
            <form method="POST"  class=" bg-white rounded-2 p-3 " action="" enctype="multipart/form-data"> 
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                </svg>
                <div class="form-group mb-3">
                    <label>Image</label>
                    <input name="avatar" type="file" class="form-control-file w-100">
                </div>
                <div class="form-group mb-3">
                    <label>Name *</label>
                    <input name="name" type="text" value="<?php echo $_POST['name'] ?? ""; ?>" class="form-control">
                    <?php if(!empty($nameErr)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $nameErr;?></span>
                    <?php }?>
                    
                    <?php if(!empty($pregname)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $pregname;?></span>
                    <?php }?>
                </div>
                <div class="form-group mb-3">
                    <label>Email *</label>
                    <input name="email" type="text" value="<?php echo $_POST['email'] ?? ""; ?>" class="form-control">
                    <?php if(!empty($emailErr)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $emailErr;?></span>
                    <?php }?>
                    
                    <?php if(!empty($pregemail)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $pregemail;?></span>
                    <?php }?>
                </div>
                <div class="form-group mb-3">
                    <label>Phone *</label>
                    <input name="phone" type="text" value="<?php echo $_POST['phone'] ?? ""; ?>" class="form-control  ">
                    <?php if(!empty($phoneErr)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $phoneErr;?></span>
                    <?php }?>
                    
                    <?php if(!empty($pregphone)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $pregphone;?></span>
                    <?php }?>
                </div>
                <div class="form-group mb-3">
                    <label>Enroll Number *</label>
                    <input name="enroll_number" type="text" value="<?php echo $_POST['enroll_number'] ?? ""; ?>" class="form-control ">
                    <?php if(!empty($enrollErr)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $enrollErr;?></span>
                    <?php }?>

                    <?php if(!empty($pregenroll)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $pregenroll;?></span>
                    <?php }?>
                </div>
                <div class="form-group mb-3">
                    <label>Date Of Admission *</label>
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