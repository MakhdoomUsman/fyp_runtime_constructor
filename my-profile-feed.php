<?php 

session_start();

if (!isset($_SESSION['theuser'])) {
    header('location:account.php');
}else{
    $logged_name = $_SESSION['theuser'];
    $logged_id = $_SESSION['theuser_id'];
}

include 'config/connection.php';

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title><?php echo $logged_name; ?> | Profile Overview</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>
<body>
<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
    color:#e9ecef;
}
</style>
<div class="wrapper">

<?php include 'header.php'; ?>

<?php 

if (isset($_GET['complete_order'])) {
    $proj_id = $_GET['complete_order'];

    $update_project = mysqli_query($con, "update projects set project_status='completed' where p_id='$proj_id' ");

}

if (isset($_GET['complete_transaction'])) {
    $proj_id = $_GET['complete_transaction'];

    $update_project = mysqli_query($con, "update projects set payment_status='paid' where p_id='$proj_id' ");

}


?>

<section class="cover-sec">
<img src="images/resources/cover-img.jpg" alt="">
    <!-- <div class="add-pic-box">
    <div class="container">
    <div class="row no-gutters">
    <div class="col-lg-12 col-sm-12">
    <input type="file" id="file">
    <label for="file">Change Image</label>
    </div>
    </div>
    </div>
    </div> -->
</section>
<main>
<div class="main-section">
<div class="container">
<div class="main-section-data">
<div class="row">
<div class="col-lg-3">
<div class="main-left-sidebar">
<div class="user_profile">
<div class="user-pro-img">

<img id="p-img" src="images/profile-pics/<?php echo $profile_pic; ?>" alt="" height="170" width="170" style="border-radius: 50%;">

<form method="POST" action="upload-pic.php" enctype="multipart/form-data" id="pic-form">
    <div class="add-dp" id="OpenImgUpload">
        
        <label for="file"><i class="fas fa-camera" style="left:-88px!important; "></i></label>
        <input type="file" name="pic" class="profile-pic-file" id="file">
        <input type="submit" name="upload-pic" style="visibility: hidden;">
    </div>
</form>

</div>
<div class="user_pro_status">
<ul class="flw-status">
<li>
    <span>Projects</span>
    <b>34</b>
</li>
<li>
    <span>Bids</span>
<b>12</b>
</li>
</ul>
</div>
<ul class="social_links">
<!-- <li><a href="#" title=""><i class="la la-globe"></i> www.example.com</a></li> -->
</ul>
</div>

<div class="user-profile-ov">
    <h3><a href="#" title="" class="skills-open">Skills</a> <a href="#" title="" class="skills-open"><i class="fa fa-pencil"></i></a> </h3>
    <ul>
        <?php 

        $my_skills = $skills;
        $my_skills_array = explode(',', $my_skills);

        foreach ($my_skills_array as $my_skill) {

        ?>
        <li><a href="#" title=""><?php echo $my_skill; ?></a></li>
        <?php

        }

        ?>
    </ul>
</div>

<div class="user-profile-ov">
    <h3><a href="#" title="" class="lct-box-open">Location</a> <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a></h3>
    <!-- <h4>India</h4> -->
    <p><?php echo $location; ?></p>
</div>
    
