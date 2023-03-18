<?php 

session_start();

include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>All Registered Freelancers</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/table-styles.css?v=<?php echo time(); ?>">
  

  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

</head>

<style>
  
  .hidden-row{
    display: none;
    background-color: #ECECEC;
  }

  .drop-items a{
    text-decoration: none;
    font-size: 16px;
    color: #E02D1B;
  }

</style>

<?php 

if (isset($_GET['did'])) {

  $delete_id = $_GET['did'];
  $delete = mysqli_query($con, "delete from users where uid='$delete_id'");

  if ($delete) { ?>
    <script>
      location.replace('all-freelancers.php');
    </script>
  <?php }
}


?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'side-bar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'top-bar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="d-flex align-items-center">
            <h1 class="h2 text-primary">All Freelancers</h1>
          </div>
        	
        	<div class="table-responsive" style="margin-top: 25px;">
        		<table class="table-hover">
        			<thead>
        				<tr>
        					<th>Image</th>
        					<th>Name</th>
        					<th>Email</th>
        					<th>Title</th>
        					<th>Location</th>
        					<th>View</th>
                  <th>Delete</th>
        				</tr>
        			</thead>
        			<tbody>

        			<?php 

        			$select_inf = mysqli_query($con, "select * from users");

        			$counter = 0;
        			while ($row=mysqli_fetch_array($select_inf)) {
        				$counter++;
                $inf_id = $row['uid'];
        			?>
        				<tr>
        					<td style="padding: 1px;">
                    <img src="../images/profile-pics/<?php echo $row['pic'] ?>" height="50" width="50">
                  </td>
        					<td><?php echo $row['name']; ?></td>
        					<td><?php echo $row['email']; ?></td>
        					<td><?php echo $row['title']; ?></td>
        					<td><?php echo $row['location']; ?></td>
        					<td>
                    <a href="#" class="btn btn-success btn-hire mt-2" data-toggle="tooltip" data-placement="top" title="View Details">
                      <i class="fa fa-eye"></i>
                    </a>
                  </td>
                  <td>
                    <a href="?did=<?php echo $inf_id; ?>" class="btn btn-danger mt-2 ml-1" data-toggle="tooltip" data-placement="top" title="Delete">
                      <i class="fa fa-trash-o"></i>
                    </a>
                  </td>
        				</tr>

                <tr class="hidden-row">
                  <td colspan="2" class="drop-items">
                    <b>Skills</b>     
                  </td>
                  <td colspan="5" class="drop-items">
                    <?php echo $row['skills']; ?>    
                  </td>
                </tr>

                <tr class="hidden-row">
                  <td colspan="2" class="drop-items">
                    <b>Overview</b>     
                  </td>
                  <td colspan="5" class="drop-items">
                    <?php echo $row['overview']; ?>    
                  </td>
                </tr>
        			<?php 

        			}

        			?>
        			</tbody>
        		</table>
        	</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include 'footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <script>
    
    $(document).ready(function(){

      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });

      $(document).on('click', '.btn-hire', function(e){
        var below_tr = $(this).parent().parent().next();
        below_tr.toggle();
        below_tr.next().toggle();
      });

    });
  </script>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include 'logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
