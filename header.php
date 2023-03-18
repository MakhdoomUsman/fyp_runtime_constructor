<?php 

include_once 'config/connection.php';
include_once 'function.php';

if (isset($_SESSION['theuser'])) {

	$select_pic = mysqli_query($con, "select * from users where uid='$logged_id' ");
	$data = mysqli_fetch_assoc($select_pic);

	$profile_pic = $data['pic'];
	$title = $data['title'];
	$overview = $data['overview'];
	$location = $data['location'];
	$website = $data['website'];
	$skills = $data['skills'];

}


if (isset($_GET['followed']) && isset($_GET['follower'])) {
	$followed_id = $_GET['followed'];
	$follower_id = $_GET['follower'];

	$add_follow = mysqli_query($con, "insert into followings(uid, follower_id) values('$followed_id', '$follower_id')");
	if ($add_follow) {
		echo "<script>history.back(); </script>";
	}
}

if (isset($_GET['unfollowed']) && isset($_GET['unfollower'])) {
	$unfollowed_id = $_GET['unfollowed'];
	$unfollower_id = $_GET['unfollower'];

	$delete_follow = mysqli_query($con, "delete from followings where uid={$unfollowed_id} and follower_id={$unfollower_id} ");
	if ($delete_follow) {
		echo "<script>history.back(); </script>";
	}
}

if(isset($_GET['login_to_follow'])){
	echo "<script>alert('Please login to follow!'); history.back(); </script>";
}

?>
<header>
	<div class="container">
		<div class="header-data">
			<div class="logo">
				<a href="index.php" title=""><img src="images/logo.png" alt=""></a>
			</div>
			<div class="search-bar">
				<!-- <form>
					<input type="text" name="search" placeholder="Search...">
					<button type="submit"><i class="la la-search"></i></button>
				</form> -->
			</div>

			<nav>
				<ul>
					<li>
						<a href="index.php" title="">
							<span><img src="images/icon1.png" alt=""></span>Home
						</a>
					</li>

					<li>
						<a href="jobs.php" title="">
							<span><img src="images/icon5.png" alt=""></span>Jobs
						</a>
					</li>

					<li>
						<a href="companies.php" title="">
							<span><img src="images/icon5.png" alt=""></span>Companies
						</a>
					</li>

					<!-- <li>
						<a href="companies.html" title="">
							<span><img src="images/icon2.png" alt=""></span>Companies
						</a>
						<ul>
							<li><a href="companies.html" title="">Companies</a></li>
							<li><a href="company-profile.html" title="">Company Profile</a></li>
						</ul>
					</li> -->

					<!-- <li>
						<a href="projects.html" title="">
							<span><img src="images/icon3.png" alt=""></span>Projects
						</a>
					</li> -->

					<?php 

					if (!isset($_SESSION['theuser'])) {

					?>

					<li>
						<a href="account.php" title="">
							<span><img src="images/icon4.png" alt=""></span>Login
						</a>
					</li>					
					
					<?php 

					}

					if (isset($_SESSION['theuser'])) {

					?>
					<li>
						<a href="my-profile-feed.php" title="">
							<span><img src="images/icon4.png" alt=""></span>Profile
						</a>
						<!-- <ul>
							<li><a href="user-profile.html" title="">User Profile</a></li>
							<li><a href="my-profile-feed.php" title="">my-profile-feed</a></li>
						</ul> -->
					</li>

					<li>
						<a href="messages.php" title="" class="not-box-openm">
							<span><img src="images/icon6.png" alt=""></span>Messages
						</a>
						<!-- <div class="notification-box msg" id="message">
							<div class="nt-title">
								<h4>Setting</h4>
								<a href="#" title="">Clear all</a>
							</div>
							<div class="nott-list">
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/resources/ny-img1.png" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="messages.html" title="">Jassica William</a> </h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
										<span>2 min ago</span>
									</div>
								</div>
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/resources/ny-img2.png" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="messages.html" title="">Jassica William</a></h3>
										<p>Lorem ipsum dolor sit amet.</p>
										<span>2 min ago</span>
									</div>
								</div>
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/resources/ny-img3.png" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="messages.html" title="">Jassica William</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt.</p>
										<span>2 min ago</span>
									</div>
								</div>
								<div class="view-all-nots">
									<a href="messages.php" title="">View All Messsages</a>
								</div>
							</div>
						</div> -->
					</li>
					<!-- <li>
						<a href="#" title="" class="not-box-open">
							<span><img src="images/icon7.png" alt=""></span>Notification
						</a>
						<div class="notification-box noti" id="notification">
							<div class="nt-title">
								<h4>Setting</h4>
								<a href="#" title="">Clear all</a>
							</div>
							<div class="nott-list">
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/resources/ny-img1.png" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="#" title="">Jassica William</a> Comment on project.</h3>
										<span>2 min ago</span>
									</div>
								</div>
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/resources/ny-img2.png" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="#" title="">Jassica William</a> Comment on project.</h3>
										<span>2 min ago</span>
									</div>
								</div>
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/resources/ny-img3.png" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="#" title="">Jassica William</a> Comment on project.</h3>
										<span>2 min ago</span>
									</div>
								</div>
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/resources/ny-img2.png" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="#" title="">Jassica William</a> Comment on project.</h3>
										<span>2 min ago</span>
									</div>
								</div>
								<div class="view-all-nots">
									<a href="#" title="">View All Notification</a>
								</div>
							</div>
						</div>
					</li> -->
					<?php } ?>
				</ul>
			</nav>
			<div class="menu-btn">
				<a href="#" title=""><i class="fa fa-bars"></i></a>
			</div>
			<?php 

			if (isset($_SESSION['theuser'])) {

			?>
			<div class="user-account">
				<div class="user-info">
					<img src="images/profile-pics/<?php echo $profile_pic; ?>" height="30" width="30">
					<i class="la la-sort-down"></i>
				</div>
				<div class="user-account-settingss" id="users">
					<!-- <h3>Online Status</h3>
					<ul class="on-off-status">
						<li>
							<div class="fgt-sec">
								<input type="radio" name="cc" id="c5">
								<label for="c5"><span></span></label>
								<small>Online</small>
							</div>
						</li>
						<li>
							<div class="fgt-sec">
								<input type="radio" name="cc" id="c6">
								<label for="c6"><span></span></label>
								<small>Offline</small>
							</div>
						</li>
					</ul> -->
					<!-- <h3>Custom Status</h3>
					<div class="search_form">
						<form>
							<input type="text" name="search">
							<button type="submit">Ok</button> 
						</form>
					</div> -->
					<h3>Setting</h3>
					<ul class="us-links">
						<li><a href="#" title="">Account Setting</a></li>
						<li><a href="#" title="">Privacy</a></li>
						<li><a href="#" title="">Faqs</a></li>
						<li><a href="#" title="">Terms & Conditions</a></li>
					</ul>
					<h3 class="tc"><a href="logout.php" title="">Logout</a></h3>
				</div>
			</div>
			<?php 
			}
			?>

		</div>
	</div>
</header>