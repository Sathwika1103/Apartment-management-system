<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['avmsaid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $complaintTitle = $_POST['complaintTitle'];
        $complaintDesc = $_POST['complaintDesc'];
        $apart=$_POST['apartment'];
        $floor=$_POST['floor'];

        $query = mysqli_query($con, "INSERT INTO tblcomplaints(ComplaintTitle, ComplaintDesc, Apartment, Floor) VALUES ('$complaintTitle','$complaintDesc','$apart','$floor')");

        if ($query) {
            echo "<script>alert('Complaint added successfully');</script>"; 
            echo "<script>window.location.href = 'complaints.php'</script>";    
        }
        else {
            echo "<script>alert('Something Went wrong. Please Try agaian');</script>"; 
            echo "<script>window.location.href = 'complaints.php'</script>";    
        }
    }
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
    <title>AVMS | Complaints</title>
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

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Submit</strong> Complaint
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="complaintTitle" class=" form-control-label">Complaint Title</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="complaintTitle" name="complaintTitle" placeholder="Complaint Title" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="complaintDesc" class=" form-control-label">Complaint Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="complaintDesc" id="complaintDesc" rows="6" placeholder="Enter Complaint Description..." class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="apartmentNo" class=" form-control-label">Apartment No.</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="apartmentNo" name="apartmentNo" placeholder="Apartment No." class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="floorNo" class=" form-control-label">Floor No.</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="floorNo" name="floorNo" placeholder="Floor No." class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit Complaint</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include_once('includes/footer.php'); ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

            <!-- FOOTER -->
            
            <!-- END FOOTER -->
        </div>
    </div>

    <!-- JavaScript links and scripts -->
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
    <script src="js/main.js"></script>
</body>

</html>
<?php }  ?>