</div>
</div>
<div class="col-lg-6">
<div class="main-ws-sec">
<div class="user-tab-sec rewivew">
<h3><?php echo $logged_name; ?></h3>
<div class="star-descp">
<span><?php echo $title; ?></span>
<ul>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star-half-o"></i></li>
</ul>
<!-- <a href="#" title="">Status</a> -->
</div>
<div class="tab-feed st2 settingjb">
<ul>
<li data-tab="feed-dd" class="active">
<a href="#" title="">
<img src="images/ic1.png" alt="">
<span>My Feed</span>
</a>
</li>
<li data-tab="info-dd">
<a href="#" title="">
<img src="images/ic2.png" alt="">
<span>Info</span>
</a>
</li>
<!-- <li data-tab="saved-jobs">
<a href="#" title="">
<img src="images/ic4.png" alt="">
<span>Jobs</span>
</a>
</li> -->
<li data-tab="my-bids">
<a href="#" title="">
<img src="images/ic5.png" alt="">
<span>Projects</span>
</a>
</li>
<!-- <li data-tab="portfolio-dd">
<a href="#" title="">
<img src="images/ic3.png" alt="">
<span>Portfolio</span>
</a>
</li> -->
<li data-tab="rewivewdata">
<a href="#" title="">
<img src="images/review.png" alt="">
<span>Reviews</span>
</a>
</li>
<li data-tab="payment-dd">
<a href="#" title="">
<img src="images/ic6.png" alt="">
<span>Payment</span>
</a>
</li>
</ul>
</div>
</div>
<div class="product-feed-tab" id="saved-jobs">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="mange-tab" data-toggle="tab" href="#mange" role="tab" aria-controls="home" aria-selected="true">Manage Jobs</a>
</li>
<li class="nav-item">
<a class="nav-link" id="saved-tab" data-toggle="tab" href="#saved" role="tab" aria-controls="profile" aria-selected="false">Saved Jobs</a>
</li>
<li class="nav-item">
<a class="nav-link" id="contact-tab" data-toggle="tab" href="#applied" role="tab" aria-controls="applied" aria-selected="false">Applied Jobs</a>
</li>
<li class="nav-item">
<a class="nav-link" id="cadidates-tab" data-toggle="tab" href="#cadidates" role="tab" aria-controls="contact" aria-selected="false">Applied cadidates</a>
</li>
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="mange" role="tabpanel" aria-labelledby="mange-tab">
<div class="posts-bar">
<div class="post-bar bgclr">
<div class="wordpressdevlp">
<h2>Senior Wordpress Developer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
<br>
<div class="row no-gutters">
<div class="col-md-6 col-sm-12">
<div class="cadidatesbtn">
<button type="button" class="btn btn-primary">
<span class="badge badge-light">3</span>Candidates
</button>
<a href="#">
<i class="far fa-edit"></i>
</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
<div class="col-md-6 col-sm-12">
<ul class="bk-links bklink">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="posts-bar">
<div class="post-bar bgclr">
<div class="wordpressdevlp">
<h2>Senior Php Developer</h2>
<p><i class="la la-clock-o"></i> Posted on 29 August 2018</p>
</div>
<br>
<div class="row no-gutters">
<div class="col-md-6 col-sm-12">
<div class="cadidatesbtn">
<button type="button" class="btn btn-primary">
<span class="badge badge-light">3</span>Candidates
</button>
<a href="#">
<i class="far fa-edit"></i>
</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
<div class="col-md-6 col-sm-12">
<ul class="bk-links bklink">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="posts-bar">
<div class="post-bar bgclr">
<div class="wordpressdevlp">
<h2>Senior UI UX Designer</h2>
<div class="row no-gutters">
<div class="col-md-6 col-sm-12">
<p class="posttext"><i class="la la-clock-o"></i>Posted on 5 June 2018</p>
</div>
<div class="col-md-6 col-sm-12">
<p><i class="la la-clock-o"></i>Expiried on 5 October 2018</p>
</div>
</div>
</div>
<br>
<div class="row no-gutters">
<div class="col-md-6 col-sm-12">
<div class="cadidatesbtn">
<button type="button" class="btn btn-primary">
<span class="badge badge-light">3</span>Candidates
</button>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
<div class="col-md-6 col-sm-12">
<ul class="bk-links bklink">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="saved" role="tabpanel" aria-labelledby="saved-tab">
<div class="post-bar">
<div class="p-all saved-post">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>Senior Wordpress Developer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info saved-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn saved-btn">
<a class="clrbtn" href="#">Unsaved</a>
<a class="clrbtn" href="#">Message</a>
</div>
</ul>
</div>
<div class="post-bar">
<div class="p-all saved-post">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>Senior PHP Developer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info saved-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn saved-btn">
<a class="clrbtn" href="#">Unsaved</a>
<a class="clrbtn" href="#">Message</a>
</div>
</ul>
</div>
<div class="post-bar">
<div class="p-all saved-post">
<div class="usy-dt">
 <div class="wordpressdevlp">
<h2>UI UX Designer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info saved-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn saved-btn">
<a class="clrbtn" href="#">Unsaved</a>
<a class="clrbtn" href="#">Message</a>
</div>
</ul>
</div>
</div>
<div class="tab-pane fade" id="applied" role="tabpanel" aria-labelledby="applied-tab">
<div class="post-bar">
<div class="p-all saved-post">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>Senior Wordpress Developer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
 </div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info saved-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn saved-btn">
<a class="clrbtn" href="#">Applied</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</ul>
</div>
<div class="post-bar">
<div class="p-all saved-post">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>Senior PHP Developer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
 <li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info saved-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn saved-btn">
<a class="clrbtn" href="#">Applied</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</ul>
</div>
<div class="post-bar">
<div class="p-all saved-post">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>UI UX Designer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
 <li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info saved-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn saved-btn">
<a class="clrbtn" href="#">Applied</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</ul>
</div>
</div>
<div class="tab-pane fade" id="cadidates" role="tabpanel" aria-labelledby="cadidates-tab">
<div class="post-bar">
<div class="post_topbar applied-post">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<div class="epi-sec epi2">
<ul class="descp descptab bklink">
<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
</div>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
 <li><a href="#" title="">Accept</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
<div class="job_descp noborder">

<div class="star-descp review profilecnd">
<ul class="bklik">
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star-half-o"></i></li>
<a href="#" title="">5.0 of 5 Reviews</a>
</ul>
</div>

