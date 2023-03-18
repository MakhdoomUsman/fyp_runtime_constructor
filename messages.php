<?php 

session_start();

if (!isset($_SESSION['theuser'])) {
    header('location:account.php');
}else{
    $logged_name = $_SESSION['theuser'];
    $logged_id = $_SESSION['theuser_id'];
    $unique_id = $_SESSION['unique_id'];
}

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title><?php echo $logged_name; ?></title>
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
    .message-box{
        height: 500px;
        width: 100%;
    }

    .ta-right .message-dt{
        width: calc( 100% - 150px );
        float: right;
        padding-left: 150px;
    }

    .message-dt p{
        width: auto;
    }

</style>

<div class="wrapper">

<?php include 'header.php'; ?>

<section class="messages-page">
<div class="container">
<div class="messages-sec">
<div class="row">
<div class="col-lg-4 col-md-12 no-pdd">
<div class="msgs-list">
<div class="msg-title">
<h3>Messages</h3>
    <!-- <ul>
    <li><a href="#" title=""><i class="fa fa-cog"></i></a></li>
    <li><a href="#" title=""><i class="fa fa-ellipsis-v"></i></a></li>
    </ul> -->
</div>
<div class="messages-list">
<ul style="border-top: 1px solid #f2f2f2;">

<?php 

$select_contacts = mysqli_query($con, "select DISTINCT incoming_msg_id, outgoing_msg_id from messages");

$contactsArray = [];
if (mysqli_num_rows($select_contacts) > 0) {
    while ($row = mysqli_fetch_array($select_contacts)) {
        array_push($contactsArray, $row['incoming_msg_id']);
        array_push($contactsArray, $row['outgoing_msg_id']);
    }

    $uniqueContactsArray = array_unique($contactsArray);
}

foreach ($uniqueContactsArray as $uniqueContact){

    if ($uniqueContact!=$unique_id) {

        $select_chat_contacts = mysqli_query($con, "select uid, unique_id, name, pic from users where unique_id={$uniqueContact}");

        $contactsRow = mysqli_fetch_assoc($select_chat_contacts);
                
        $uid = $contactsRow['uid'];
        $unique_user_id = $contactsRow['unique_id'];
        $username = $contactsRow['name'];
        $pic = $contactsRow['pic'];

        ?>

        <li>
            <a href="messages.php?user_id=<?php echo $unique_user_id ?>">
            <div class="usr-msg-details">
                <div class="usr-ms-img">
                    <img src="<?php getImage($uid); ?>" alt="">
                    <!-- <span class="msg-status"></span> -->
                </div>
                <div class="usr-mg-info">
                    <h3><?php echo $username; ?></h3>
                    <!-- <p>Lorem ipsum dolor <img src="images/smley.png" alt=""></p> -->
                </div>
                <!-- <span class="posted_time">1:55 PM</span> -->
                <!-- <span class="msg-notifc">1</span> -->
            </div>
            </a>
        </li>

        <?php

    }
    
}


?>


</ul>
</div>
</div>
</div>


<!-- Chat Area -->
<?php

if (isset($_GET['user_id'])) {
    
    $user_unique_id = $_GET['user_id'];
    $get_user_id = mysqli_query($con, "select * from users where unique_id={$user_unique_id}");

    if (mysqli_num_rows($get_user_id)) {
        $row = mysqli_fetch_assoc($get_user_id);
        $user_id = $row['uid'];
    }

?>
<div class="col-lg-8 col-md-12 pd-right-none pd-left-none">
<div class="main-conversation-box">
    <div class="message-bar-head">
        <div class="usr-msg-details">
            <div class="usr-ms-img">
                <img src="<?php getImage($user_id); ?>" alt="">
            </div>
            <div class="usr-mg-info">
                <h3><?php echo $row['name']; ?></h3>
                <p><?php echo $row['status'] ?></p>
            </div>
        </div>
        <a href="#" title=""><i class="fa fa-ellipsis-v"></i></a>
    </div>
<div class="message-box" style="margin-top: 100px; overflow: scroll;">

<!-- <div class="main-message-box ta-right">
    <div class="message-dt">
    <div class="message-inner-dt">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
    </div>
    <span>Sat, Aug 23, 1:08 PM</span>
    </div>
    <div class="messg-usr-img">
    <img src="images/resources/m-img2.png" alt="">
    </div>
</div>

<div class="main-message-box st3">
    <div class="message-dt st3">
        <div class="message-inner-dt">
            <p>Cras ultricies ligula.<img src="images/smley.png" alt=""></p>
        </div>
        <span>5 minutes ago</span>
    </div>
    <div class="messg-usr-img">
        <img src="images/resources/m-img1.png" alt="">
    </div>
</div> -->




</div>

<div class="message-send-area">

<form action="#" class="typing-area" autocomplete="off">
<div class="mf-field">
    <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden/>
    <input type="text" name="incoming_id" value="<?php echo $user_unique_id; ?>" hidden/>
    <input type="text" class="input-field" name="message" placeholder="Type a message here">
    <button type="button" class="btn-send">Send</button>
</div>
<ul>
<li><a href="#" title=""><i class="fas fa-smile"></i></a></li>
<li><a href="#" title=""><i class="fas fa-camera"></i></a></li>
<li><a href="#" title=""><i class="fas fa-paperclip"></i></a></li>
</ul>
</form>

</div>
</div>
</div>

<?php } ?>
</div>
</div>
</div>
</section>

<?php include 'footer.php'; ?>

</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
</body>

</html>