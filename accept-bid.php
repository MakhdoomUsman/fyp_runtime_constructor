<?php 

session_start();

if (!isset($_SESSION['theuser'])) {
    header('location:account.php');
}else{
    $logged_name = $_SESSION['theuser'];
    $logged_id = $_SESSION['theuser_id'];
    $unique_id = $_SESSION['unique_id'];
}

include_once 'config/connection.php';

if (isset($_GET['uid']) && isset($_GET['pro_id'])) {
    $uid = $_GET['uid'];
    $pro_id = $_GET['pro_id'];

    $update_bid = mysqli_query($con, "update bids set accept_status=1 where uid={$uid} and project_id={$pro_id} ");

    if ($update_bid) {

        $select_id = mysqli_query($con, "select unique_id from users where uid='$uid'");
        $user_id = mysqli_fetch_assoc($select_id);
        $unique_id = $user_id['unique_id'];

        $target = "messages.php?user_id=".$unique_id;
        header("location:{$target}");
    }
}

?>