<div class="devepbtn appliedinfo noreply">
<a class="clrbtn" href="#">Accept</a>
<a class="clrbtn" href="#">View Profile</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
</div>
</div>
<div class="post-bar">
<div class="post_topbar  applied-post">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<div class="epi-sec epi2">
<ul class="descp descptab bklink">
<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
</div>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
 <li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Accept</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
<div class="job_descp noborder">
<div class="star-descp review profilecnd">
<ul class="bklik">
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star-half-o"></i></li>
<a href="#" title="">5.0 of 5 Reviews</a>
</ul>
</div>
<div class="devepbtn appliedinfo noreply">
<a class="clrbtn" href="#">Accept</a>
<a class="clrbtn" href="#">View Profile</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
</div>
</div>
<div class="post-bar">
<div class="post_topbar applied-post">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<div class="epi-sec epi2">
<ul class="descp descptab bklink">
<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
</div>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Accept</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
<div class="job_descp noborder">
<div class="star-descp review profilecnd">
<ul class="bklik">
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star-half-o"></i></li>
<a href="#" title="">5.0 of 5 Reviews</a>
</ul>
</div>
<div class="devepbtn appliedinfo noreply">
<a class="clrbtn" href="#">Accept</a>
<a class="clrbtn" href="#">View Profile</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="product-feed-tab current" id="feed-dd">

<div class="posts-section">

<?php 

$select_projects = mysqli_query($con, "select * from projects where status=1 and uid=$logged_id");

$exists = mysqli_num_rows($select_projects);

if ($exists>0) {

    while ($pro_data = mysqli_fetch_array($select_projects)) {

        $pro_id = $pro_data['p_id'];
        $uid = $pro_data['uid'];
        $p_title = $pro_data['title'];
        $from_budget = $pro_data['from_budget'];
        $to_budget = $pro_data['to_budget'];
        $description = $pro_data['description'];
        $pro_skills = $pro_data['tech_stack'];

?>

    <div class="post-bar">
        <div class="post_topbar">
        <div class="usy-dt">
        <img src="<?php getImage($uid); ?>" height="50" width="50" alt="">
        <div class="usy-name">
        <h3><?php getName($uid); ?></h3>
        <span><img src="images/clock.png" alt="">3 min ago</span>
        </div>
        </div>
        <!-- <div class="ed-opts">
            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
            <ul class="ed-options">
            <li><a href="#" title="">Edit Post</a></li>
            <li><a href="#" title="">Unsaved</a></li>
            <li><a href="#" title="">Unbid</a></li>
            <li><a href="#" title="">Close</a></li>
            <li><a href="#" title="">Hide</a></li>
            </ul>
        </div> -->
        </div>
        <div class="epi-sec">
        <ul class="descp">
        <li><img src="images/icon8.png" alt=""><span><?php getUserTitle($uid); ?></span></li>
        <li><img src="images/icon9.png" alt=""><span><?php getLocation($uid); ?></span></li>
        </ul>
        <ul class="bk-links">
            <!-- <li><a href="#" title=""><i class="la la-bookmark"></i></a></li> -->
            <!-- <li><a href="#" title=""><i class="la la-envelope"></i></a></li> -->
            <li><a href="project-view.php?pid=<?php echo $pro_id; ?>" title="" class="bid_now">View Activity</a></li>
        </ul>
        </div>
        <div class="job_descp">
        <h3><?php echo $p_title; ?></h3>
        <ul class="job-dt">
        <li><span><?php echo $from_budget." - ".$to_budget; ?></span></li>
        </ul>
        <p><?php echo $description; ?></p>
        <ul class="skill-tags">
            <?php 

            $pro_skills_array = explode(',', $pro_skills);

            foreach ($pro_skills_array as $pro_skill) {

            ?>
            <li><a href="#" title="" class="skl-name"><?php echo $pro_skill; ?></a></li>
            <?php

            }

            ?>
        </ul>
        </div>

        <!-- <div class="job-status-bar">
            <ul class="like-com">
            <li>
            <a href="#" class="active"><i class="fas fa-heart"></i> Like</a>
            <img src="images/liked-img.png" alt="">
            <span>25</span>
            </li>
            <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comments 15</a></li>
            </ul>
            <a href="#"><i class="fas fa-eye"></i>Views 50</a>
        </div> -->
    </div>

<?php 

   }
}

?>

    <!-- <div class="process-comm">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div> -->

</div>



</div>
<div class="product-feed-tab" id="my-bids">
<ul class="nav nav-tabs bid-tab" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Active Projects</a>
</li>
<li class="nav-item">
<a class="nav-link" id="bidders-tab" data-toggle="tab" href="#bidders" role="tab" aria-controls="contact" aria-selected="false">Completed Projects</a>
</li>
<!-- <li class="nav-item">
<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">My Active Bids</a>
</li> -->
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<?php 

$select_bids = mysqli_query($con, "select * from bids where uid='$logged_id' and accept_status=1 ");

