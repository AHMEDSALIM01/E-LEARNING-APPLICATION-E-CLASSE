<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="CSS/my-bootstrap.css">
    <link rel="stylesheet" href="CSS/course.css">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="shortcut icon" type="image/png" href="img/favicons.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Courses</title>
</head>
<body>
        <div class="container-fluid vh-100 overflow-hidden bg-light">

            <div class="row Sbar overflow-auto">
                <?php include 'Side-search-bar/SideBar.php'?>

                <div class="col d-flex flex-column w-50 ">

                    <?php include 'Side-search-bar/SearchNavbar.php'?>
                    <main class="row">
                        <div class="container">
                                <div class="container border-1 border-bottom text-black" >
                                    <div class="d-flex align-items-center justify-content-sm-between justify-content-center f mt-3">
                                        <h5 class="text-capitalize fw-bolder d-none d-sm-block">courses list</h5>
                                        <div class="d-flex align-items-center">
                                            <i class="far fs-6 fa-sort me-5 text-info d-none d-sm-block" style="cursor: pointer;"></i>
                                            <button class="add btn btn-info text text-uppercase my-3 px-3 py-2">
                                                <a href="newcourse.php" class="text-decoration-none text-white">
                                                add new course
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <div class=" table-responsive-sm table-responsive-md px-4" style="max-height:440px; overflow:auto;"  >
                                
                                <table class="table table-hover align-middle table-borderless caption-top mb-3 mb-md-0 ">
                                    

                                    <thead class="bh bg-light sticky-top">
                                    <tr class="trt text-capitalize ">
                                        <td class="d-none d-sm-block">image</td>
                                        <th scope="col" class="d-none d-sm-table-cell">title</th>
                                        <th scope="col" class="d-none d-sm-table-cell">lien</th>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    </thead>
                                    <div>
                                    <tbody class="bh">
                                        
                                            <?php
                                                include_once 'db.php';
                                                $result=mysqli_query($connect,"SELECT * from courses");
                                            ?>
                                        
                                            <?php
                                                $i=0;
                                                while( $course=mysqli_fetch_array($result)){
                                            ?>
                                                       
                                                <tr class='trr'>
                                                    <td class='bg-white'><img src="image/<?php echo $course["logo"]?>" class='rounded-circle' style='height:60px; width:60px;' </td>
                                                    <td class='bg-white'><?php echo $course["title"]?></td>
                                                    <td class='d-none d-sm-table-cell bg-white'><?php echo $course["lien"]?></td>
                                                    <td class='bg-white'><a class='text-decoration-none' href="course-update.php?id=<?php echo $course["id"]; ?>"><i class='fal fa-pen fs-6 text-info' style='cursor: pointer;'></i></a></td>
                                                    <td class='bg-white'><a href="deletecourse.php?id=<?php echo $course["id"]; ?>"><i class='fal fa-trash fs-6 text-info' style='cursor: pointer;'></i></td>
                                                </tr>     
                                            <?php
                                                $i++;
                                                }
                                                 mysqli_close($connect);
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
</body>
</html>