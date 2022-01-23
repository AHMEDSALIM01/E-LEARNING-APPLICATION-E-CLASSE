<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="CSS/my-bootstrap.css">
    <link rel="stylesheet" href="CSS/style.css">
    <title>E-LEARNING</title>
    

</head>
<body>
    <main>

        <section class="container-fluid vh-100">
            <section class="row justify-content-center align-items-center h-100">
                <section class="col-10 col-sm-8 col-md-6 col-lg-4  ">
                    <form action="dashboard.php" class="bg-white py-3 px-3" methode="GET">
                        <div class="m-4 ">
                             <a href="#" class="navbar-brand text-dark   border-start border-3 border-info px-2 mx-3"> E-classe</a>
                        </div>
                        <h6 class="title fw-bolder text-center mb-2">SIGN IN</h6>
                        <p class="test text-secondary  text-center">Enter your credentials to access your account</p>
                        <div class="mb-2">
                          <label for="Email" class="form-label text-secondary fw-bolder">Email</label>
                          <input type="email" class="form-control fw-bolder" id="Email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-4">
                          <label for="Password" class="form-label text-secondary fw-bolder">Password</label>
                          <input type="password" class="form-control fw-bolder" id="Password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-info w-100 text-white mb-4">SIGN IN</button>
                        <p class="forgot text-center ">Forgot your password? <a href="#" class="text-info">Reset Password</a></p>
                      </form>
                </section>    
            </section>
        </section>

    </main>
  
  
    <script src="js/my-bootstrap.js"></script>
</body>
</html>