<?php 

$user = "root";
$pass = "";
$db = "freelance_db";
$server = "localhost";

$GLOBALS['conn'] = mysqli_connect($server, $user, $pass, $db);

function getName($id){
	$select_name = mysqli_query($GLOBALS['conn'], "select name from users where uid='$id'");
	$user_name = mysqli_fetch_assoc($select_name);

	echo $user_name['name'];
}

function getUniqueID($id){
	$select_id = mysqli_query($GLOBALS['conn'], "select unique_id from users where uid='$id'");
	$user_id = mysqli_fetch_assoc($select_id);

	echo $user_id['unique_id'];
}

function getImage($id){
	$select_pic = mysqli_query($GLOBALS['conn'], "select pic from users where uid='$id'");
	$user_pic = mysqli_fetch_assoc($select_pic);

	echo "images/profile-pics/".$user_pic['pic'];
}

function getUserTitle($id){
	$select_title = mysqli_query($GLOBALS['conn'], "select title from users where uid='$id'");
	$user_title = mysqli_fetch_assoc($select_title);

	echo $user_title['title'];
}

function getLocation($id){
	$select_location = mysqli_query($GLOBALS['conn'], "select location from users where uid='$id'");
	$user_location = mysqli_fetch_assoc($select_location);

	echo $user_location['location'];
}

function getOverview($id){
	$select_overview = mysqli_query($GLOBALS['conn'], "select overview from users where uid='$id'");
	$user_overview = mysqli_fetch_assoc($select_overview);

	echo $user_overview['overview'];
}

function getQRSS($id){
	$select_qr_pic = mysqli_query($GLOBALS['conn'], "select qr_pic from users where uid='$id'");
	$qr_pic = mysqli_fetch_assoc($select_qr_pic);

	echo "images/jazzcash_payments/".$qr_pic['qr_pic'];
}

function getFollowers($id){
	$get_followers = mysqli_query($GLOBALS['conn'], "select * from followings where uid='$id'");
	$total_followers = mysqli_num_rows($get_followers);
	echo $total_followers;
}

function getFollowing($id){
	$get_following = mysqli_query($GLOBALS['conn'], "select * from followings where follower_id='$id'");
	$total_following = mysqli_num_rows($get_following);
	echo $total_following;
}

function getUserFromProjectID($bid_pid){
	$select_user = mysqli_query($GLOBALS['conn'], "select uid from projects where p_id='$bid_pid'");
	$user_id = mysqli_fetch_assoc($select_user);
	return $user_id['uid'];
}

?>