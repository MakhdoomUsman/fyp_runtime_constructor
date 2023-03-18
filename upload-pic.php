<?php 

session_start();

if (!isset($_SESSION['theuser'])) {
  header('location:account.php');
}else{
  $logged_name = $_SESSION['theuser'];
  $logged_id = $_SESSION['theuser_id'];
}

include 'config/connection.php';

  $pic = time().$_FILES['pic']['name'];

  $target = "images/profile-pics/".$pic;
  move_uploaded_file($_FILES['pic']['tmp_name'], $target);

  $update = mysqli_query($con, "update users set pic='$pic' where uid='$logged_id' ");

  if ($update) { ?>
    <script>
      location.replace('my-profile-feed.php');
    </script>
  <?php }

?>