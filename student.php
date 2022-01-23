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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Student</title>
</head>
<body>
        <div class="container-fluid vh-100 overflow-hidden bg-light">

            <div class="row Sbar overflow-auto">
                <?php include 'Side-search-bar/SideBar.php'?>

                <div class="col d-flex flex-column w-50 ">

                    <?php include 'Side-search-bar/SearchNavbar.php'?>
                    <main class="row">
                        <div class="container">
                            <div class="table-responsive-sm table-responsive-md px-4">
                            <table class="table table-hover align-middle table-borderless caption-top ">
                                <caption class="border-1 border-bottom text-black">
                                    <div class="d-flex align-items-center justify-content-sm-between justify-content-center f mt-3">
                                        <h5 class="text-capitalize fw-bolder d-none d-sm-block">student list</h5>
                                        <div class="d-flex align-items-center">
                                            <i class="far fs-6 fa-sort me-5 text-info d-none d-sm-block" style="cursor: pointer;"></i>
                                            <button class="add btn btn-info text text-white text-uppercase px-3 py-2">
                                                add new student
                                            </button>
                                        </div>
                                    </div>
                                </caption>

                                <thead class="bh">
                                <tr class="trt text-capitalize ">
                                    <td class="d-none d-sm-block"></td>
                                    <th scope="col">name</th>
                                    <th scope="col" class="d-none d-sm-table-cell">email</th>
                                    <th scope="col" class="d-none d-sm-table-cell">phone</th>
                                    <th scope="col">enroll number</th>
                                    <th scope="col" class="d-none d-sm-table-cell">date of addmision</th>
                                    <td ></td>
                                </tr>
                                </thead>

                                <tbody class="bh">
                                <?php include 'tableaux/StListe.php' ?>
                                <?php foreach ($students as $student){
                                        echo "<tr class='trr'>
                                                <td class='d-none d-sm-block bg-white'><img src={$student['img']} class='rounded-circle' alt='' /></td>
                                                <td class='bg-white'>{$student['name']}</td>
                                                <td class='d-none d-sm-table-cell bg-white'>{$student['mail']}</td>
                                                <td class='d-none d-sm-table-cell bg-white'>{$student['phone']}</td>
                                                <td class='bg-white'>{$student['enumber']}</td>
                                                <td class='d-none d-sm-table-cell bg-white'>{$student['date']}</td>
                                                <td class='bg-white'><i class='fal fa-pen fs-6 text-info' style='cursor: pointer;'></i></td>
                                                <td class='bg-white'><i class='fal fa-trash fs-6 text-info' style='cursor: pointer;'></i></td>
                                            </tr>";
                                        };
                                   ?>
                                </tbody>
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