while ($bids=mysqli_fetch_array($select_bids)) {

    $days = $bids['delivery_days'];
    $bid_value = $bids['bid_price'];
    $project_id = $bids['project_id'];

    $select_project = mysqli_query($con, "select * from projects where p_id='$project_id' and project_status='pending' ");

    if (mysqli_num_rows($select_project)>0) {

        $project_data = mysqli_fetch_assoc($select_project);

?>

<div class="post-bar">
<div class="post_topbar">
<div class="wordpressdevlp">
<h2><?php echo $project_data['title']; ?></h2>
<p><i class="la la-clock-o"></i><?php echo $days." Days"; ?></p>
</div>
<ul class="savedjob-info mangebid manbids">

<li>
<h3>Your Bid</h3>
<p><?php echo $bid_value; ?></p>
</li>

<ul class="bklink">
<li><a href="?complete_order=<?php echo $project_data['p_id']; ?>" class="btn btn-success text-white">Complete</a></li>
</ul>
</ul>
</div>
</div>

<?php

    }

}

?>


</div>

<!-- COMPLETED PROJECTS DISPLAY HERE -->

<div class="tab-pane fade" id="bidders" role="tabpanel" aria-labelledby="bidders-tab">

<?php 

$select_bids = mysqli_query($con, "select * from bids where uid='$logged_id' and accept_status=1 ");

while ($bids=mysqli_fetch_array($select_bids)) {

    $days = $bids['delivery_days'];
    $bid_value = $bids['bid_price'];
    $project_id = $bids['project_id'];

    $select_project = mysqli_query($con, "select * from projects where p_id='$project_id' and project_status='completed' ");

    if (mysqli_num_rows($select_project)>0) {

        $project_data = mysqli_fetch_assoc($select_project);

?>

<div class="post-bar">
<div class="post_topbar">
<div class="wordpressdevlp">
<h2><?php echo $project_data['title']; ?></h2>
<p><i class="la la-clock-o"></i><?php echo $days; ?></p>
</div>
<ul class="savedjob-info mangebid manbids">

<li>
<h3>Your Bid</h3>
<p><?php echo $bid_value; ?></p>
</li>

<ul class="bklink">
<li><a href="#" class="btn btn-primary text-white">Completed</a></li>
</ul>
</ul>
</div>
</div>

<?php 

    }

}

?>


<!-- READY TO PAY PROJECTS -->
<?php 

$select_projects = mysqli_query($con, "select * from projects where uid='$logged_id' and project_status='completed' ");

while ($projects=mysqli_fetch_array($select_projects)) {

    $proj_id = $projects['p_id'];

    $select_bids = mysqli_query($con, "select * from bids where project_id='$proj_id' and accept_status=1");

    if (mysqli_num_rows($select_bids)>0) {

        $bids_data = mysqli_fetch_assoc($select_bids);

?>

<div class="post-bar">
<div class="post_topbar">
<div class="wordpressdevlp">
<h2><?php echo $projects['title']; ?></h2>
<p><i class="la la-clock-o"></i><?php echo $bids_data['delivery_days']." Days"; ?></p>
</div>
<img src="<?php getQRSS($bids_data['uid']) ?>" height="200" width="200">
<ul class="savedjob-info mangebid manbids">

<li>
<h3>Bid Value</h3>
<p><?php echo $bids_data['bid_price']; ?></p>
</li>

<ul class="bklink">

<?php 

if ($projects['payment_status']=="paid") {
    echo '<li><a href="#" class="btn btn-success text-white">Completed</a></li>';
}else{
    echo '<li><a href="?complete_transaction='.$proj_id.'" class="btn btn-info text-white">Complete Transaction</a></li>';

    echo '<br><br><button type="button" name="add_review" id="add_review" class="btn btn-warning">Add Review</button>';
}
?>

</ul>
</ul>
</div>
</div>

<?php 

    }

}

?>

</div>


</div>
</div>
<div class="product-feed-tab" id="info-dd">
<div class="user-profile-ov">
<h3><a href="#" title="" class="overview-open">Overview</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
<p><?php echo $overview; ?></p>
</div>

<div class="user-profile-ov st2">
<h3><a href="#" title="" class="exp-bx-open">Experience </a> <a href="#" title="" class="exp-bx-open"><i class="fa fa-plus-square"></i></a></h3>

<?php 

$select_exp = mysqli_query($con, "select * from experience where uid='$logged_id' ");
$exist = mysqli_num_rows($select_exp);

if ($exist>0) {
    while ($exp_data = mysqli_fetch_array($select_exp)) {

?>

<h4><?php echo $exp_data['title']; ?> <a href="#" title="Delete"><i class="fa fa-trash"></i></a></h4>
<p><?php echo $exp_data['description']; ?></p>

<?php 

    }
}

?>
</div>

<div class="user-profile-ov">
<h3><a href="#" title="" class="ed-box-open">Education</a><a href="#" title="" class="ed-box-open"><i class="fa fa-plus-square"></i></a></h3>

