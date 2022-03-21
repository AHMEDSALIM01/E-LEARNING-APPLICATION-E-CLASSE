<?php
    include_once 'db.php';
    $message = "";
    $success = "none";
   if (count($_POST)>0){
       $name = $_POST['name'];
       $email = $_POST['email'];
       $password = md5($_POST['ConfirPassword']);
       $data= mysqli_query($connect,"SELECT * FROM users");
       $data = mysqli_fetch_assoc($data);
       if($data['email'] === $email){
           $message = strtoupper("Email not valid!");
       }else {
        
        $insert = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
        if(mysqli_query($connect, $insert)){
            $success ="flex";
        }
        
       }
    //    print_r($data)  ;
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
    <link rel="stylesheet" href="CSS/singup.css">
    <link rel="shortcut icon" type="image/png" href="img/favicons.png">
    <title>E-LEARNING</title>
    

</head>
<body>
    <main>

        <section class="container-fluid vh-100">
            <section class="row justify-content-center align-items-center h-100 position-relative">
                    <div class ="notification" id="toas" style= "display:<?php echo $success ?>;">
                        <div class ="confirmation position-relative" >
                            <h5>Your account has been created successfully &#128513;</h5>
                            <p class ="par">Click here to <a href="index.php">Sign In</a> </p>
                            <span class="btn fw-bold" id="close"><i class="bi bi-x-circle fs-4"></i></span>
                        </div>
                    </div>
                <section class="col-12 col-sm-8 col-md-6 col-lg-4  ">
                    <form action="" class="bg-white py-1 px-3" method="post">
                        <div class="m-4 ">
                             <a href="#" class="navbar-brand text-dark   border-start border-3 border-info px-2 mx-3"> E-classe</a>
                        </div>
                        <h6 class="title fw-bolder text-center mb-2">SIGN UP</h6>
                        <?php if(!empty($message)){ ?>
                        <div class="msg alert alert-danger p-1 text-center fs-6 mb-2" for="name"><?php echo $message; ?></div>
                        <?php } ?>
                        <!-- <div class="mb-1 position-relative">
                            <label for="ProfilePicture" class="form-label mb-0 text-secondary fw-bolder"><span class="btn btn-outline-info text-dark fw-bold py-0 pb-2"><i class="bi bi-cloud-arrow-up-fill fs-3 me-1"></i>Upload Image</span></label>
                            <input type="file" class="form-control  d-none fw-bolder" id="ProfilePicture"  name="ProfilePicture" >
                        </div> -->
                        <div class="mb-1 position-relative">
                            <label for="name" class="form-label text-secondary fw-bolder">Full Name *</label>
                            <input type="text" class="form-control shadow-none" id="name"  name="name" value="" >
                            <i class="bi bi-exclamation-circle-fill exclamation" id="invalidName"></i>
                            <i class="bi bi-check-circle-fill check" id="validName"></i>
                            <div class="msg" id="errorNp" for="name"></div>
                        </div>
                        <div class="mb-1 position-relative">
                            <label for="Email" class="form-label text-secondary fw-bolder">Email *</label>
                            <input type="text" class="form-control shadow-none" id="Email"  name="email" value="">
                            <i class="bi bi-exclamation-circle-fill exclamation" id="exc"></i>
                            <i class="bi bi-check-circle-fill check" id="check"></i>
                            <div class="msg" id="error" for="Email"></div>
                        </div>
                        <div class="mb-1 position-relative ">
                            <label for="Password" class="form-label text-secondary fw-bolder">Password *</label>
                            <input type="password" class="form-control shadow-none" id="Password" name="password" value="">
                            <input type="checkbox" class="visually-hidden" id="showpassword" onclick="show()">
                            <label for="showpassword" style="position:absolute; top:38px; right:10px"><i class='fal fa-eye' style="cursor:pointer;"></i></label>
                            <div class="msg mt-1" id="errorPss" for="Password"></div>
                        </div>
                        <div class="mb-2 position-relative ">
                            <label for="Password" class="form-label  text-secondary fw-bolder">Confirm Password *</label>
                            <input type="password" class="form-control shadow-none  " id="ConfirmPassword" name="ConfirPassword" value="">
                            <div class="msg mt-1" id="errorCPss" for="ConfirmPassword"></div>
                        </div>
                        <input id="submit" type="submit" class="btn btn-info w-100 text-white mb-4" name="submit" value="SIGN UP"></input>
                        <p class="forgot text-center ">Already have an account? <a href="index.php" class="text-info">SIGN IN</a></p>
                      </form>
                </section>    
            </section>
        </section>

    </main>
  
  
    <script src="js/my-bootstrap.js"></script>
    <script>
            const input = document.querySelectorAll("formControl")
            const email = document.getElementById("Email");
            const name = document.getElementById("name");
            const PassWord = document.getElementById("Password");
            const cPassword = document.getElementById("ConfirmPassword");
            const icon = document.getElementById("exc");
            const icon1 = document.getElementById("check");
            const IName = document.getElementById("invalidName");
            const VName = document.getElementById("validName");
            const submit = document.getElementById("submit");
            const emailRequired = document.getElementById("error");
            const nameRequired = document.getElementById("errorNp");
            const PassRequired = document.getElementById("errorPss");
            const ConfirmPassRequired = document.getElementById("errorCPss");
            const close = document.getElementById("close");
            const toas = document.getElementById("toas");
            let passWordRegex = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-.]).{8,}$/;
            let cPassWordRegex =/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-.]).{8,}$/;
            let emailRegex = /^[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+$/;
            let nameRegex = /^[a-zA-Z ]{3,15}$/;

        function show() {
            if (PassWord.type === "password" || cPassword.type === "password") {
                PassWord.type = "text";
                cPassword.type = "text";
            } 
            else {
                PassWord.type = "password";
                cPassword.type = "password";
            }
        } 
        
        submit.addEventListener('click',(e)=>{
                
                if(email.value === "" || name.value === "" || PassWord.value === "" || cPassword.value === "" || cPassword.value !== PassWord.value){

                     e.preventDefault();
                    emailRequired.innerText = (email.value === "") ?  "Email is required"  : "";
                    nameRequired.innerText = (name.value === "") ? "Name is required" : "";
                    PassRequired.innerText = (PassWord.value === "") ? "Password is required" : "";
                    ConfirmPassRequired.innerText =(cPassword.value === "") ? "Please Confirm Your Password" : (cPassword.value !== PassWord.value ? "Password not match" : "");
                }
                else if(!emailRegex.test(email.value) || !nameRegex.test(name.value) || !passWordRegex.test(PassWord.value)){
                    e.preventDefault();
                }
                
            });

        email.addEventListener('input',(em)=>{
            if (!emailRegex.test(email.value)){
                email.setAttribute("style","color: red; border: 1.5px solid red;");
                icon.setAttribute("style","color: red; position: absolute; top: 33px; right: 10px; display: block;");
                icon1.setAttribute("style","display: none;");
                emailRequired.innerText= "Please enter a valid email address: (example@email.com)";
            }
            else{
                email.setAttribute("style","color: black; border: 1.5px solid green;");
                icon.setAttribute("style","display: none;");
                icon1.setAttribute("style","color: green; position: absolute; top: 33px; right: 10px; display: block;");  
                emailRequired.innerText= "";
            } 
        })

        name.addEventListener('input',(na)=>{
            if (!nameRegex.test(name.value)){
                name.setAttribute("style","color: red; border: 1.5px solid red;");
                IName.setAttribute("style","color: red; position: absolute; top: 33px; right: 10px; display: block;");
                VName.setAttribute("style","display: none;");
                nameRequired.innerText= "Please enter a valid name";
            }
            else{
                name.setAttribute("style","color: black; border: 1.5px solid green;");
                IName.setAttribute("style","display: none;");
                VName.setAttribute("style","color: green; position: absolute; top: 33px; right: 10px; display: block;"); 
                nameRequired.innerText= "";
            }
        })

        PassWord.addEventListener('input',(pa)=>{
            if (!passWordRegex.test(PassWord.value)){
                PassWord.setAttribute("style","color: red; border: 1.5px solid red;");
                PassRequired.innerText= "Password should have at least 8 character,at least One Upper and lower case also special charactere";
            }
            else{
                PassWord.setAttribute("style","color: black; border: 1.5px solid green;");
                PassRequired.innerText= "";
            }
        })


        // function validationEmail(){
                
        //         if (!emailRegex.test(email.value)){
        //         email.classList.add("inv");
        //         email.classList.remove("validEmail");
        //         icon.style.display = "block";
        //         icon1.style.display = "none";
        //         return false;
        //     }
        //     else{
        //         email.classList.remove("inv");
        //         email.classList.add("validEmail");
        //         icon.style.display = "none";
        //         icon1.style.display = "block";
        //         return true;
                
        //     }   
        // }

        // function validationName(){
            
        //         if (!nameRegex.test(name.value)){
        //         name.classList.add("inv");
        //         name.classList.remove("validName");
        //         IName.style.display = "block";
        //         VName.style.display = "none";
        //         return false;
        //     }
        //     else{
        //         name.classList.remove("inv");
        //         name.classList.add("validName");
        //         IName.style.display = "none";
        //         VName.style.display = "block";
        //         return true ;
        //     }
        // }

        // function validationPassword(){
            
        //         if (!passWordRegex.test(PassWord.value)){
        //         PassWord.classList.add("inv");
        //         PassWord.classList.remove("validPassword");
        //         PassRequired.innerText= "Password should have at least 8 character,at least One Upper and lower case also special charactere";
        //         return false;
        //     }
        //     else{
        //         PassWord.classList.remove("inv");
        //         PassWord.classList.add("validPassword");
        //         PassRequired.innerText= "";
        //         return true ;
        //     }
               
        // }
        // function validationCPassword(){
        // if (!cPassWordRegex.test(cPassword.value)){
        //         cPassword.classList.add("inv");
        //         cPassword.classList.remove("validCPassword");
        //         ConfirmPassRequired.innerText= "Password should have at least 8 character,at least One Upper and lower case also special charactere";
        //         return false;
        //     }
        //     else{
        //         cPassword.classList.remove("inv");
        //         cPassword.classList.add("validCPassword");
        //         ConfirmPassRequired.innerText ="";
        //         return true ;
        //     }
        // } 

        close.addEventListener('click',(event)=>{
            event.preventDefault();
            toas.setAttribute("style", "display:none");

        });

    </script>
</body>
</html>