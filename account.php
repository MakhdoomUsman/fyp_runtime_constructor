<?php

session_start();

?>
<!DOCTYPE html>
<html>


<head>
<meta charset="UTF-8">
<title>WorkWise - Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>

<?php 

	include 'config/connection.php';

?>

<body class="sign-in">
<div class="wrapper">
<div class="sign-in-page">
<div class="signin-popup">
<div class="signin-pop">
<div class="row">
<div class="col-lg-6">
<div class="cmp-info">
<div class="cm-logo">
<img src="images/cm-logo.png" alt="">
<p>Workwise, is a Pakistan based freelancing platform and social networking where businesses and independent professionals connect and collaborate remotely</p>
</div>
<img src="images/cm-main-img.png" alt="">
</div>
</div>
<div class="col-lg-6">
<div class="login-sec">
<ul class="sign-control">
<li data-tab="tab-1" class="current"><a href="#" title="">Sign in</a></li>
<li data-tab="tab-2"><a href="#" title="">Sign up</a></li>
</ul>



<!-- Login-Form -->
<div class="sign_in_sec current" id="tab-1">
<h3>Sign in</h3>
<?php 

if (isset($_POST['login'])) {

	$email = $_POST['log-email'];
	$password = $_POST['log-password'];

	$emailsearch = "select * from users where email = '$email' ";
	$query = mysqli_query($con, $emailsearch); //This Query run here

	$email_count = mysqli_num_rows($query); //this query checks the no. of rows (if selected) of above query.

	if ($email_count) { //if it select even a single row of email then this below code runs.

		$email_pass = mysqli_fetch_assoc($query);

		$user_pass = $email_pass['password'];
		$pass_decode = password_verify($password, $user_pass);

		if ($pass_decode) {

			$_SESSION['theuser'] = $email_pass['name'];
			$_SESSION['theuser_id'] = $email_pass['uid'];
			$_SESSION['unique_id'] = $email_pass['unique_id'];
		
		?>
			<script>
				location.replace('index.php');
			</script>
		<?php
		}else{
		?>
			<div class="alert alert-danger" role="alert">
			  Incorrect Password!
			</div>
		<?php
		}

	}else{
		?>
			<div class="alert alert-danger" role="alert">
			  Email Does not Exists!
			</div>
		<?php
	}
}