<?php 

$select_edu = mysqli_query($con, "select * from education where uid='$logged_id' ");
$exist = mysqli_num_rows($select_edu);

if ($exist>0) {
    while ($edu_data = mysqli_fetch_array($select_edu)) {

?>

<h4><?php echo $edu_data['title']; ?> <a href="#" title="Delete"><i class="fa fa-trash"></i></a></h4>
<span><?php echo $edu_data['uni']; ?></span>
<p><?php echo $edu_data['description']; ?></p>

<?php 

    }
}

?>

</div>


</div>
<div class="product-feed-tab" id="rewivewdata">
<section></section>
<div class="posts-section">
<div class="post-bar reviewtitle">
<h2>Reviews</h2>

</div>

<?php 

$select_reviews = mysqli_query($con, "select * from reviews where review_taker='$logged_id' ");
while($reviews=mysqli_fetch_array($select_reviews)){

?>

<div class="post-bar ">

<div class="post_topbar">
<div class="usy-dt">
<img src="<?php getImage($reviews['review_giver']); ?>" height="40" width="40">
<div class="usy-name">
<h3><?php getName($reviews['review_giver']); ?></h3>
<div class="epi-sec epi2">
<ul class="descp review-lt">
<li><img src="images/icon8.png" alt=""><span><?php getUserTitle($reviews['review_giver']); ?></span></li>
<li><img src="images/icon9.png" alt=""><span><?php getLocation($reviews['review_giver']); ?></span></li>
</ul>
</div>
</div>
</div>
</div>

<div class="job_descp mngdetl">
<div class="star-descp review">
<ul>
<?php 

if ($reviews['user_rating']==1) {
    echo '<li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>';
}elseif ($reviews['user_rating']==2) {
    echo '<li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>';
}elseif ($reviews['user_rating']==3) {
    echo '<li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>';
}elseif ($reviews['user_rating']==4) {
    echo '<li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-o"></i></li>';
}elseif ($reviews['user_rating']==5) {
    echo '<li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>';
}


?>
</ul>
<a href="#" title=""><?php echo $reviews['user_rating'] ?> out of 5</a>
</div>
<div class="reviewtext">
<p><?php echo $reviews['review']; ?></p>
</div>
</div>
</div>

<?php 

}

?>
</div>
</div>
<div class="product-feed-tab" id="my-bids">
<div class="posts-section">
<div class="post-bar">
<div class="post_topbar">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<span><img src="images/clock.png" alt="">3 min ago</span>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
 <li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<div class="epi-sec">
