<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['avmsaid']) == 0) {
    header('location:logout.php');
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <title>Complaints</title>
    <!-- Include necessary CSS -->

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include_once('includes/sidebar.php'); ?>

        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include_once('includes/header.php'); ?>
            <!-- HEADER DESKTOP-->

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Manage Visitors -->
                                <div class="table-responsive table--no-card m-b-30">
                                    <h3 align="center">Manage Parking</h3>
                                    <hr />
                                    <!-- Code to display visitors -->
                                    <table class="table table-borderless table-striped table-earning">
                                        <!-- Table header -->
                                        <thead>
                                                <tr>
                                                    <th width="10">S.NO</th>
                                                    <th>Owner Name</th>
                                                    <th>Vehicle Category</th>
                                                    <th>Parking Slot</th>
                                                    <th>Apartment No</th>
                                                    <th>Floor</th>
                                                    <!--<th>Action</th>-->
                                                </tr>
                                        </thead>
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM tblvehicle");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <!-- Table data -->
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row['OwnerName']; ?></td>
                                                    <td><?php echo $row['VehicleType']; ?></td>
                                                    <td><?php echo $row['ParkingSlot']; ?></td>
                                                    <td><?php echo $row['ApartmentNo']; ?></td>
                                                    <td><?php echo $row['FloorNo']; ?></td>
                                                    <!-- <td><a href="viewcomplaints.php?editid=<?php echo $row['ID']; ?>" title="View Full Details" class="btn btn-primary">View Details</a></td> -->
                                                </tr>
                                            <?php
                                            $cnt = $cnt + 1;
                                        } ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <?php include_once('includes/footer.php');?>
          </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<?php }  ?>