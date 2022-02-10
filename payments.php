<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="CSS/my-bootstrap.css">
    <link rel="stylesheet" href="CSS/payments.css">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="shortcut icon" type="image/png" href="img/favicons.png">
    <title>Payments</title>
</head>
<body>
        <div class="container-fluid vh-100 overflow-hidden bg-light">

            <div class="row Sbar overflow-auto">
                <?php include 'Side-search-bar/SideBar.php'?>
                <div class="col flex-column-sm w-50 ">

                    <?php include 'Side-search-bar/SearchNavbar.php'?>
                    <main class="row ">
                        <div class="container">
                            <div class="table-responsive-sm table-responsive-md px-4">
                            <table class="table table-hover align-middle table-borderless table-striped caption-top ">
                                <caption class="border-1 border-bottom text-black">
                                    <div class="d-flex align-items-center justify-content-sm-between justify-content-between f mt-3">
                                        <h5 class="text-capitalize fw-bolder ">payment details</h5>
                                        <div class="d-flex align-items-center">
                                            <i class="far fs-6 fa-sort me-1 text-info" style="cursor: pointer;"></i>
                                        </div>
                                    </div>
                                </caption>

                                <thead class="bh">
                                <tr class="trt text-capitalize ">
                                    <th scope="col">name</th>
                                    <th scope="col" class="d-none d-sm-table-cell" >payment schedule</th>
                                    <th scope="col" >bill number</th>
                                    <th scope="col">amount paid</th>
                                    <th scope="col" >balance amount</th>
                                    <th scope="col" class="d-none d-sm-table-cell">date</th>
                                    <td ></td>
                                </tr>
                                </thead>

                                <tbody class="bh">
                                    <?php 
                                        include_once 'db.php';
                                        $result=mysqli_query($connect,"SELECT * FROM  payment_details");
                                    ?>
                                    <?php 
                                        $i=0;
                                        while($payment=mysqli_fetch_array($result)){
                                    ?>
                                
                                   <tr class='trr'>
                                        <td ><?php echo $payment['name'] ?></td>
                                        <td class='d-none d-sm-table-cell' ><?php echo $payment['payment_schedule'] ?></td>
                                        <td ><?php echo $payment['bill_number'] ?></td>
                                        <td><?php echo $payment['amount_paid'] ?></td>
                                        <td ><?php echo $payment['balance_amount'] ?></td>
                                        <td class='d-none d-sm-table-cell'><?php echo $payment['date_operation'] ?></td>
                                        <td><i class='fal fa-eye text-info' style='cursor: pointer;'></i></td>
                                    </tr> 

                                    <?php
                                        $i++;
                                        }
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