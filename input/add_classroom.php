<?php
include '../conn.php';
session_start();
$id = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE user_id = $id";
$result =  mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style2.css">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-secondary">
        <a class=" navbar-brand" href="#">SEAS V1.2 DASHVIEW</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="logout.php"><button class=" btn" id='logout-btn'>LOGOUT</button></a>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">DASHBOARD LINKS</div>
                        <a class="nav-link" href="https://irasv1.iub.edu.bd/#/">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            ATTENDANCE
                        </a>
                        <a class="nav-link" href="http://www.iub.edu.bd/">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            IUB Website
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Core Analysis Team
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Welcome <?php echo $data['user_name'] ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active" style="color: black;"><?php echo $data['email'] ?></li>
                    </ol>
                    <div>
                        <div class="row">
                            <div class="col-xl-2 col-md-2">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Add Classroom</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="add_classroom.php">Add</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-2">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Add School</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="add_school.php">Add</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-2">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Add Faculty</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="add_faculty.php">Add</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-2">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Add Course</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="add_course.php">Add</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-2">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Add Section</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="Add_section.php">Add</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
          <div class="col-lg-12">
            <div class="card card-chart">

              <div class="alert alert-success" <?php if(isset($_GET['response']) && $_GET['response'] == 200){}else{echo "hidden";} ?>>
                <button type="button" aria-hidden="true" class="close">
                  <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <span><b> Classroom Added Successfully.</span>
              </div>

              <div class="alert alert-danger" <?php if(isset($_GET['response']) && $_GET['response'] == 501){}else{echo "hidden";} ?>>
                <button type="button" aria-hidden="true" class="close">
                  <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <span><b> Failed to add Classroom.</span>
              </div>
              <div class="card-header">
                <h4 class="card-title">New Classroom</h4>
              </div>
              <div class="card-body">
              <form action="php/classroom.php" method="POST" id="program-form">
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Classroom Id</label>
                        <input type="text" class="form-control"  placeholder="Ex. BC4001" name="classroom_id">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Classroom Size</label>
                        <input type="text" class="form-control"  placeholder="Ex. 30" name="classroom_size">
                      </div>
                    </div>
            
                  </div>
                  
                
                  </div>
                </form>
              </div>
              <div class="card-footer" align="center">
                <button type="button" class="btn btn-primary submit-button">Add Classroom</button>
              </div>
            </div>
          </div>
                    </div>

            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
    
    
    <script>
    
    $(".submit-button").click(function(){
      $("#program-form").submit();
    });

    $(".close").click(function(){
      $(".alert").hide();
    })
  </script>
</body>

</html>