<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sign Up Here</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/my-style.css">

</head>

<?php 

include 'connection.php';

if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($con, $_POST['username'] ); 
  $email = mysqli_real_escape_string($con, $_POST['email'] );
  $password = mysqli_real_escape_string($con, $_POST['pass'] ); 
  $cpassword = mysqli_real_escape_string($con, $_POST['cpass'] ); 

  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

  $emailquery = " select * from users where email='$email'";
  $query = mysqli_query($con, $emailquery);

  $emailcount = mysqli_num_rows($query);

  if ($emailcount>0) { ?>

    <script type="text/javascript">
      alert('Email already exists!');
    </script>

    <?php

  } else{

    if ($password === $cpassword) {

      $insert_query = " insert into users(email, username, pass) 
      values ('$email', '$username', '$pass')";

      $iquery = mysqli_query($con, $insert_query);

      if ($iquery) {?>

        <script type="text/javascript">
          alert('Registered Successfully!');
          location.replace('login.php');
        </script>

        <?php } else{?>

        <script type="text/javascript">
          alert('Unsuccessful!');
        </script>

        <?php }
      
    }else{
      echo "Passwords are not matching";
    }

   }
}


?>

<body class="bg-dark-grey">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block admin-bg"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Youtube Influencer Finder (Sign Up)</h1>
              </div>

              <form method="POST" class="user">

                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Email" required/>
                </div>

                <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-user" placeholder="Username" required/>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="pass" class="form-control form-control-user" placeholder="Password" required/>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="cpass" class="form-control form-control-user" placeholder="Repeat Password" required/>
                  </div>
                </div>

                <input type="submit" name="register" class="btn btn-primary btn-user btn-block" value="Register Account">

              </form>

              <hr>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
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
