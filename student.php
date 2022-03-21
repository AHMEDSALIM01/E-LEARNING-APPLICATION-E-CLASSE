<?php
// -----------------Add New Student--------------
include_once 'db.php';

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
    
                if(isset($_POST['save'])){
                    $image=$_FILES['avatar']['name'];
                    if(!file_exists('./image/')){
                        mkdir('./image/');
                    }
                    move_uploaded_file($_FILES['avatar']['tmp_name'],'./image/'.$_FILES['avatar']['name']);
                
                        $name=htmlspecialchars($_POST['name']);
                        $email=htmlspecialchars($_POST['email']);
                        $phone=htmlspecialchars($_POST['phone']);
                        $enroll_number=htmlspecialchars($_POST['enroll_number']);
                        // $date_of_admission=htmlspecialchars($_POST['date_of_admission']);
                    
                        $insert= "INSERT INTO students(avatar,name,email,phone,enroll_number) values ('$image','$name','$email','$phone','$enroll_number')";
                        if(!mysqli_query($connect, $insert)){
                            echo "Error: " . $insert . " " . mysqli_error($connect);
                        }

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
    <link rel="stylesheet" href="CSS/student.css">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="shortcut icon" type="image/png" href="img/favicons.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Student</title>
</head>
<body>
        <div class="container-fluid vh-100 overflow-hidden bg-light">
            <div class="row Sbar overflow-auto position-relative">
                <?php include 'Side-search-bar/SideBar.php'?>
                <div class="confirmation" style="display : none;">
                    <div class="toasconfirm col-md-6 col-12">
                        
                    </div>
                </div>
                <div class="newstudent" style ="display : none;">
                    <div class="addform col-md-6 col-12">
                        <form method="POST"  class=" bg-white rounded-2 p-3 " action="" enctype="multipart/form-data"> 
                            <h3 class="text-center text-info">
                                Add new Student
                            </h3>
                            <div class="form-group mb-3 position-relative ">
                                <div class ="d-flex flex-column align-items-center">
                                    <label for="av" class="form-label upload w-100 mb-0 rounded-2 fw-bolder"><span class="btn  w-100 fw-bold py-0 pb-2"><i class="bi bi-cloud-arrow-up-fill fs-3 me-1"></i>Upload Image</span></label>
                                    <input type="file" class="form-control d-none fw-bolder" id="av"  name="avatar" >
                                    <div class="d-flex">
                                        <span id="title" class="ms-2"></span>
                                        <i class="bi bi-x-circle-fill fs-6 ms-2 exclamation" id="invalidPic"></i>
                                        <i class="bi bi-check-circle-fill check ms-2" id="validPic"></i>
                                    </div>
                                    <div class="msg align-self-start" id="errorPicture"></div>
                                </div>
                                
                            </div>
                            <div class="form-group mb-3 position-relative">
                                <label>Name *</label>
                                <input name="name" type="text" value="" class="form-control" id="name">
                                <i class="bi bi-exclamation-circle-fill exclamation" id="invalidName"></i>
                                <i class="bi bi-check-circle-fill check" id="validName"></i>
                                <div class="msg" id="errorName" for="name"></div>
                            </div>
                            <div class="form-group mb-3 position-relative">
                                <label>Email *</label>
                                <input name="email" type="text" value="" class="form-control" id="email">
                                <i class="bi bi-exclamation-circle-fill exclamation" id="invalidEmail"></i>
                                <i class="bi bi-check-circle-fill check" id="validEmail"></i>
                                <div class="msg" id="errorEmail" for="email"></div>
                            </div>
                            <div class="form-group mb-3 position-relative">
                                <label>Phone *</label>
                                <input name="phone" type="text" value="" class="form-control " id="phone">
                                <i class="bi bi-exclamation-circle-fill exclamation" id="invalidPhone"></i>
                                <i class="bi bi-check-circle-fill check" id="validPhone"></i>
                                <div class="msg" id="errorPhone" for="phone"></div>
                            </div>
                            <div class="form-group mb-3 position-relative">
                                <label>Enroll Number *</label>
                                <input name="enroll_number" type="text" value="" class="form-control" id="enrollNumber">
                                <i class="bi bi-exclamation-circle-fill exclamation" id="invalidEN"></i>
                                <i class="bi bi-check-circle-fill check" id="validEN"></i>
                                <div class="msg" id="errorEN" for="enrollNumber"></div>
                            </div>
                            <div class="form-group mb-3 d-flex">
                                <input class="btn btn-outline-info text-secondary text-uppercase fw-bolder w-50" name="save" value="save" type="submit" id="save"></input>
                                <boutton class="btn btn-outline-secondary  text-uppercase  fw-bolder w-50" type="submit" id="back">back</boutton>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col d-flex flex-column w-50 ">

                    <?php include 'Side-search-bar/SearchNavbar.php'?>
                    <main class="row">
                        <div class="container">
                            <div class="container border-1 border-bottom text-black" >
                                        <div class="d-flex align-items-center justify-content-sm-between justify-content-center f mt-3">
                                            <h5 class="text-capitalize fw-bolder d-none d-sm-block">student list</h5>
                                            <div class="d-flex align-items-center">
                                                <i class="far fs-6 fa-sort me-5 text-info d-none d-sm-block" style="cursor: pointer;"></i>
                                                <button class="add btn btn-info text text-uppercase text-white my-3 px-3 py-2" id = "ADDNEW">
                                                    <!-- <a href="new-student.php" class="text-decoration-none text-white"> -->
                                                    add new student
                                                    <!-- </a> -->
                                                </button>
                                            </div>
                                        </div>
                            </div>
                            <div class=" table-responsive-sm table-responsive-md px-4" style="max-height:440px; overflow:auto;"  >
                                
                                <table class="table table-hover align-middle table-borderless caption-top mb-3 mb-md-0 ">
                                    

                                    <thead class="bh bg-light sticky-top">
                                    <tr class="trt text-capitalize ">
                                        <td ></td>
                                        <th scope="col">name</th>
                                        <th scope="col" >email</th>
                                        <th scope="col" >phone</th>
                                        <th scope="col">enroll number</th>
                                        <th scope="col" >date of addmision</th>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    </thead>
                                    <div>
                                    <tbody class="bh">
                                        
                                            <?php 
                                                include_once 'db.php';
                                                $result=mysqli_query($connect,"SELECT * from students");
                                            ?>
                                            <?php 
                                                $i=0;
                                                while($STUDENT=mysqli_fetch_array($result)){
                                            ?>
                                                <tr class='trr'>
                                                    <td class='bg-white'><img src="./image/<?php echo $STUDENT["avatar"]?>" class='rounded-circle' style='height:60px; width:60px;' </td>
                                                    <td class='bg-white'><?php echo $STUDENT["name"]?></td>
                                                    <td class='bg-white'><?php echo $STUDENT["email"]?></td>
                                                    <td class='bg-white'><?php echo $STUDENT["phone"]?></td>
                                                    <td class='bg-white'><?php echo $STUDENT["enroll_number"]?></td>
                                                    <td class='bg-white'><?php echo $STUDENT["date_of_admission"]?></td>
                                                    <td class='bg-white'><a class='text-decoration-none upd'  href="update_process.php?id=<?php echo $STUDENT["id"]; ?>"><i class='fal fa-pen fs-6 text-info' style='cursor: pointer;'></i></a></td>
                                                    <td class='bg-white'><a href="delete_process.php?id=<?php echo $STUDENT["id"]; ?>"><i class='fal fa-trash fs-6 text-info' style='cursor: pointer;'></i></td>
                                                </tr>     
                                            <?php
                                            $i++;
                                            }
                                            ?>
                                            
                                        
                                    </tbody>
                                    </div>
                                </table>
                            </div>
                        </div>    
                    </main>
                </div>
            </div>
        </div>

    <script src="js/my-bootstrap.js"></script>
    <script >
        const add = document.getElementById("ADDNEW");
        const modal = document.querySelector(".newstudent");
        const exit = document.querySelector("#back");
        const save = document.querySelector("#save");
        const email = document.getElementById("email");
        const name = document.getElementById("name");
        const tele = document.getElementById("phone");
        const eN = document.getElementById("enrollNumber");
        const profile = document.getElementById("av");
        const icon = document.getElementById("invalidEmail");
        const icon1 = document.getElementById("validEmail");
        const IName = document.getElementById("invalidName");
        const VName = document.getElementById("validName");
        const IPhone = document.getElementById("invalidPhone");
        const VPhone = document.getElementById("validPhone");
        const IEN = document.getElementById("invalidEN");
        const VEN = document.getElementById("validEN");
        const IPic = document.getElementById("invalidPic");
        const VPic = document.getElementById("validPic");
        const emailRequired = document.getElementById("errorEmail");
        const nameRequired = document.getElementById("errorName");
        const phoneRequired = document.getElementById("errorPhone");
        const ENRequired = document.getElementById("errorEN");
        const Prequired = document.getElementById("errorPicture");
        const output = document.getElementById("title");
        const extension = profile.value.substr(profile.value.lastIndexOf("."));
        let phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
        let emailRegex = /^[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+$/;
        let nameRegex = /^[a-zA-Z ]{3,15}$/;
        let EnRegex = /^[0-9]{3,15}$/;
        let PicRegex = /(\.jpg|\.jpeg|\.png)$/i;

        add.addEventListener("click", (e)=>{
            e.preventDefault();
            modal.setAttribute("style","display: flex;")
        });
                

        exit.addEventListener("click", (ex)=>{
            // modal.setAttribute("style","display: none;");
            window.location.assign("student.php");
        });

        save.addEventListener("click",(sub)=>{
            if(name.value === "" || email.value === "" || tele.value === "" || eN.value === "" || profile.value === ""){
                sub.preventDefault();
                    emailRequired.innerText = (email.value === "") ?  "Email is required"  : "";
                    nameRequired.innerText = (name.value === "") ? "Name is required" : "";
                    phoneRequired.innerText = (tele.value === "") ? "Phone is required" : "";
                    ENRequired.innerText =(eN.value === "") ? "Enroll number is required" : "" ;
                    Prequired.innerText =(profile.value === "") ? "Please chose a picture befor submit" : "" ;
            }else if(!nameRegex.test(name.value) || !emailRegex.test(email.value) || !phoneRegex.test(tele.value) || !EnRegex.test(eN.value) || getType() === false || getSize() === false){
                sub.preventDefault();
            }
        })

        name.addEventListener("input",(na)=>{
            if (!nameRegex.test(name.value)){
                name.setAttribute("style","color: red; border: 1.5px solid red;");
                IName.setAttribute("style","color: red; position: absolute; top: 30px; right: 10px; display: block;");
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
        
        email.addEventListener("input",(ema)=>{
            if (!emailRegex.test(email.value)){
                email.setAttribute("style","color: red; border: 1.5px solid red;");
                icon.setAttribute("style","color: red; position: absolute; top: 30px; right: 10px; display: block;");
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

        tele.addEventListener("input",(tel)=>{
            if (!phoneRegex.test(tele.value)){
                tele.setAttribute("style","color: red; border: 1.5px solid red;");
                IPhone.setAttribute("style","color: red; position: absolute; top: 30px; right: 10px; display: block;");
                VPhone.setAttribute("style","display: none;");
                phoneRequired.innerText= "Please enter a valid phone number";
            }
            else{
                tele.setAttribute("style","color: black; border: 1.5px solid green;");
                IPhone.setAttribute("style","display: none;");
                VPhone.setAttribute("style","color: green; position: absolute; top: 33px; right: 10px; display: block;"); 
                phoneRequired.innerText= "";
            }
        })

        eN.addEventListener("input",(EN)=>{
            if (!EnRegex.test(eN.value)){
                eN.setAttribute("style","color: red; border: 1.5px solid red;");
                IEN.setAttribute("style","color: red; position: absolute; top: 30px; right: 10px; display: block;");
                VEN.setAttribute("style","display: none;");
                ENRequired.innerText= "Please enter a valid enroll number should contain just numbers";
            }
            else{
                eN.setAttribute("style","color: black; border: 1.5px solid green;");
                IEN.setAttribute("style","display: none;");
                VEN.setAttribute("style","color: green; position: absolute; top: 33px; right: 10px; display: block;"); 
                ENRequired.innerText= "";
            }
        })

        function getType(){
            var ext = profile.files[0].name.substr(profile.files[0].name.lastIndexOf("."));
            if(!PicRegex.test(ext)){
                return false
            }
        }
        function getSize(){
            var Sizes = profile.files[0].size;
            if(parseFloat(Sizes)/(1024*1024)>1){
                return false
            }
        }  
        
       profile.addEventListener("change",(h)=>{
                
                
                output.textContent =  profile.files[0].name;
                if(getType() === false){
                    h.preventDefault();
                    IPic.setAttribute("style","color : red; display:block;");
                    VPic.setAttribute("style","display:none;");
                    output.setAttribute("style","color : red;");
                    Prequired.innerText = "Invalid format of picture (picture should be jpg, jpeg or png)";
                }
                else if(getSize() === false){
                    IPic.setAttribute("style","color : red; display:block;");
                    VPic.setAttribute("style","display:none;");
                    output.setAttribute("style","color : red;");
                    Prequired.innerText= "Invalid size of picture (size should be less than or equal to 1 mb)";
                }else{
                    IPic.setAttribute("style","display:none;");
                    VPic.setAttribute("style","color:green; display:block;");
                    output.setAttribute("style","color : black;");
                    Prequired.innerText= "";
                }
        })
        
    </script>
</body>
</html>