<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<style>
  a:hover{
    text-decoration: none;
  }
</style>

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

          <!-- Page Heading -->
          <div class="container d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-primary">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="container">
            <div class="row">

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-6 col-md-6 mb-4">
                  <a href="all-freelancers.php">
                    <div class="card border-left-danger shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">All Freelancers</div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-6 col-md-6 mb-4">
                  <a href="pending-projects.php">
                    <div class="card border-left-danger shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              Pending Projects
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-line-chart fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-6 col-md-6 mb-4">
                  <a href="active-projects.php">
                    <div class="card border-left-danger shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              Active Projects
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
              </div>

              <div class="col-xl-6 col-md-6 mb-4">
                  <a href="pending-jobs.php">
                    <div class="card border-left-danger shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              Pending Jobs
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
              </div>

              <div class="col-xl-6 col-md-6 mb-4">
                  <a href="active-jobs.php">
                    <div class="card border-left-danger shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              Active Jobs
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
              </div>

              <div class="col-xl-6 col-md-6 mb-4">
                  <a href="add-skills.php">
                    <div class="card border-left-danger shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              Skills Management
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
              </div>

            </div>

            <div class="row">

              <div class="col-xl-8 col-lg-7">

                <!-- Area Chart -->
                <!-- <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                  </div>
                  <div class="card-body">
                    <div class="chart-area">
                      <canvas id="myAreaChart"></canvas>
                    </div>
                    <hr>
                    Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
                  </div>
                </div> -->

                <!-- Bar Chart -->
                <!-- <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                  </div>
                  <div class="card-body">
                    <div class="chart-bar">
                      <canvas id="myBarChart"></canvas>
                    </div>
                    <hr>
                    Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
                  </div>
                </div> -->

              </div>

              <!-- Donut Chart -->
              <!-- <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                  </div>
                  <div class="card-body">
                    <div class="chart-pie pt-4">
                      <canvas id="myPieChart"></canvas>
                    </div>
                    <hr>
                    Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file.
                  </div>
                </div>
              </div> -->

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
  <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>
