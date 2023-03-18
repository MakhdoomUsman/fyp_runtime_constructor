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

  <title>Skills Options</title>

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

<?php 

if(isset($_POST['add-skill'])){

  $skill_title = $_POST['skl-title'];
  $min_price = $_POST['min-price'];
  $max_price = $_POST['max-price'];

  $add_skill = mysqli_query($con, "insert into skills(title, min_price, max_price) values ('$skill_title', $min_price, $max_price) ");

  if ($add_skill) {
    ?>
      <script>
        location.replace('add-skills.php');
      </script>
    <?php
  }

}


//Deleting Skill
if (isset($_GET['did'])) {

  $delete_id = $_GET['did'];
  $delete = mysqli_query($con, "delete from skills where sk_id='$delete_id'");

  if ($delete) { ?>
    <script>
      location.replace('add-skills.php');
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
        <div class="container">
          <h1 class="h2 text-primary ml-5" >All Skills</h1>
        </div>

        <div class="row container">
          <div class="table-responsive col-md-7" style="margin-top: 25px;">
            <table class="table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Skill Title</th>
                  <th>Min. Price</th>
                  <th>Max. Price</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>

              <?php 

              $select_skl = mysqli_query($con, "select * from skills");

              $counter = 0;
              while ($row=mysqli_fetch_array($select_skl)) {
                $counter++;
                $skl_id = $row['sk_id'];
              ?>
                <tr>
                  <td><?php echo $counter ?></td>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['min_price']; ?></td>
                  <td><?php echo $row['max_price']; ?></td>
                  <td>
                    <a href="?did=<?php echo $skl_id; ?>" class="btn btn-danger mt-2 ml-1" data-toggle="tooltip" data-placement="top" title="Delete">
                      <i class="fa fa-trash-o"></i>
                    </a>
                  </td>
                  <td>
                    <a href="update-skill.php?update_id=<?php echo $skl_id; ?>" class="btn btn-warning mt-2 ml-1" data-toggle="tooltip" data-placement="top" title="Update">
                      <i class="fa fa-pencil"></i>
                    </a>
                  </td>
                </tr>

              <?php 

              }

              ?>
              </tbody>
            </table>
          </div>

          <div class="container col-md-5 row">
            <div class="col-12">
              <h2 class="mt-4">Add New</h2>
              <form method="POST" style="padding-bottom: 20px;">
                <div class="row">
                  <div class="col-12" style="margin-bottom: 20px;">
                    <label><h5>Skill Title</h5></label>
                    <input type="text" name="skl-title" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label><h5>Minimum Price</h5></label>
                    <input type="number" min="0" value="0" name="min-price" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label><h5>Maximum Price</h5></label>
                    <input type="number" min="0" value="0" name="max-price" class="form-control">
                  </div>

                  <div class="col-12" style="margin-top: 15px;">
                    <input type="submit" name="add-skill" value="Add New" class="btn btn-info">
                  </div>
                </div>
              </form>

            </div>
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
