<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['avmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        // Process form data here
        $vehicleType = $_POST['vehicle-type'];
        $registrationNum = $_POST['registration-num'];
        $parkingSlot = $_POST['parking-slot'];
        $ownerName = $_POST['owner-name'];
        $apartmentNo = $_POST['apartment-no'];
        $flatNo = $_POST['flat-no'];

        // Insert data into the database
        $query = mysqli_query($con, "INSERT INTO tblvehicle (VehicleType, RegistrationNumber, ParkingSlot, OwnerName, ApartmentNo, FloorNo) VALUES ('$vehicleType', '$registrationNum', '$parkingSlot', '$ownerName', '$apartmentNo', '$flatNo')");

        if ($query) {
            echo "<script>alert('Vehicle details added successfully');</script>";
            echo "<script>window.location.href = 'vehicle.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href = 'vehicle.php'</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags and CSS links -->
    <!-- ... -->
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>AVSM Visitors Forms</title>

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
        <!-- Header and other included sections -->
        <!-- ... -->
        <?php include_once('includes/sidebar.php');?>

        <div class="page-container">
            <!-- Main content for vehicle details form -->
            <?php include_once('includes/header.php');?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add</strong> Vehicle Details
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="vehicle-type" class=" form-control-label">Vehicle Type</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="vehicle-type" id="vehicle-type" class="form-control" required>
                                                        <option value="">Select categogy</option>
                                                        <option value="2-wheeler">2 Wheeler</option>
                                                        <option value="4-wheeler">4 Wheeler</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="registration-num" class=" form-control-label">Registration Number</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="registration-num" name="registration-num" placeholder="Registration Number" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="parking-slot" class=" form-control-label">Parking Slot</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="parking-slot" name="parking-slot" placeholder="Parking Slot" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="owner-name" class=" form-control-label">Owner Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="owner-name" name="owner-name" placeholder="Owner Name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="apartment-no" class=" form-control-label">Apartment No.</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="apartment-no" name="apartment-no" placeholder="Apartment No." class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="flat-no" class=" form-control-label">Floor No.</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="flat-no" name="flat-no" placeholder="Flat No." class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <p style="text-align: center;">
                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Request Parking Slot</button>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include_once('includes/footer.php'); ?>
            </div>
        </div>
    </div>
    <!-- Script includes -->
    <!-- ... -->
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