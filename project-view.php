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
<title>Project View</title>
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

<div class="modal" id="applyjob">
    <div class="modal-dialog modal-lg">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>

    <form method="POST">
        <div class="modal-content">
        <div class="modal-header">
        <h3 class="text-light text-center">Place a Bid</h3>
        </div>
        <div class="modal-body">
        <div class="notice">
        <span class="text-danger">Note:</span><span>Freelancer project fee will only be changed when you get awarded and accept the project.</span>
        </div>
        <div class="innerbody">
        <h3>Bids :</h3>
        <div class="paydel">
        <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12">
        <h4>Paid to you :</h4>
        <div class="place-bid-form">
        
        <div class="form-row align-items-center">
        <div class="col-auto">
        <label class="sr-only" for="inlineFormInputGroup">Username</label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
        <div class="input-group-text">PKR</div>
        </div>
        <input type="text" name="bid-amount" class="form-control" id="inlineFormInputGroup" placeholder="500">
        <div class="input-group-prepend">
        <!-- <div class="input-group-text">USD</div> -->
        </div>
        </div>
        </div>
        </div>

        </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12">
        <h4>Availability / Delivery in :</h4>
        <div class="place-bid-form delivery">
        
        <div class="form-row align-items-center">
        <div class="col-auto">
        <label class="sr-only" for="inlineFormInputGroup">Username</label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
        <div class="input-group-text">Days</div>
        </div>
        <input type="number" min="0" step="1" value="0" name="delivery-days" class="form-control">
            <!-- <select id="exampleFormControlSelect1" class="form-control">
            <option>10</option>
            <option>20</option>
            <option>30</option>
            <option>40</option>
            </select> -->
        </div>
        </div>
        </div>
        
        </div>
        </div>
        </div>
        </div>
        <!-- <p>Freelancer Project Fee : PKR <b>50</b></p>
        <p>Your Bid : PKR <b>550</b></p> -->
         </div>
        <!-- <div class="beatcompitation">
        <h3>Super charge your bid and beat your competition!</h3>
        </div>
        <div class="sponser">
        <p><i class="la la-check"></i>Sponser my bid! Be the first did seen by the employer.</p>
        <h2>$3.99 USD</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rhoncus mauris sit amet leo feugiat mollis. Nam pharetra velit in viverra finibus.</p>
        </div> -->
        </div>
        <div class="modal-footer">
        <button type="submit" name="place-bid" class="place-bid-btn">Place a Bid</button>
        <button data-dismiss="modal" aria-label="Close">Cancel</button>
        </div>
        </div>
    </form>
    </div>
</div>

<div class="wrapper">

<?php include 'header.php'; ?>

<main>
<div class="main-section">
<div class="container">
<div class="main-section-data">
<div class="row">
<div class="col-xl-9 col-lg-9 col-md-12">

<?php 

if (isset($_POST['place-bid'])) {
    if (!isset($_SESSION['theuser'])) {
        ?>
        <script>alert('Please login to bid on project');location.replace('account.php')</script>
        <?php
    }else{

        $amount = $_POST['bid-amount'];
        $bid_pct = $amount/10;

        $bid_amount = $amount+$bid_pct; 
        $delivery_days = $_POST['delivery-days'];
        $project_id = $_GET['pid'];

        $insert = mysqli_query($con, "insert into bids(bid_price, delivery_days, uid, project_id) values('$bid_amount', '$delivery_days', '$logged_id', '$project_id' ) ");

        if ($insert) {
        ?>
            <div class="alert alert-success" role="alert">
              Bid Placed!
            </div>
        <?php
            
        }

    }
}

// ==============Project Details==================

$pro_id = $_GET['pid'];

$select_projects = mysqli_query($con, "select * from projects where p_id='$pro_id' ");

$exists = mysqli_num_rows($select_projects);

$pro_data = mysqli_fetch_array($select_projects);

$pro_id = $pro_data['p_id'];
$uid = $pro_data['uid'];
$p_title = $pro_data['title'];
$from_budget = $pro_data['from_budget'];
$to_budget = $pro_data['to_budget'];
$description = $pro_data['description'];
$skills = $pro_data['tech_stack'];


