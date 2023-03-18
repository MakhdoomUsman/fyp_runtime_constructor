<?php

$username = "root";
$password = "";
$db = "freelance_db";
$server = "localhost";

$con = mysqli_connect($server, $username, $password, $db);

if (!$con) {

?>

  <script type="text/javascript">
    alert('Connection not successful');
  </script>

<?php 

}

?>