<ul class="descp">
<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
<ul class="bk-links">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
<li><a href="#" title="" class="bid_now">Bid Now</a></li>
</ul>
</div>
<div class="job_descp">
<h3>Simple Classified Site</h3>
<ul class="job-dt">
<li><span>$300 - $350</span></li>
</ul>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
<ul class="skill-tags">
<li><a href="#" title="">HTML</a></li>
<li><a href="#" title="">PHP</a></li>
<li><a href="#" title="">CSS</a></li>
<li><a href="#" title="">Javascript</a></li>
<li><a href="#" title="">Wordpress</a></li>
<li><a href="#" title="">Photoshop</a></li>
<li><a href="#" title="">Illustrator</a></li>
<li><a href="#" title="">Corel Draw</a></li>
</ul>
</div>
<div class="job-status-bar">
<ul class="like-com">
<li>
<a href="#"><i class="la la-heart"></i> Like</a>
<img src="images/liked-img.png" alt="">
<span>25</span>
</li>
<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
</ul>
<a><i class="la la-eye"></i>Views 50</a>
</div>
</div>
<div class="post-bar">
<div class="post_topbar">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<span><img src="images/clock.png" alt="">3 min ago</span>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<div class="epi-sec">
<ul class="descp">
<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
<ul class="bk-links">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
<li><a href="#" title="" class="bid_now">Bid Now</a></li>
</ul>
</div>
<div class="job_descp">
<h3>Ios Shopping mobile app</h3>
<ul class="job-dt">
<li><span>$300 - $350</span></li>
</ul>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
<ul class="skill-tags">
<li><a href="#" title="">HTML</a></li>
<li><a href="#" title="">PHP</a></li>
<li><a href="#" title="">CSS</a></li>
<li><a href="#" title="">Javascript</a></li>
<li><a href="#" title="">Wordpress</a></li>
<li><a href="#" title="">Photoshop</a></li>
<li><a href="#" title="">Illustrator</a></li>
<li><a href="#" title="">Corel Draw</a></li>
</ul>
</div>
<div class="job-status-bar">
<ul class="like-com">
<li>
<a href="#"><i class="la la-heart"></i> Like</a>
<img src="images/liked-img.png" alt="">
<span>25</span>
</li>
<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
</ul>
<a><i class="la la-eye"></i>Views 50</a>
</div>
</div>
<div class="post-bar">
<div class="post_topbar">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<span><img src="images/clock.png" alt="">3 min ago</span>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<div class="epi-sec">
<ul class="descp">
<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
<ul class="bk-links">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
<li><a href="#" title="" class="bid_now">Bid Now</a></li>
</ul>
</div>
<div class="job_descp">
<h3>Simple Classified Site</h3>
<ul class="job-dt">
<li><span>$300 - $350</span></li>
</ul>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
<ul class="skill-tags">
<li><a href="#" title="">HTML</a></li>
<li><a href="#" title="">PHP</a></li>
<li><a href="#" title="">CSS</a></li>
<li><a href="#" title="">Javascript</a></li>
<li><a href="#" title="">Wordpress</a></li>
<li><a href="#" title="">Photoshop</a></li>
<li><a href="#" title="">Illustrator</a></li>
<li><a href="#" title="">Corel Draw</a></li>
</ul>
</div>
<div class="job-status-bar">
<ul class="like-com">
<li>
<a href="#"><i class="la la-heart"></i> Like</a>
<img src="images/liked-img.png" alt="">
<span>25</span>
</li>
<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
</ul>
<a><i class="la la-eye"></i>Views 50</a>
</div>
</div>
<div class="post-bar">
<div class="post_topbar">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<span><img src="images/clock.png" alt="">3 min ago</span>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<div class="epi-sec">
<ul class="descp">
<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
<ul class="bk-links">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
<li><a href="#" title="" class="bid_now">Bid Now</a></li>
</ul>
</div>
<div class="job_descp">
<h3>Ios Shopping mobile app</h3>
<ul class="job-dt">
<li><span>$300 - $350</span></li>
</ul>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
<ul class="skill-tags">
<li><a href="#" title="">HTML</a></li>
<li><a href="#" title="">PHP</a></li>
<li><a href="#" title="">CSS</a></li>
<li><a href="#" title="">Javascript</a></li>
<li><a href="#" title="">Wordpress</a></li>
<li><a href="#" title="">Photoshop</a></li>
<li><a href="#" title="">Illustrator</a></li>
<li><a href="#" title="">Corel Draw</a></li>
</ul>
</div>
<div class="job-status-bar">
<ul class="like-com">
<li>
<a href="#"><i class="la la-heart"></i> Like</a>
<img src="images/liked-img.png" alt="">
<span>25</span>
</li>
<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
</ul>
<a><i class="la la-eye"></i>Views 50</a>
</div>
</div>
<div class="process-comm">
<a href="#" title=""><img src="images/process-icon.png" alt=""></a>
</div>
</div>
</div>
<div class="product-feed-tab" id="portfolio-dd">
<div class="portfolio-gallery-sec">
<h3>Portfolio</h3>
<div class="portfolio-btn">
<a href="#" title=""><i class="fas fa-plus-square"></i> Add Portfolio</a>
</div>
<div class="gallery_pf">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-6 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img1.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img2.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img3.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img4.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img5.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img6.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img7.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img8.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img9.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img10.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="product-feed-tab" id="payment-dd">
<div class="billing-method">
<ul>
<li>
<h3>Add Billing Method</h3>
<a href="#" title=""><i class="fa fa-plus-circle"></i></a>
</li>
<li>
<h3>See Activity</h3>
<a href="#" title="">View All</a>
</li>
<li>
<h3>Total Earned</h3>
<span>
    <?php 

    $select_amount = mysqli_query($con, "select SUM(bids.bid_price) as total, projects.payment_status as status, projects.p_id from bids INNER JOIN projects ON bids.project_id=projects.p_id where bids.uid='$logged_id' and projects.payment_status='paid' ");

    if(mysqli_num_rows($select_amount)>0){
        $amount = mysqli_fetch_assoc($select_amount);
        echo $amount['total'];
    }else{
        echo "0.00";
    }

    ?>
</span>
</li>
</ul>
<div class="lt-sec">
<img src="<?php getQRSS($logged_id); ?>" alt="" height="200" width="200">
<h4>Add a screenshot of QR Code of JazzCash</h4>
<?php 

if (isset($_POST['add_qr_pic'])) {
    $pic = $_FILES['qr_pic']['name'];
    $pic_name = time().$pic;
    $target = "images/jazzcash_payments/".basename($pic_name);
    move_uploaded_file($_FILES['qr_pic']['tmp_name'], $target);

    $update_qr_pic_status = mysqli_query($con, "update users set qr_pic='$pic_name' where uid='$logged_id'");

    echo "<meta http-equiv='refresh' content='0'>";
}


?>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="qr_pic" >
    <input type="submit" name="add_qr_pic" class="btn btn-success" value="Add">