//no. of bids and Avg. Bid
$select_bids = mysqli_query($con, "select * from bids where project_id='$pro_id' ");
$count = mysqli_num_rows($select_bids);
if($count>0){
    $select_avg = mysqli_query($con, "select AVG(bid_price) AS average_bid from bids where project_id='$pro_id' ");
    $avg_bid = mysqli_fetch_assoc($select_avg);
    $average_bid = $avg_bid['average_bid'];
}else{
    $average_bid = 0;
}

?>

<div class="bids-detail">
<div class="row">
<div class="col-12">
<ul>
<li>
<h3>Bids</h3>
<br>
<p><?php echo $count; ?></p>
</li>
<li>
<h3>Avg Bid (PKR)</h3>
<br>
<p><?php echo $average_bid; ?></p>
</li>
<li>
<h3>Project Budget (PKR)</h3>
<br>
<p><?php echo $from_budget." - ".$to_budget; ?></p>
</li>
</ul>
    <!-- <div class="bids-time">
    <h3>7 Days 22 Hours Left</h3>
     <br>
    <p>Open</p>
    </div> -->
</div>
</div>
</div>



<div class="main-ws-sec">
<div class="posts-section">
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
<li><a href="#" title="" data-toggle="modal" data-target="#applyjob" data-whatever="@mdo" class="bid_now">Bid Now</a></li>
</ul>
</div>
<div class="job_descp accountnone">
<h3><?php echo $p_title; ?></h3>
<ul class="job-dt">
<li><span><?php echo $from_budget." - ".$to_budget; ?></span></li>
</ul>
<p><?php echo $description; ?></p>
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
    <!-- <div class="job-status-bar btm-line">
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
    <!-- <div class="comment-area">
        <i class="la la-plus-circle"></i>
        <div class="post_topbar">
        <div class="usy-dt">
        <img src="images/resources/bg-img1.png" alt="">
        <div class="usy-name">
        <h3>John Doe</h3>
        <span><img src="images/clock.png" alt="">3 min ago</span>
        </div>
        </div>
        </div>
        <div class="reply-area">
        <p>Lorem ipsum dolor sit amet,</p>
        <span><i class="la la-mail-reply"></i>Reply</span>
        <div class="comment-area reply-rply1">
        <div class="post_topbar">
        <div class="usy-dt">
        <img src="images/resources/bg-img2.png" alt="">
        <div class="usy-name">
        <h3>John Doe</h3>
        <span><img src="images/clock.png" alt="">3 min ago</span>
        </div>
        </div>
        </div>
        <div class="reply-area">
        <p>Hi John</p>
        <span><i class="la la-mail-reply"></i>Reply</span>
        </div>
        </div>
        </div>
    </div>
    <div class="comment-area">
        <div class="post_topbar">
        <div class="usy-dt">
        <img src="images/resources/bg-img3.png" alt="">
        <div class="usy-name">
        <h3>John Doe</h3>
        <span><img src="images/clock.png" alt="">3 min ago</span>
        </div>
        </div>
        </div>
        <div class="reply-area">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at.</p>
        <span><i class="la la-mail-reply"></i>Reply</span>
        </div>
    </div> -->

    <!-- <div class="postcomment">
        <div class="row">
        <div class="col-md-2">
        <img src="images/resources/bg-img4.png" alt="">
        </div>
        <div class="col-md-8">
        <form>
        <div class="form-group">
        <input type="text" class="form-control" id="inputPassword" placeholder="Post a comment">
        </div>
        </form>
        </div>
        <div class="col-md-2">
        <a href="#">Send</a>
        </div>
        </div>
    </div> -->
</div>
</div>

</div>

</div>

<div class="col-xl-3 col-lg-3 col-md-12">
<div class="right-sidebar">
<div class="widget widget-about bid-place">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applyjob" data-whatever="@mdo">Place a Bid</button>
</div>

<!-- <div class="widget widget-projectid">
<h3>Project ID : 123456789</h3>
<p>Report Project</p>
</div> -->

<div class="widget widget-jobs">
<div class="sd-title">
<h3>About the Client</h3>
<i class="la la-ellipsis-v"></i>
</div>
<div class="sd-title paymethd">
<h4>Payment Method</h4>
<p>Verified</p>
<ul class="star">
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
 <li><i class="fa fa-star-half-o"></i></li>
