<?php
    session_start();
    include_once('db.php');
        $cookie=$_POST['check'] ?? "";
        $em=$_COOKIE['email'] ?? "";
        $pass=$_COOKIE['password'] ?? "";
        $alerte="";
        $alertepass="";
        $nameErr="";
        $passErr="";
        $pregpass="";
        $pregemail="";
    if(isset($_POST['submit'])){
        $name=$_POST['email'];
        $password=$_POST['password'];

        if(empty($name)){
            $nameErr="Name or emailis required";
        }
        
        elseif(empty($password)){
            $passErr="password is required";
        }
        else{
            if(!preg_match("/^[a-zA-Z -]{3,15}$/",$name) && !preg_match("/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/",$name)){
                $pregemail="Invalid Format";
            }
            else{
            $data=mysqli_query($connect,"SELECT * FROM users WHERE name='$name' OR email='$name'") or die(); 
            $result=mysqli_fetch_array($data);
            
            if($result){
                if(!preg_match("/^(?=.*?[a-z])(?=.*?[0-9]).{6,}$/",$password)){
                    $pregpass="Minimum six in length,At least one special character or space";
                }

                else{
                    if($result['password']===$password ){
                        $_SESSION['avatar']=$result['avatar'];
                        $_SESSION['name']=$result['name'];
                        $_SESSION['email']=$result['email'];
                        $_SESSION['last_login_timestamp']=time();
                        header('location:dashboard.php');
                        
                    }
                    else{
                        $alerte="Invalid Password ";
                    }
                }
            }

            else{
                $alertepass="There is no user with this email";
            }
                    
            if($cookie=="1"){
                setcookie("email",$name,time() + 60*60*24);
                setcookie("password",$password,time() + 60*60*24);        
            }

            else{
                setcookie("email","");
                setcookie("password","");  
            }
        }
    }}
    if(isset($_SESSION['name']) || isset($_SESSION['email'])){
        header("location:dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="CSS/my-bootstrap.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="shortcut icon" type="image/png" href="img/favicons.png">
    <title>E-LEARNING</title>
    

</head>
<body>
    <main>

        <section class="container-fluid vh-100">
            <section class="row justify-content-center align-items-center h-100">
                <section class="col-10 col-sm-8 col-md-6 col-lg-4  ">
                    <form action="" class="bg-white py-3 px-3" method="post">
                        <div class="m-4 ">
                             <a href="#" class="navbar-brand text-dark   border-start border-3 border-info px-2 mx-3"> E-classe</a>
                        </div>
                        <h6 class="title fw-bolder text-center mb-2">SIGN IN</h6>
                        <p class="test text-secondary  text-center">Enter your credentials to access your account</p>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </symbol>
                        </svg>
                        <?php if(!empty($alerte)){ ?>
                            <div class="alert alert-danger d-flex justify-content-center align-items-center" role="alert" style="height:20px;">
                                <svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div class="fs-6" style="font-size:8px">
                                    <?php echo $alerte ?>
                                </div>
                            </div>
                        <?php }?>
                        <?php if(!empty($alertepass)){ ?>
                            <div class="alert alert-danger d-flex justify-content-center align-items-center" role="alert" style="height:20px;">
                                <svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div class="fs-6" style="font-size:8px">
                                    <?php echo $alertepass ?>
                                </div>
                            </div>
                        <?php }?>
                        <div class="mb-2">
                            <label for="Email" class="form-label text-secondary fw-bolder">User Name</label>
                            <input type="text" class="form-control fw-bolder" id="Email"  name="email" value="<?php echo $em?>" placeholder="Enter your email or your user name">
                        </div>
                        <?php if(!empty($nameErr)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $nameErr;?></span>
                        <?php }?>
                        
                        <?php if(!empty($pregemail)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $pregemail;?></span>
                        <?php }?>
                        <div class="mb-2 position-relative ">
                            <label for="Password" class="form-label text-secondary fw-bolder">Password</label>
                            <input type="password" class="form-control fw-bolder " id="Password" name="password" value="<?php echo $pass?>" placeholder="Enter your password" >
                            <input type="checkbox" class="visually-hidden" id="showpassword" onclick="show()">
                            <label for="showpassword" style="position:absolute; top:62%; right:2%"><i class='fal fa-eye'></i></label>
                        </div>
                        <?php if(!empty($passErr)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $passErr;?></span>
                        <?php }?>
                        <?php if(!empty($pregpass)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $pregpass;?></span>
                        <?php }?>
                        <div class="mb-4 ms-1 form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="check" value="1" name="check" >
                            <label class="form-check-label text-secondary fw-bolder" for="check" >Remember Me</label>
                        </div>
                        <input type="submit" class="btn btn-info w-100 text-white mb-4" name="submit" value="SIGN IN"></input>
                        <p class="forgot text-center ">Forgot your password? <a href="#" class="text-info">Reset Password</a></p>
                      </form>
                </section>    
            </section>
        </section>

    </main>
  
  
    <script src="js/my-bootstrap.js"></script>
    <script>
        function show() {
            var pass = document.getElementById("Password");
            if (pass.type === "password") {
                pass.type = "text";
            } 
            else {
                pass.type = "password";
            }
        } 
    </script>
</body>
</html>