</form>
<!-- <a href="#" title="">Add</a> -->
</div>
</div>
<div class="add-billing-method">
<h3>Add Billing Method</h3>
<h4><img src="images/dlr-icon.png" alt=""><span>With workwise payment protection , only pay for work delivered.</span></h4>
<div class="payment_methods">
<h4>Credit or Debit Cards</h4>
<form>
<div class="row">
<div class="col-lg-12">
<div class="cc-head">
<h5>Card Number</h5>
<ul>
<li><img src="images/cc-icon1.png" alt=""></li>
<li><img src="images/cc-icon2.png" alt=""></li>
<li><img src="images/cc-icon3.png" alt=""></li>
<li><img src="images/cc-icon4.png" alt=""></li>
</ul>
</div>
<div class="inpt-field pd-moree">
<input type="text" name="cc-number" placeholder="">
<i class="fa fa-credit-card"></i>
</div>
</div>
<div class="col-lg-6">
<div class="cc-head">
<h5>First Name</h5>
</div>
<div class="inpt-field">
<input type="text" name="f-name" placeholder="">
</div>
</div>
<div class="col-lg-6">
<div class="cc-head">
<h5>Last Name</h5>
</div>
<div class="inpt-field">
<input type="text" name="l-name" placeholder="">
</div>
</div>
<div class="col-lg-6">
<div class="cc-head">
<h5>Expiresons</h5>
</div>
<div class="rowwy">
<div class="row">
<div class="col-lg-6 pd-left-none no-pd">
<div class="inpt-field">
<input type="text" name="f-name" placeholder="">
</div>
</div>
<div class="col-lg-6 pd-right-none no-pd">
<div class="inpt-field">
<input type="text" name="f-name" placeholder="">
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="cc-head">
<h5>Cvv (Security Code) <i class="fa fa-question-circle"></i></h5>
</div>
<div class="inpt-field">
<input type="text" name="l-name" placeholder="">
</div>
</div>
<div class="col-lg-12">
<button type="submit">Continue</button>
</div>
</div>
</form>
<h4>Add Paypal Account</h4>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-3">
<div class="right-sidebar">
<div class="message-btn">
<a href="profile-account-setting.html" title=""><i class="fas fa-cog"></i> Setting</a>
</div>
<div class="widget widget-portfolio">
<div class="wd-heady">
<h3>Portfolio</h3>
<img src="images/photo-icon.png" alt="">
</div>
<div class="pf-gallery">
<ul>
<li><a href="#" title=""><img src="images/resources/pf-gallery1.png" alt=""></a></li>
<li><a href="#" title=""><img src="images/resources/pf-gallery2.png" alt=""></a></li>
<li><a href="#" title=""><img src="images/resources/pf-gallery3.png" alt=""></a></li>
<li><a href="#" title=""><img src="images/resources/pf-gallery4.png" alt=""></a></li>
<li><a href="#" title=""><img src="images/resources/pf-gallery5.png" alt=""></a></li>
<li><a href="#" title=""><img src="images/resources/pf-gallery6.png" alt=""></a></li>
<li><a href="#" title=""><img src="images/resources/pf-gallery7.png" alt=""></a></li>
<li><a href="#" title=""><img src="images/resources/pf-gallery8.png" alt=""></a></li>
<li><a href="#" title=""><img src="images/resources/pf-gallery9.png" alt=""></a></li>
<li><a href="#" title=""><img src="images/resources/pf-gallery10.png" alt=""></a></li>
<li><a href="#" title=""><img src="images/resources/pf-gallery11.png" alt=""></a></li>
<li><a href="#" title=""><img src="images/resources/pf-gallery12.png" alt=""></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>

<?php include 'footer.php'; ?>

<?php 

if (isset($_POST['add-overview'])) {
    $add_overview = $_POST['overview-text'];

    mysqli_query($con, "update users set overview='$add_overview' where uid='$logged_id' ");
    echo "<meta http-equiv='refresh' content='0'>";
}

?>

<div class="overview-box" id="overview-box">
<div class="overview-edit">
<h3>Overview</h3>
<!-- <span>5000 character left</span> -->
    <form method="POST">
        <textarea name="overview-text"></textarea>
        <!-- <input type="submit" name="add-overview" value="Save" class="save"> -->
        <button type="submit" name="add-overview" class="save">Save</button>
        <!-- <button type="submit" class="cancel">Cancel</button> -->
    </form>
<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
</div>
</div>

<?php 

