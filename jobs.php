<?php 

session_start();

if (isset($_SESSION['theuser'])) {
    $logged_name = $_SESSION['theuser'];
    $logged_id = $_SESSION['theuser_id'];
}

?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Get Jobs</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery.range.css">
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
<div class="search-sec">
<div class="container">
<div class="search-box">
<form>
<input type="text" name="search" placeholder="Search keywords">
<button type="submit">Search</button>
</form>
</div>
</div>
</div>
<main>
<div class="main-section">
<div class="container">
<div class="main-section-data">
<div class="row">
<div class="col-lg-3">
<div class="filter-secs">
<div class="filter-heading">
<h3>Filters</h3>
<a href="#" title="">Clear all filters</a>
</div>
<div class="paddy">
<div class="filter-dd">
<div class="filter-ttl">
<h3>Skills</h3>
<a href="#" title="">Clear</a>
</div>
<form>
<input type="text" name="search-skills" placeholder="Search skills">
</form>
</div>
<div class="filter-dd">
<div class="filter-ttl">
<h3>Availabilty</h3>
<a href="#" title="">Clear</a>
</div>
<ul class="avail-checks">
    <!-- <li>
    <input type="radio" name="cc" id="c1">
    <label for="c1">
    <span></span>
    </label>
    <small>Hourly</small>
    </li> -->
<li>
<input type="radio" name="cc" id="c2">
<label for="c2">
<span></span>
</label>
<small>Part Time</small>
</li>
<li>
<input type="radio" name="cc" id="c3">
<label for="c3">
<span></span>
</label>
<small>Full Time</small>
</li>
</ul>
</div>
<div class="filter-dd">
<div class="filter-ttl">
<h3>Job Type</h3>
<a href="#" title="">Clear</a>
</div>
<form class="job-tp">
<select>
<option>Select a job type</option>
<option>Select a job type</option>
<option>Select a job type</option>
<option>Select a job type</option>
</select>
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</form>
</div>
<div class="filter-dd">
<div class="filter-ttl">
<h3>Pay Rate (PKR)</h3>
<a href="#" title="">Clear</a>
</div>
<div class="rg-slider">
<input class="rn-slider slider-input" type="hidden" value="5,50" />
</div>
<div class="rg-limit">
<h4>1K</h4>
<h4>100K+</h4>
</div>
</div>
<!-- <div class="filter-dd">
    <div class="filter-ttl">
    <h3>Experience Level</h3>
    <a href="#" title="">Clear</a>
    </div>
    <form class="job-tp">
    <select>
    <option>Select a experience level</option>
    <option>3 years</option>
    <option>4 years</option>
    <option>5 years</option>
    </select>
    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
    </form>
</div> -->
<!--     <div class="filter-dd">
    <div class="filter-ttl">
    <h3>Countries</h3>
    <a href="#" title="">Clear</a>
    </div>
    <form class="job-tp">
    <select>
    <option>Select a country</option>
    <option>United Kingdom</option>
    <option>United States</option>
    <option>Russia</option>
    </select>
    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
    </form>
    </div> -->
</div>
</div>
</div>
<div class="col-lg-6">

<div class="main-ws-sec">
    <?php 

    if (isset($_SESSION['theuser'])) {

    ?>
    <div class="post-topbar">
    <div class="user-picy">
    <img src="images/profile-pics/<?php echo $profile_pic; ?>" height="50" width="50" alt="">
    </div>
    <div class="post-st">
    <ul>
    <li><a class="post_project" href="#" title="">Post a Project</a></li>
    <li><a class="post-jb active" href="#" title="">Post a Job</a></li>
    </ul>
    </div>
    </div>
    <?php 

    }

    ?>

<div class="posts-section">

<?php 

$select_jobs = mysqli_query($con, "select * from jobs where status=1");

$exists = mysqli_num_rows($select_jobs);

if ($exists>0) {

    while ($pro_data = mysqli_fetch_array($select_jobs)) {

        $job_id = $pro_data['j_id'];
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
        <h3><a href="view-single-profile.php?profile_id=<?php echo $uid; ?>"><?php getName($uid); ?></a></h3>
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
            <li><a href="project-view.php?pid=<?php echo $job_id; ?>" title="" class="bid_now">Apply Now</a></li>
        </ul>
        </div>
        <div class="job_descp">
        <h3><?php echo $p_title; ?></h3>
        <ul class="job-dt">
        <li><span><?php echo "PKR. ".$salary; ?></span></li>
        </ul>
        <p><?php echo $description; ?><a href="#" title="">...Full View</a></p>
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

    <div class="process-comm">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

</div>

</div>
</div>
<div class="col-lg-3">
<div class="right-sidebar">
    <!-- <div class="widget widget-about">
    <img src="images/wd-logo.png" alt="">
    <h3>Track Time on Workwise</h3>
    <span>Pay only for the Hours worked</span>
    <div class="sign_link">
    <h3><a href="sign-in.html" title="">Sign up</a></h3>
    <a href="#" title="">Learn More</a>
    </div>
    </div> -->
<div class="widget widget-jobs">
<div class="sd-title">
<h3>Top Jobs</h3>
<i class="la la-ellipsis-v"></i>
</div>
<div class="jobs-list">
<div class="job-info">
<div class="job-details">
<h3>Senior Product Designer</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
</div>
<div class="hr-rate">
<span>$25/hr</span>
</div>
</div>
<div class="job-info">
<div class="job-details">
<h3>Senior UI / UX Designer</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
</div>
<div class="hr-rate">
<span>$25/hr</span>
</div>
</div>
<div class="job-info">
<div class="job-details">
<h3>Junior Seo Designer</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
</div>
<div class="hr-rate">
<span>$25/hr</span>
</div>
</div>
<div class="job-info">
<div class="job-details">
<h3>Senior PHP Designer</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
</div>
<div class="hr-rate">
<span>$25/hr</span>
</div>
</div>
<div class="job-info">
<div class="job-details">
<h3>Senior Developer Designer</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
</div>
<div class="hr-rate">
<span>$25/hr</span>
</div>
</div>
</div>
</div>
<div class="widget widget-jobs">
<div class="sd-title">
<h3>Most Viewed This Week</h3>
<i class="la la-ellipsis-v"></i>
</div>
<div class="jobs-list">
<div class="job-info">
<div class="job-details">
<h3>Senior Product Designer</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
</div>
<div class="hr-rate">
<span>$25/hr</span>
</div>
</div>
<div class="job-info">
<div class="job-details">
<h3>Senior UI / UX Designer</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
</div>
<div class="hr-rate">
<span>$25/hr</span>
</div>
</div>
<div class="job-info">
<div class="job-details">
<h3>Junior Seo Designer</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
</div>
<div class="hr-rate">
<span>$25/hr</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>

<?php include 'post-job-project.php'; ?>

<?php include 'footer.php'; ?>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.range-min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>

</html>