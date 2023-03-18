<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/my-style.css">

</head>

<?php 

include 'connection.php';

if (isset($_POST['login'])) {

  $email = $_POST['email'];
  $password = $_POST['pass'];

  $emailsearch = "select * from admin where email='$email' ";
  $query = mysqli_query($con, $emailsearch); //This Query run here

  $email_count = mysqli_num_rows($query); //this query checks the no. of rows (if selected) of above query.

  if ($email_count) { //if it select even a single row of email then this below code runs.

    $email_pass = mysqli_fetch_assoc($query);

    $user_pass = $email_pass['pass'];

    $pass_decode = password_verify($password, $user_pass);

    if ($pass_decode) { 

      $_SESSION['user'] = $email_pass['id'];
      
      ?>

      <script>
        location.replace('dashboard.php');
      </script>

    <?php
    }else{
      ?>
      
      <script>
        alert('Password Incorrect!');
      </script>

      <?php
    }

  }else{
    ?>

      <script>
        alert('Email not found!');
      </script>

    <?php
    
  }
}


?>

<body class="bg-dark-grey">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block admin-bg"></div>

              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Freelancer Management<br> (Admin Login)</h1>
                  </div>

                  <form method="POST" class="user">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" placeholder="Enter your email" required/>
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass" class="form-control form-control-user" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>

                    <input type="submit" name="login" value="Login" class="btn btn-primary btn-user btn-block">

                  </form>

                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
