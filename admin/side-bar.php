
<link rel="stylesheet" type="text/css" href="css/my-style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

<?php

if(!isset($_SESSION['user'])){ ?>
    
    <script>
        alert('Please Login to Access Dashboard!');
        location.replace('login.php');
    </script>
    
<?php }

include 'connection.php';


?>


<ul class="navbar-nav bg-dark-grey sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="company-logo d-flex align-items-center justify-content-center" href="dashboard.php">
        <img src="img/yt-logo.PNG" height="100" width="100" style="border:2px solid; border-radius: 50%;">
      </a>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Manage Options
      </div>

      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link" href="all-freelancers.php">
          <i class="fa fa-users"></i>
          <span>All Freelancers</span></a>
      </li>

      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link" href="pending-projects.php">
          <i class="fa fa-pencil-square-o"></i>
          <span>Pending Projects</span></a>
      </li>

      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link" href="active-projects.php">
          <i class="fa fa-check-square-o"></i>
          <span>Active Projects</span></a>
      </li>

      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link" href="pending-jobs.php">
          <i class="fa fa-pencil-square-o"></i>
          <span>Pending Jobs</span></a>
      </li>

      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link" href="active-jobs.php">
          <i class="fa fa-check-square-o"></i>
          <span>Active Jobs</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="add-skills.php">
          <i class="fa fa-tags"></i>
          <span>Skills</span></a>
      </li>

      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>