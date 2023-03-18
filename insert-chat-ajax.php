<?php 

	session_start();
	if (isset($_SESSION['theuser'])) {
	    $logged_name = $_SESSION['theuser'];
	    $logged_id = $_SESSION['theuser_id'];
	    $unique_id = $_SESSION['unique_id'];

	    include_once 'config/connection.php';

	    $outgoing_id = $_POST['outgoing_id'];
	    $incoming_id = $_POST['incoming_id'];
	    $message = $_POST['message'];

	    if(!empty($message)){
	    	$insert_message = mysqli_query($con, "insert into messages ( incoming_msg_id, outgoing_msg_id, msg ) values ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
	    }


	}else{
		header("location:account.php");
	}

?>