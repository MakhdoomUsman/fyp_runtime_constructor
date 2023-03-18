<?php 

session_start();

if (isset($_SESSION['theuser'])) {
    $logged_name = $_SESSION['theuser'];
    $logged_id = $_SESSION['theuser_id'];
    $unique_id = $_SESSION['unique_id'];
}

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Software Houses</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>

<body>

<style>
    .company-up-info img{
        height: 100px;
        width: 100px;
        border-radius: 50%;
    }
</style>

<div class="wrapper">

    <?php include 'header.php'; ?>

<section class="companies-info">
<div class="container">
<div class="company-title">
<h3>All Companies</h3>
</div>
<div class="companies-list">
<div class="row">

<?php 

$select_companies = mysqli_query($con, "select * from users where acc_type='com'");

if(mysqli_num_rows($select_companies)>0){

    while($coms=mysqli_fetch_array($select_companies)){

?>

<div class="col-lg-3 col-md-4 col-sm-6">
<div class="company_profile_info">
<div class="company-up-info">
<img src="images/profile-pics/<?php echo $coms['pic']; ?>" alt="">
<h3><?php echo $coms['name']; ?></h3>
<h4><?php echo $coms['title']; ?></h4>
<ul>
<?php 
    
if (isset($_SESSION['theuser_id'])) {
    $follower_id = $_SESSION['theuser_id'];

    //Checking if already following
    $select_follower = mysqli_query($con, "select * from followings where uid={$coms['uid']} and follower_id={$follower_id} ");

    if(mysqli_num_rows($select_follower)>0){

    ?>
        <li><a href="?unfollowed=<?php echo $coms['uid']."&unfollower=".$follower_id; ?>" title="" class="btn btn-danger">Unfollow</a></li>
    <?php

    }else{

    ?>
        <li><a href="?followed=<?php echo $coms['uid']."&follower=".$follower_id; ?>" title="" class="follow">Follow</a></li>

    <?php 

    }

}else{ 

?>

<li><a href="?login_to_follow=1" title="" class="follow">Follow</a></li>

<?php } ?>

<li><a href="messages.php?user_id=<?php echo $coms['unique_id']; ?>" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
</ul>
</div>
<a href="view-single-profile.php?profile_id=<?php echo $coms['uid']; ?>" title="" class="view-more-pro">View Profile</a>
</div>
</div>

<?php 

    }

}


?>


</div>
</div>

</div>
</section>

<?php include 'footer.php'; ?>
</div>

</body>