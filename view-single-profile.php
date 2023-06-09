<?php 

session_start();

if (!isset($_SESSION['theuser'])) {
    header('location:account.php');
}else{
    $logged_name = $_SESSION['theuser'];
    $logged_id = $_SESSION['theuser_id'];
}

include 'config/connection.php';
include_once 'function.php';

if ($_GET['profile_id']) {
    $profile_id = $_GET['profile_id'];
    if($logged_id==$profile_id){
        header('location:my-profile-feed.php');
    }
}else{
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title><?php getName($profile_id); ?></title>
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
<div class="wrapper">

<?php include 'header.php'; ?>

<section class="cover-sec">
<img src="images/resources/company-cover.jpg" alt="">
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
<img src="<?php getImage($profile_id); ?>" height="170" width="170" alt="">
</div>
<div class="user_pro_status">
<ul class="flw-hr">
<?php 

    //Checking if already following
    $follower_id = $logged_id;

    $select_follower = mysqli_query($con, "select * from followings where uid={$profile_id} and follower_id={$follower_id} ");

    if(mysqli_num_rows($select_follower)>0){

    ?>
        <li><a href="?unfollowed=<?php echo $profile_id."&unfollower=".$follower_id; ?>" title="" class="btn btn-danger">Unfollow</a></li>
    <?php

    }else{

    ?>

        <li><a href="?followed=<?php echo $profile_id."&follower=".$follower_id; ?>" title="" class="flww"><i class="la la-plus"></i> Follow</a></li>

    <?php 

    }

?>

</ul>
<ul class="flw-status">
<li>
<span>Following</span>
<b><?php getFollowing($profile_id) ?></b>
</li>
<li>
<span>Followers</span>
<b><?php getFollowers($profile_id) ?></b>
</li>
</ul>
</div>
<!-- <ul class="social_links">
<li><a href="#" title=""><i class="la la-globe"></i> www.example.com</a></li>
<li><a href="#" title=""><i class="fa fa-facebook-square"></i> Http://www.facebook.com/john...</a></li>
<li><a href="#" title=""><i class="fa fa-twitter"></i> Http://www.Twitter.com/john...</a></li>
<li><a href="#" title=""><i class="fa fa-google-plus-square"></i> Http://www.googleplus.com/john...</a></li>
<li><a href="#" title=""><i class="fa fa-behance-square"></i> Http://www.behance.com/john...</a></li>
<li><a href="#" title=""><i class="fa fa-pinterest"></i> Http://www.pinterest.com/john...</a></li>
<li><a href="#" title=""><i class="fa fa-instagram"></i> Http://www.instagram.com/john...</a></li>
<li><a href="#" title=""><i class="fa fa-youtube"></i> Http://www.youtube.com/john...</a></li>
</ul> -->
</div>

<div class="user-profile-ov">
    <h3>Skills
        <!-- <a href="#" title="" class="skills-open"><i class="fa fa-pencil"></i></a> -->
    </h3>
    <ul>
        <?php 

        $select_user_skills = mysqli_query($con, "select skills from users where uid='$profile_id'");
        $user_skills = mysqli_fetch_assoc($select_user_skills);
        $u_skills = $user_skills['skills'];

        $u_skills_array = explode(',', $u_skills);

        foreach ($u_skills_array as $u_skill) {

        ?>
        <li><a href="#" title=""><?php echo $u_skill; ?></a></li>
        <?php

        }

        ?>
    </ul>
</div>

<div class="user-profile-ov">
    <h3>Location
        <!-- <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a> -->
    </h3>
    <!-- <h4>India</h4> -->
    <p><?php getLocation($profile_id); ?></p>
</div>

<!-- <div class="suggestions full-width">
<div class="sd-title">
<h3>Suggestions</h3>
<i class="la la-ellipsis-v"></i>
</div>
<div class="suggestions-list">
<div class="suggestion-usd">
<img src="images/resources/s1.png" alt="">
<div class="sgt-text">
<h4>Jessica William</h4>
<span>Graphic Designer</span>
</div>
<span><i class="la la-plus"></i></span>
</div>
<div class="suggestion-usd">
<img src="images/resources/s2.png" alt="">
<div class="sgt-text">
<h4>John Doe</h4>
<span>PHP Developer</span>
</div>
<span><i class="la la-plus"></i></span>
</div>
<div class="suggestion-usd">
<img src="images/resources/s3.png" alt="">
<div class="sgt-text">
<h4>Poonam</h4>
<span>Wordpress Developer</span>
</div>
<span><i class="la la-plus"></i></span>
</div>
<div class="suggestion-usd">
<img src="images/resources/s4.png" alt="">
<div class="sgt-text">
<h4>Bill Gates</h4>
<span>C & C++ Developer</span>
</div>
<span><i class="la la-plus"></i></span>
</div>
<div class="suggestion-usd">
<img src="images/resources/s5.png" alt="">
<div class="sgt-text">
<h4>Jessica William</h4>
<span>Graphic Designer</span>
</div>
<span><i class="la la-plus"></i></span>
</div>
<div class="suggestion-usd">
<img src="images/resources/s6.png" alt="">
<div class="sgt-text">
<h4>John Doe</h4>
<span>PHP Developer</span>
</div>
<span><i class="la la-plus"></i></span>
</div>
<div class="view-more">
<a href="#" title="">View More</a>
</div>
</div>
</div> -->


</div>
</div>
<div class="col-lg-6">
<div class="main-ws-sec">
<div class="user-tab-sec">
<h3><?php echo getName($profile_id); ?></h3>
<div class="star-descp">
<span><?php echo getUserTitle($profile_id); ?></span>
<ul>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star-half-o"></i></li>
</ul>
</div>
<div class="tab-feed">
<ul>
<li data-tab="feed-dd" class="active">
<a href="#" title="">
<img src="images/ic1.png" alt="">
<span>Feed</span>
</a>
</li>
<li data-tab="info-dd">
<a href="#" title="">
<img src="images/ic2.png" alt="">
<span>Info</span>
</a>
</li>
<li data-tab="portfolio-dd">
<a href="#" title="">
<img src="images/ic3.png" alt="">
<span>Portfolio</span>
</a>
</li>
<li data-tab="rewivewdata">
<a href="#" title="">
<img src="images/review.png" alt="">
<span>Reviews</span>
</a>
</li>
</ul>
</div>
</div>
<div class="product-feed-tab current" id="feed-dd">


<div class="posts-section">

    <h3 class="text-center" style="padding-bottom: 20px;">[ Jobs Posted ]</h3>

<?php 

$select_projects = mysqli_query($con, "select * from jobs where status=1 and uid=$profile_id");

$exists = mysqli_num_rows($select_projects);

if ($exists>0) {

    while ($pro_data = mysqli_fetch_array($select_projects)) {

        $pro_id = $pro_data['j_id'];
        $uid = $pro_data['uid'];
        $p_title = $pro_data['title'];
        $salary = $pro_data['salary'];
        $job_type = $pro_data['job_type'];
        $description = $pro_data['description'];
        $skills = $pro_data['tech_stack'];

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
            <li><a href="#" title="" class="bid_now">View Activity</a></li>
        </ul>
        </div>
        <div class="job_descp">
        <h3><?php echo $p_title; ?></h3>
        <ul class="job-dt">
        <li><span><?php echo $salary; ?></span></li>
        </ul>
        <p><?php echo $description; ?><a href="#" title="">full view</a></p>
        <ul class="skill-tags">
            <?php 

            $skills_array = explode(',', $skills);

            foreach ($skills_array as $skill) {

            ?>
            <li><a href="#" title="" class="skl-name"><?php echo $skill; ?></a></li>
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

</div>


<div class="posts-section">

    <h3 class="text-center" style="padding-bottom: 20px;">[ Projects Posted ]</h3>

<?php 

$select_projects = mysqli_query($con, "select * from projects where status=1 and uid=$profile_id");

$exists = mysqli_num_rows($select_projects);

if ($exists>0) {

    while ($pro_data = mysqli_fetch_array($select_projects)) {

        $pro_id = $pro_data['p_id'];
        $uid = $pro_data['uid'];
        $p_title = $pro_data['title'];
        $from_budget = $pro_data['from_budget'];
        $to_budget = $pro_data['to_budget'];
        $description = $pro_data['description'];
        $skills = $pro_data['tech_stack'];

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
        <p><?php echo $description; ?><a href="#" title="">full view</a></p>
        <ul class="skill-tags">
            <?php 

            $skills_array = explode(',', $skills);

            foreach ($skills_array as $skill) {

            ?>
            <li><a href="#" title="" class="skl-name"><?php echo $skill; ?></a></li>
            <?php

            }

            ?>
        </ul>
        </div>
    </div>

<?php 

   }
}

?>

    <div class="process-comm">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

</div>



</div>
<div class="product-feed-tab" id="info-dd">
<div class="user-profile-ov">
<!-- <h3><a href="#" title="" class="overview-open">Overview</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3> -->
<h3><a href="#" title="">Overview</a></h3>
<p><?php getOverview($profile_id); ?></p>
</div>

<!-- <div class="user-profile-ov st2">
<h3><a href="#" title="" class="esp-bx-open">Establish Since </a><a href="#" title="" class="esp-bx-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="esp-bx-open"><i class="fa fa-plus-square"></i></a></h3>
<span>February 2004</span>
</div>
<div class="user-profile-ov">
<h3><a href="#" title="" class="emp-open">Total Employees</a> <a href="#" title="" class="emp-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="emp-open"><i class="fa fa-plus-square"></i></a></h3>
<span>17,048</span>
</div> -->

<div class="user-profile-ov">
<!-- <h3><a href="#" title="" class="lct-box-open">Location</a> <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="lct-box-open"><i class="fa fa-plus-square"></i></a></h3> -->
<h3><a href="#" title="">Location</a></h3>
<!-- <h4>USA</h4> -->
<p><?php getLocation($profile_id); ?></p>
</div>
</div>
<div class="product-feed-tab" id="portfolio-dd">
<div class="portfolio-gallery-sec">
<h3>Portfolio</h3>
<div class="gallery_pf">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img1.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img2.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img3.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img4.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img5.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img6.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img7.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img8.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img9.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-6">
<div class="gallery_pt">
<img src="images/resources/pf-img10.jpg" alt="">
<a href="#" title=""><img src="images/all-out.png" alt=""></a>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Reviews Here -->
<div class="product-feed-tab" id="rewivewdata">
<section></section>
<div class="posts-section">
<div class="post-bar reviewtitle">
<h2>Reviews</h2>
</div>



<?php 

$select_reviews = mysqli_query($con, "select * from reviews where review_taker='$profile_id' ");
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

</div>
</div>
<div class="col-lg-3">
<div class="right-sidebar">
<div class="message-btn">
<a href="messages.php?user_id=<?php getUniqueID($profile_id) ?>" title=""><i class="fa fa-envelope"></i> Message</a>
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
<footer>
<div class="footy-sec mn no-margin">
<div class="container">
<ul>
<li><a href="help-center.html" title="">Help Center</a></li>
<li><a href="about.html" title="">About</a></li>
<li><a href="#" title="">Privacy Policy</a></li>
<li><a href="#" title="">Community Guidelines</a></li>
<li><a href="#" title="">Cookies Policy</a></li>
<li><a href="#" title="">Career</a></li>
<li><a href="forum.html" title="">Forum</a></li>
<li><a href="#" title="">Language</a></li>
<li><a href="#" title="">Copyright Policy</a></li>
</ul>
<p><img src="images/copy-icon2.png" alt="">Copyright 2018</p>
<img class="fl-rgt" src="images/logo2.png" alt="">
</div>
</div>
</footer>
<div class="overview-box" id="overview-box">
<div class="overview-edit">
<h3>Overview</h3>
<span>5000 character left</span>
<form>
<textarea></textarea>
<button type="submit" class="save">Save</button>
<button type="submit" class="cancel">Cancel</button>
</form>
<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
</div>
</div>
<div class="overview-box" id="experience-box">
<div class="overview-edit">
<h3>Experience</h3>
<form>
<input type="text" name="subject" placeholder="Subject">
<textarea></textarea>
<button type="submit" class="save">Save</button>
<button type="submit" class="save-add">Save & Add More</button>
<button type="submit" class="cancel">Cancel</button>
</form>
<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
</div>
</div>
<div class="overview-box" id="education-box">
<div class="overview-edit">
<h3>Education</h3>
<form>
<input type="text" name="school" placeholder="School / University">
<div class="datepicky">
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
</div>
<input type="text" name="degree" placeholder="Degree">
<textarea placeholder="Description"></textarea>
<button type="submit" class="save">Save</button>
<button type="submit" class="save-add">Save & Add More</button>
<button type="submit" class="cancel">Cancel</button>
</form>
<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
</div>
</div>
<div class="overview-box" id="location-box">
<div class="overview-edit">
<h3>Location</h3>
<form>
<div class="datefm">
<select>
<option>Country</option>
<option value="pakistan">Pakistan</option>
<option value="england">England</option>
<option value="india">India</option>
<option value="usa">United Sates</option>
</select>
<i class="fa fa-globe"></i>
</div>
<div class="datefm">
<select>
<option>City</option>
<option value="london">London</option>
<option value="new-york">New York</option>
<option value="sydney">Sydney</option>
<option value="chicago">Chicago</option>
</select>
<i class="fa fa-map-marker"></i>
</div>
<button type="submit" class="save">Save</button>
<button type="submit" class="cancel">Cancel</button>
</form>
<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
</div>
</div>
<div class="overview-box" id="skills-box">
<div class="overview-edit">
<h3>Skills</h3>
<ul>
<li><a href="#" title="" class="skl-name">HTML</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
<li><a href="#" title="" class="skl-name">php</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
<li><a href="#" title="" class="skl-name">css</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
</ul>
<form>
<input type="text" name="skills" placeholder="Skills">
<button type="submit" class="save">Save</button>
<button type="submit" class="save-add">Save & Add More</button>
<button type="submit" class="cancel">Cancel</button>
</form>
<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
</div>
</div>
<div class="overview-box" id="create-portfolio">
<div class="overview-edit">
<h3>Create Portfolio</h3>
<form>
<input type="text" name="pf-name" placeholder="Portfolio Name">
<div class="file-submit nomg">
<input type="file" name="file">
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
<div class="overview-box" id="establish-box">
<div class="overview-edit">
<h3>Establish Since</h3>
<form>
<div class="daty">
<input type="text" name="establish" placeholder="Select Date" class="datepicker">
<i class="fa fa-calendar"></i>
</div>
<button type="submit" class="save">Save</button>
<button type="submit" class="cancel">Cancel</button>
</form>
<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
</div>
</div>
<div class="overview-box" id="total-employes">
<div class="overview-edit">
<h3>Total Employees</h3>
<form>
<input type="text" name="employes" placeholder="Type in numbers">
<button type="submit" class="save">Save</button>
<button type="submit" class="cancel">Cancel</button>
</form>
<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
</div>
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
                <!-- <div class="form-group">
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                </div> -->
                <div class="form-group pl-2 pr-2">
                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- REVIEW MODAL -->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/flatpickr.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>


</html>