// Sign-up Code
if (isset($_POST['signup'])) {

	$acc_type = mysqli_real_escape_string($con, $_POST['signup-as'] );
	$username = mysqli_real_escape_string($con, $_POST['uname'] ); 
	$title = mysqli_real_escape_string($con, $_POST['title'] ); 
	$email = mysqli_real_escape_string($con, $_POST['email'] ); 
	$location = mysqli_real_escape_string($con, $_POST['location'] ); 
	$password = mysqli_real_escape_string($con, $_POST['password'] ); 
	$rpassword = mysqli_real_escape_string($con, $_POST['repeat-password'] ); 

	$pass = password_hash($password, PASSWORD_BCRYPT);

	$emailquery = " select * from users where email='$email'";
	$query = mysqli_query($con, $emailquery);

	$emailcount = mysqli_num_rows($query);

	if ($emailcount>0) {
	 	?>
	 		<div class="alert alert-danger" role="alert">
			  Email Already Exists!
			</div>
	 	<?php
	 } else{

	 	if ($password === $rpassword) {

	 		$random_id = rand(time(), 10000000);

	 		$insert_query = " insert into users(unique_id, acc_type, name, email, password, pic, title, overview, location, website) 
	 		values ('$random_id', '$acc_type', '$username','$email', '$pass', 'user-pro-img.png', '$title', '', '$location', '')";

	 		$iquery = mysqli_query($con, $insert_query);

	 		if ($iquery) {?>

				<div class="alert alert-success" role="alert">
				  Account Created Successfully!
				</div>

				<?php } else{?>

				<div class="alert alert-danger" role="alert">
				  Account not Created :(
				</div>

				<?php }
	 		
	 	}else{
	 		?>
				<div class="alert alert-danger" role="alert">
				  Passwords are not Matching!
				</div>
			<?php
	 	}
	 }
}

?>
<form method="POST">
<div class="row">
<div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="email" name="log-email" placeholder="Enter Your Email">
<i class="la la-envelope"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="password" name="log-password" placeholder="Password">
<i class="la la-lock"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="checky-sec">
<div class="fgt-sec">
<input type="checkbox" name="cc" id="c1">
<label for="c1">
<span></span>
</label>
<small>Remember me</small>
</div>
<a href="#" title="">Forgot Password?</a>
</div>
</div>
<div class="col-lg-12 no-pdd">
<input type="submit" name="login" value="Sign In">
</div>
</div>
</form>
<div class="login-resources">
<h4>Login Via Social Account</h4>
<ul>
<li><a href="#" title="" class="fb"><i class="fa fa-facebook"></i>Login Via Facebook</a></li>
<li><a href="#" title="" class="tw"><i class="fa fa-twitter"></i>Login Via Twitter</a></li>
</ul>
</div>
</div>
<div class="sign_in_sec" id="tab-2">
	<!-- <div class="signup-tab">
	<i class="fa fa-long-arrow-left"></i>
	<h2><a href="https://gambolthemes.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="28424740464c474d684d50494558444d064b4745">[email&#160;protected]</a></h2>
	<ul>
	<li data-tab="tab-3" class="current"><a href="#" title="">User</a></li>
	<li data-tab="tab-4"><a href="#" title="">Company</a></li>
	</ul>
	</div> -->


<!------------ Sign-up form ----------------->


<div class="dff-tab current" id="tab-3">
<form method="POST">
<div class="row">
<div class="col-lg-12 no-pdd">
<div class="sn-field"> 
	<select name="signup-as">
		<option disabled selected>--Select Account Type--</option>
		<option value="ind">Individual</option>
		<option value="com">Company</option>
	</select>
<i class="la la-user"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="sn-field"> 
<input type="text" name="uname" placeholder="Full Name/Company Name">
<i class="la la-user"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="sn-field"> 
<input type="text" name="title" placeholder="Your Role/About Company">
<i class="la la-user"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="sn-field"> 
<input type="email" name="email" placeholder="Email Address">
<i class="la la-envelope"></i>
</div>
</div>
<!-- <div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="text" name="location" placeholder="City">
<i class="la la-globe"></i>
</div>
</div> -->
<div class="col-lg-12 no-pdd">
	<div class="sn-field">
	<select name="Location" id="Location" required>
    <option value="" disabled selected>Select The City</option>
    <option value="Islamabad">Islamabad</option>
    <option value="" disabled>Punjab Cities</option>
    <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
    <option value="Ahmadpur East">Ahmadpur East</option>
    <option value="Ali Khan Abad">Ali Khan Abad</option>
    <option value="Alipur">Alipur</option>
    <option value="Arifwala">Arifwala</option>
    <option value="Attock">Attock</option>
    <option value="Bhera">Bhera</option>
    <option value="Bhalwal">Bhalwal</option>
    <option value="Bahawalnagar">Bahawalnagar</option>
    <option value="Bahawalpur">Bahawalpur</option>
    <option value="Bhakkar">Bhakkar</option>
    <option value="Burewala">Burewala</option>
    <option value="Chillianwala">Chillianwala</option>
    <option value="Chakwal">Chakwal</option>
    <option value="Chichawatni">Chichawatni</option>
    <option value="Chiniot">Chiniot</option>
    <option value="Chishtian">Chishtian</option>
    <option value="Daska">Daska</option>
    <option value="Darya Khan">Darya Khan</option>
    <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
    <option value="Dhaular">Dhaular</option>
    <option value="Dina">Dina</option>
    <option value="Dinga">Dinga</option>
    <option value="Dipalpur">Dipalpur</option>
    <option value="Faisalabad">Faisalabad</option>
    <option value="Ferozewala">Ferozewala</option>
    <option value="Fateh Jhang">Fateh Jang</option>
    <option value="Ghakhar Mandi">Ghakhar Mandi</option>
    <option value="Gojra">Gojra</option>
    <option value="Gujranwala">Gujranwala</option>
    <option value="Gujrat">Gujrat</option>
    <option value="Gujar Khan">Gujar Khan</option>
    <option value="Hafizabad">Hafizabad</option>
    <option value="Haroonabad">Haroonabad</option>
    <option value="Hasilpur">Hasilpur</option>
    <option value="Haveli Lakha">Haveli Lakha</option>
    <option value="Jatoi">Jatoi</option>
    <option value="Jalalpur">Jalalpur</option>
    <option value="Jattan">Jattan</option>
    <option value="Jampur">Jampur</option>
    <option value="Jaranwala">Jaranwala</option>
    <option value="Jhang">Jhang</option>
    <option value="Jhelum">Jhelum</option>
    <option value="Kalabagh">Kalabagh</option>
    <option value="Karor Lal Esan">Karor Lal Esan</option>
    <option value="Kasur">Kasur</option>
    <option value="Kamalia">Kamalia</option>
    <option value="Kamoke">Kamoke</option>
    <option value="Khanewal">Khanewal</option>
    <option value="Khanpur">Khanpur</option>
    <option value="Kharian">Kharian</option>
    <option value="Khushab">Khushab</option>
    <option value="Kot Addu">Kot Addu</option>
    <option value="Jauharabad">Jauharabad</option>
    <option value="Lahore">Lahore</option>
    <option value="Lalamusa">Lalamusa</option>
    <option value="Layyah">Layyah</option>
    <option value="Liaquat Pur">Liaquat Pur</option>
    <option value="Lodhran">Lodhran</option>
    <option value="Malakwal">Malakwal</option>
    <option value="Mamoori">Mamoori</option>
    <option value="Mailsi">Mailsi</option>
    <option value="Mandi Bahauddin">Mandi Bahauddin</option>
    <option value="Mian Channu">Mian Channu</option>
    <option value="Mianwali">Mianwali</option>
    <option value="Multan">Multan</option>
    <option value="Murree">Murree</option>
    <option value="Muridke">Muridke</option>
    <option value="Mianwali Bangla">Mianwali Bangla</option>
    <option value="Muzaffargarh">Muzaffargarh</option>
    <option value="Narowal">Narowal</option>
    <option value="Nankana Sahib">Nankana Sahib</option>
    <option value="Okara">Okara</option>
    <option value="Renala Khurd">Renala Khurd</option>
    <option value="Pakpattan">Pakpattan</option>
    <option value="Pattoki">Pattoki</option>
    <option value="Pir Mahal">Pir Mahal</option>
    <option value="Qaimpur">Qaimpur</option>
    <option value="Qila Didar Singh">Qila Didar Singh</option>
    <option value="Rabwah">Rabwah</option>
    <option value="Raiwind">Raiwind</option>
    <option value="Rajanpur">Rajanpur</option>
    <option value="Rahim Yar Khan">Rahim Yar Khan</option>
    <option value="Rawalpindi">Rawalpindi</option>
    <option value="Sadiqabad">Sadiqabad</option>
    <option value="Safdarabad">Safdarabad</option>
    <option value="Sahiwal">Sahiwal</option>
    <option value="Sangla Hill">Sangla Hill</option>
    <option value="Sarai Alamgir">Sarai Alamgir</option>
    <option value="Sargodha">Sargodha</option>
    <option value="Shakargarh">Shakargarh</option>
    <option value="Sheikhupura">Sheikhupura</option>
    <option value="Sialkot">Sialkot</option>
    <option value="Sohawa">Sohawa</option>
    <option value="Soianwala">Soianwala</option>
    <option value="Siranwali">Siranwali</option>
    <option value="Talagang">Talagang</option>
    <option value="Taxila">Taxila</option>
    <option value="Toba Tek Singh">Toba Tek Singh</option>
    <option value="Vehari">Vehari</option>
    <option value="Wah Cantonment">Wah Cantonment</option>
    <option value="Wazirabad">Wazirabad</option>
    <option value="" disabled>Sindh Cities</option>
    <option value="Badin">Badin</option>
    <option value="Bhirkan">Bhirkan</option>
    <option value="Rajo Khanani">Rajo Khanani</option>
    <option value="Chak">Chak</option>
    <option value="Dadu">Dadu</option>
    <option value="Digri">Digri</option>
    <option value="Diplo">Diplo</option>
    <option value="Dokri">Dokri</option>
    <option value="Ghotki">Ghotki</option>
    <option value="Haala">Haala</option>
    <option value="Hyderabad">Hyderabad</option>
    <option value="Islamkot">Islamkot</option>
    <option value="Jacobabad">Jacobabad</option>
    <option value="Jamshoro">Jamshoro</option>
    <option value="Jungshahi">Jungshahi</option>
    <option value="Kandhkot">Kandhkot</option>
    <option value="Kandiaro">Kandiaro</option>
    <option value="Karachi">Karachi</option>
    <option value="Kashmore">Kashmore</option>
    <option value="Keti Bandar">Keti Bandar</option>
    <option value="Khairpur">Khairpur</option>
    <option value="Kotri">Kotri</option>
    <option value="Larkana">Larkana</option>
    <option value="Matiari">Matiari</option>
    <option value="Mehar">Mehar</option>
    <option value="Mirpur Khas">Mirpur Khas</option>
    <option value="Mithani">Mithani</option>
    <option value="Mithi">Mithi</option>
    <option value="Mehrabpur">Mehrabpur</option>
    <option value="Moro">Moro</option>
    <option value="Nagarparkar">Nagarparkar</option>
    <option value="Naudero">Naudero</option>
    <option value="Naushahro Feroze">Naushahro Feroze</option>
    <option value="Naushara">Naushara</option>
    <option value="Nawabshah">Nawabshah</option>
    <option value="Nazimabad">Nazimabad</option>
    <option value="Qambar">Qambar</option>
    <option value="Qasimabad">Qasimabad</option>
    <option value="Ranipur">Ranipur</option>
    <option value="Ratodero">Ratodero</option>
    <option value="Rohri">Rohri</option>
    <option value="Sakrand">Sakrand</option>
    <option value="Sanghar">Sanghar</option>
    <option value="Shahbandar">Shahbandar</option>
    <option value="Shahdadkot">Shahdadkot</option>
    <option value="Shahdadpur">Shahdadpur</option>
    <option value="Shahpur Chakar">Shahpur Chakar</option>
    <option value="Shikarpaur">Shikarpaur</option>
    <option value="Sukkur">Sukkur</option>
    <option value="Tangwani">Tangwani</option>
    <option value="Tando Adam Khan">Tando Adam Khan</option>
    <option value="Tando Allahyar">Tando Allahyar</option>
    <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
    <option value="Thatta">Thatta</option>
    <option value="Umerkot">Umerkot</option>
    <option value="Warah">Warah</option>
    <option value="" disabled>Khyber Cities</option>
    <option value="Abbottabad">Abbottabad</option>
    <option value="Adezai">Adezai</option>
    <option value="Alpuri">Alpuri</option>
    <option value="Akora Khattak">Akora Khattak</option>
    <option value="Ayubia">Ayubia</option>
    <option value="Banda Daud Shah">Banda Daud Shah</option>
    <option value="Bannu">Bannu</option>
    <option value="Batkhela">Batkhela</option>
    <option value="Battagram">Battagram</option>
    <option value="Birote">Birote</option>
    <option value="Chakdara">Chakdara</option>
    <option value="Charsadda">Charsadda</option>
    <option value="Chitral">Chitral</option>
    <option value="Daggar">Daggar</option>
    <option value="Dargai">Dargai</option>
    <option value="Darya Khan">Darya Khan</option>
    <option value="Dera Ismail Khan">Dera Ismail Khan</option>
    <option value="Doaba">Doaba</option>
    <option value="Dir">Dir</option>
    <option value="Drosh">Drosh</option>
    <option value="Hangu">Hangu</option>
    <option value="Haripur">Haripur</option>
    <option value="Karak">Karak</option>
    <option value="Kohat">Kohat</option>
    <option value="Kulachi">Kulachi</option>
    <option value="Lakki Marwat">Lakki Marwat</option>
    <option value="Latamber">Latamber</option>
    <option value="Madyan">Madyan</option>
    <option value="Mansehra">Mansehra</option>
    <option value="Mardan">Mardan</option>
    <option value="Mastuj">Mastuj</option>
    <option value="Mingora">Mingora</option>
    <option value="Nowshera">Nowshera</option>
    <option value="Paharpur">Paharpur</option>
    <option value="Pabbi">Pabbi</option>
    <option value="Peshawar">Peshawar</option>
    <option value="Saidu Sharif">Saidu Sharif</option>
    <option value="Shorkot">Shorkot</option>
    <option value="Shewa Adda">Shewa Adda</option>
    <option value="Swabi">Swabi</option>
    <option value="Swat">Swat</option>
    <option value="Tangi">Tangi</option>
    <option value="Tank">Tank</option>
    <option value="Thall">Thall</option>
    <option value="Timergara">Timergara</option>
    <option value="Tordher">Tordher</option>
    <option value="" disabled>Balochistan Cities</option>
    <option value="Awaran">Awaran</option>
    <option value="Barkhan">Barkhan</option>
    <option value="Chagai">Chagai</option>
    <option value="Dera Bugti">Dera Bugti</option>
    <option value="Gwadar">Gwadar</option>
    <option value="Harnai">Harnai</option>
    <option value="Jafarabad">Jafarabad</option>
    <option value="Jhal Magsi">Jhal Magsi</option>
    <option value="Kacchi">Kacchi</option>
    <option value="Kalat">Kalat</option>
    <option value="Kech">Kech</option>
    <option value="Kharan">Kharan</option>
    <option value="Khuzdar">Khuzdar</option>
    <option value="Killa Abdullah">Killa Abdullah</option>
    <option value="Killa Saifullah">Killa Saifullah</option>
    <option value="Kohlu">Kohlu</option>
    <option value="Lasbela">Lasbela</option>
    <option value="Lehri">Lehri</option>
    <option value="Loralai">Loralai</option>
    <option value="Mastung">Mastung</option>
    <option value="Musakhel">Musakhel</option>
    <option value="Nasirabad">Nasirabad</option>
    <option value="Nushki">Nushki</option>
    <option value="Panjgur">Panjgur</option>
    <option value="Pishin Valley">Pishin Valley</option>
    <option value="Quetta">Quetta</option>
    <option value="Sherani">Sherani</option>
    <option value="Sibi">Sibi</option>
    <option value="Sohbatpur">Sohbatpur</option>
    <option value="Washuk">Washuk</option>
    <option value="Zhob">Zhob</option>
    <option value="Ziarat">Ziarat</option>
  	</select>
	<i class="la la-globe"></i>
	<span><i class="fa fa-ellipsis-h"></i></span>
	</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="password" name="password" placeholder="Password">
<i class="la la-lock"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="password" name="repeat-password" placeholder="Repeat Password">
<i class="la la-lock"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="checky-sec st2">
<div class="fgt-sec">
<input type="checkbox" name="cc" id="c2" required>
<label for="c2">
<span></span>
</label>
<small>Yes, I understand and agree to the workwise Terms & Conditions.</small>
</div>
</div>
</div>
<div class="col-lg-12 no-pdd">
<!-- <button type="submit" value="signup" name="signup">Get Started</button> -->
<input type="submit" name="signup" value="Get Started">
</div>
</div>
</form>
</div>

<!-- <div class="dff-tab" id="tab-4">
	<form>
	<div class="row">
	<div class="col-lg-12 no-pdd">
	<div class="sn-field">
	<input type="text" name="company-name" placeholder="Company Name">
	<i class="la la-building"></i>
	</div>
	</div>
	<div class="col-lg-12 no-pdd">
	<div class="sn-field">
	<input type="text" name="country" placeholder="Country">
	<i class="la la-globe"></i>
	</div>
	</div>
	<div class="col-lg-12 no-pdd">
	<div class="sn-field">
	<input type="password" name="password" placeholder="Password">
	<i class="la la-lock"></i>
	</div>
	</div>
	<div class="col-lg-12 no-pdd">
	<div class="sn-field">
	<input type="password" name="repeat-password" placeholder="Repeat Password">
	<i class="la la-lock"></i>
	</div>
	</div>
	<div class="col-lg-12 no-pdd">
	<div class="checky-sec st2">
	<div class="fgt-sec">
	<input type="checkbox" name="cc" id="c3">
	<label for="c3">
	<span></span>
	</label>
	<small>Yes, I understand and agree to the workwise Terms & Conditions.</small>
	</div>
	</div>
	</div>
	<div class="col-lg-12 no-pdd">
	<button type="submit" value="signup" name="signup">Get Started</button>
	</div>
	</div>
	</form>
</div> -->

</div>
</div>
</div>
</div>
</div>
</div>
<div class="footy-sec">
<div class="container">
<ul>
<li><a href="#" title="">Help Center</a></li>
<li><a href="#" title="">About</a></li>
<li><a href="#" title="">Privacy Policy</a></li>
<li><a href="#" title="">Community Guidelines</a></li>
<li><a href="#" title="">Cookies Policy</a></li>
<li><a href="#" title="">Career</a></li>
<li><a href="#" title="">Forum</a></li>
<li><a href="#" title="">Language</a></li>
<li><a href="#" title="">Copyright Policy</a></li>
</ul>
<p><img src="images/copy-icon.png" alt="">Copyright 2019</p>
</div>
</div>
</div>
</div>
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>


</html>