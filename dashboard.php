<?php
    include_once 'db.php';
    $student=mysqli_query($connect,"SELECT COUNT(id) FROM students ");
    $student=mysqli_fetch_column($student);
    $course=mysqli_query($connect,"SELECT COUNT(id) FROM courses ");
    $course=mysqli_fetch_column($course);
    $amount=mysqli_query($connect,"SELECT SUM(amount_paid) FROM payment_details");
    $amount=mysqli_fetch_column($amount);
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
    <link rel="stylesheet" href="CSS/dashboard.css">
    <link rel="stylesheet" href="CSS/styles.css">
    
    <link rel="shortcut icon" type="image/png" href="img/favicons.png">
    <title>Dashboard</title>
</head>
<body>
        <div class="container-fluid overflow-hidden">
            <div class="row Sbar overflow-auto">
                <?php include 'Side-search-bar/SideBar.php'?>
                <div class="col  flex-column-sm h-sm-50 ">
                    <?php include 'Side-search-bar/SearchNavbar.php'?>
                    <main class="row mb-4">
                        <div class="col-12 col-sm-6 col-lg-3 pt-4">
                            <div class="card1 " >
                                <div class="card-body">
                                    <div class="d-flex flex-column ">
                                        <i class="cap fs-1 fal fa-graduation-cap mb-4"></i> 
                                        <h5 class="card-title fs-6 mb-3 text-highlight">Students</h5>
                                    </div>
                                  <p class="card-text text-end fw-bolder"><?php echo $student?></p>

                                </div>
                              </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 pt-4">
                            <div class="card2 " >
                                <div class="card-body">
                                    <div class="d-flex flex-column ">
                                        <i class="b_mark fs-1 fal fa-bookmark mb-4"></i> 
                                        <h5 class="card-title  mb-3 text-highlight">Course</h5>
                                    </div>
                                  <p class="card-text text-end  fw-bolder"><?php echo $course?></p>

                                </div>
                              </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 pt-4">
                            <div class="card3 " >
                                <div class="card-body">
                                    <div class="d-flex flex-column ">
                                        <i class="fs-1 fal fa-usd-square mb-4 text-info"></i>
                                        <h5 class="card-title  mb-3 text-highlight">Payments</h5>
                                    </div>
                                  <p class="card-text text-end  fw-bolder"><small class="">DHS</small> <?php echo $amount?>,00</p>

                                </div>
                              </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 pt-4">
                            <div class="card4"  >
                                <div class="card-body">
                                    <div class="d-flex flex-column ">
                                        <i class="fs-1 fal fa-user mb-4 text-white"></i> 
                                        <h5 class="card-title  mb-3 text-white">Users</h5>
                                    </div>
                                  <p class="card-text text-end  fw-bolder">3</p>

                                </div>
                              </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>

    <script src="js/my-bootstrap.js"></script>
</body>
</html>