if (isset($_POST['add-exp'])) {
    $exp_title = $_POST['exp-title'];
    $add_exp = $_POST['exp-text'];

    mysqli_query($con, "insert into experience(uid, title, description) 
        values('$logged_id','$exp_title','$add_exp') ");
    echo "<meta http-equiv='refresh' content='0'>";
}

?>

<div class="overview-box" id="experience-box">
    <div class="overview-edit">
    <h3>Experience</h3>
    <form method="POST">
    <input type="text" name="exp-title" placeholder="Subject">
    <textarea name="exp-text"></textarea>
    <button type="submit" name="add-exp" class="save">Save</button>
    <!-- <button type="submit" class="save-add">Save & Add More</button>
    <button type="submit" class="cancel">Cancel</button> -->
    </form>
    <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div>
</div>

<?php 

if (isset($_POST['add-edu'])) {
    $edu_title = $_POST['edu-title'];
    $add_edu = $_POST['edu-text'];
    $uni = $_POST['uni'];

    mysqli_query($con, "insert into education(uid, title, description, uni) 
        values('$logged_id','$edu_title','$add_edu', '$uni') ");
    echo "<meta http-equiv='refresh' content='0'>";
}

?>

<div class="overview-box" id="education-box">
    <div class="overview-edit">
    <h3>Education</h3>

    <form method="POST">
        <input type="text" name="uni" placeholder="School / University">
        <!-- <div class="datepicky">
            <div class="row">
                <div class="col-lg-6 no-left-pd">
                <div class="datefm">
                <input type="text" name="from" placeholder="From" class="datepicker">
                <i class="fa fa-calendar"></i>
                </div>
                </div>
                <div class="col-lg-6 no-righ-pd">
                <div class="datefm">
                <input type="text" name="to" placeholder="To" class="datepicker">
                <i class="fa fa-calendar"></i>
                </div>
                </div>
            </div>
        </div> -->
        <input type="text" name="edu-title" placeholder="Degree">
        <textarea placeholder="Description" name="edu-text"></textarea>
        <button type="submit" name="add-edu" class="save">Save</button>
        <!-- <button type="submit" class="save-add">Save & Add More</button>
        <button type="submit" class="cancel">Cancel</button> -->
    </form>

    <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div>
</div>

<?php 

if (isset($_POST['add-loc'])) {
    $province = $_POST['province'];
    $city = $_POST['city'];
    $location = $city.", ".$province;

    mysqli_query($con, "update users set location='$location' where uid='$logged_id' ");
    echo "<meta http-equiv='refresh' content='0'>";
}

?>

<div class="overview-box" id="location-box">
    <div class="overview-edit">
    <h3>Location</h3>
    <form method="POST">
    <div class="datefm">
    <select name="province">
        <option selected disabled>--Select Province--</option>
        <option>Punjab</option>
        <option>Sindh</option>
        <option>KPK</option>
        <option>Balochistan</option>
        <option>Gilgit Baltistan</option>
    </select>
    <i class="fa fa-globe"></i>
    </div>
    <div class="datefm">
    <input type="text" name="city" placeholder="City">
    <i class="fa fa-map-marker"></i>
    </div>
    <button type="submit" name="add-loc" class="save">Save</button>
    <!-- <button type="submit" class="cancel">Cancel</button> -->
    </form>
    <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div>
</div>


<?php 

if (isset($_POST['save-skills'])) {
    $skills = $_POST['all-skills'];
    $skills = rtrim($skills, ',');

    mysqli_query($con, "update users set skills='$skills' where uid='$logged_id' ");
    echo "<meta http-equiv='refresh' content='0'>";
}

?>

<div class="overview-box" id="skills-box">
    <div class="overview-edit">
    <h3>Skills</h3>
    <ul class="skills-list skills-edit-box">
        <!-- <li style="display: none;"></li> -->
        <?php 

        $my_skills_array = explode(',', $my_skills);

        foreach ($my_skills_array as $my_skill) {
        ?>

        <li><a href="#" title="" class="skl-name"><?php echo $my_skill; ?></a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>

        <?php
        }

        ?>
        
    </ul>
        <form method="POST">
            <input type="text" name="skills" id="skill-tag" placeholder="Skills">
            <input type="hidden" id="all-skills" name="all-skills" value="">
            <button type="button" class="save-add" id="add-skill">Add</button>
            <button type="submit" name="save-skills" class="save">Save</button>
            <!-- <button type="submit" class="cancel">Cancel</button> -->
        </form>
    <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
    </div>
</div>

<!-- REVIEW MODAL -->
<div id="review_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white text-center">Submit Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                
                <div class="form-group pl-2 pr-2">
                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                    <input type="hidden" name="review_taker" id="review_taker" value="<?php echo $bids_data['uid']; ?>" class="form-control" />
                    <input type="hidden" name="review_giver" id="review_giver" value="<?php echo $logged_id; ?>" class="form-control" />
                </div>
                <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- REVIEW MODAL -->

<div class="overview-box" id="create-portfolio">
<div class="overview-edit">
<h3>Create Portfolio</h3>
<form>
<input type="text" name="pf-name" placeholder="Portfolio Name">
<div class="file-submit">
<input type="file" id="file">
<label for="file">Choose File</label>
</div>
<div class="pf-img">
<img src="images/resources/np.png" alt="">
</div>
<input type="text" name="website-url" placeholder="htp://www.example.com">
<button type="submit" class="save">Save</button>
<button type="submit" class="cancel">Cancel</button>
</form>
<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
</div>
</div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/flatpickr.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>

</html>