<li><a href="#">5.00 of 5 Reviews</a></li>
</ul>
</div>

<div class="sd-title">
<h4>20 Projects Posted | 15 Jobs Posted</h4>
<p>85% Hire Rate, 15% Open Jobs</p>
</div>
<div class="sd-title">
<h4>Member Since</h4>
<p>August 24, 2021</p>
</div>
</div>

<!-- <div class="widget widget-jobs">
<div class="sd-title">
<h3>Project Link</h3>
<i class="la la-ellipsis-v"></i>
</div>
<div class="sd-title copylink">
<P>Http://www.workwise.com/pro...</P>
<span><a href="#">Copy Link</a></span>
</div>
</div> -->

<!-- <div class="widget widget-jobs">
<div class="sd-title">
<h3>Share</h3>
</div>
<div class="sd-title copylink">
<ul>
<li>
<img src="images/social3.png" alt="image"></li>
<li>
<img src="images/social5.png" alt="image"></li>
<li>
<img src="images/social1.png" alt="image"></li>
<li>
<img src="images/social4.png" alt="image"></li>
<li>
<img src="images/social2.png" alt="image">
</li>
</ul>
</div>
</div> -->

</div>

</div>
</div>

<div class="col-12">
<div class="freelancerbiding">
<div class="row">

<div class="col-md-4 col-sm-12">
<h3>Freelancers Bidding</h3> <!-- () -->
</div>

<div class="col-md-2 col-sm-12">
<h3>View Profile</h3> <!-- () -->
</div>

<!-- <div class="col-md-2 col-sm-12">
<div class="repcent">
<h3>Reputation<i class="la la-angle-down"></i></h3>
</div>
</div> -->

<div class="col-md-2 col-sm-12">
<div class="bidrit">
<h3>Bid (PKR)</h3>
</div>
</div>

<div class="col-md-4 col-sm-12">
<div class="bidrit">
<h3>Action</h3>
</div>
</div>

</div>
<hr>

<?php 

$select_bids = mysqli_query($con, "select * from bids where project_id='$pro_id'");

while ($bids_data=mysqli_fetch_array($select_bids)) {
    
?>

<div class="row">
    <div class="col-md-4 col-sm-12">
    <div class="usy-dt">
    <img src="images/resources/jass.png" alt="">
    <div class="usy-name">
    <h3><?php getName($bids_data['uid']); ?></h3>
    <span><img src="<?php getImage($bids_data['uid']); ?>" alt="" height="50" width="50"><?php getLocation($bids_data['uid']) ?></span>
    </div>
    </div>
    </div>

    <div class=" col-md-2 col-sm-12">
        <a href="view-single-profile.php?profile_id=<?php echo $bids_data['uid']; ?>" class="btn btn-success">Profile</a>
    </div>

    <!-- <div class="col-md-2 col-sm-12">
    <div class="repcent">
    <ul class="star">
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-half-o"></i></li>
    </ul>
    <span>4.5</span>
    <p>3 Reviews</p>
    </div>
    </div> -->

    <div class="col-md-2 col-sm-12">
    <div class="bidrit">
    <?php 

    $bid_uid=$bids_data['project_id'];

    if (getUserFromProjectID($bid_uid)==$logged_id) {

    ?>
    <h3><?php echo $bids_data['bid_price']; ?></h3>
    <p>In <?php echo $bids_data['delivery_days']; ?> Days</p>
    <?php } ?>

    </div>
    </div>

    <div class="col-md-4 col-sm-12">
    <div class="bidrit">
        <a href="messages.php?user_id=<?php getUniqueID($bids_data['uid']); ?>" class="btn btn-success">Message</a>

        <?php 

        if(isset($_SESSION['theuser'])){
            if($logged_id==$uid){
        ?>
        <a href="accept-bid.php?uid=<?php echo $bids_data['uid']."&pro_id=".$pro_id; ?>" class="btn btn-primary">Accept</a>
        <?php
            }
        }

        ?>
        
    </div>
    </div>
</div>
<hr>

<?php 

}

?>

</div>
</div>
</div>
</div>
</div>
</main>

<?php include 'footer.php'; ?>

</div>

</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.range-min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>

</html>