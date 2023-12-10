<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $fname=$_POST['AdminName'];
    $lname=$_POST['UserName'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $usertype = $_POST['usertype'];

    $ret=mysqli_query($con, "select Email from tbladmin where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

echo '<script>alert("This email or Contact Number already associated with another account")</script>';
    }
    else{
    $query=mysqli_query($con, "insert into tbladmin(AdminName, UserName, MobileNumber, Email, Password, usertype) value('$fname', '$lname','$contno', '$email', '$password', '$usertype' )");
    if ($query) {
    
    echo '<script>alert("You have successfully registered")</script>';
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
}
  ?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    
    <title>AMS-Signup Page</title>
   



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>AVMS Login</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
    <script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 
</script>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="animsition">

    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-logo">
                    <a href="index.php">
                        <h2 style="color: #fff">AMS!! Create Your account</h2>
                    </a>
                </div>

                <div class="login-form">
                    <form method="post" onsubmit="return checkpass();">
                         
                        <div class="form-group">
                            <label> Name</label>
                           <input type="text" name="firstname" placeholder="Your  Name..." required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>User Name</label>
                           <input type="text" name="lastname" placeholder="Your user Name..." required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                           <input type="text" name="mobilenumber" maxlength="10" pattern="[0-9]{10}" placeholder="Mobile Number" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                           <input type="email" name="email" placeholder="Email address" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                           <input type="password" name="password" placeholder="Enter password" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Repeat Password</label>
                            <input type="password" name="repeatpassword" placeholder="Enter repeat password" required="true" class="form-control">
                        </div>
                        
                        <div class="form-group">
                                    <label>User Type</label>
                                    <select class="au-input au-input--full" name="usertype" required="true">
                                        <option value="">--Select Type--</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                        </div>
                        <div class="login-checkbox">
                            
                            <label >
                                <a href="forgot-password.php">Forgotten Password?</a>
                            </label>
                            <label class>
                                <a href="login.php">Signin</a>
                            </label>

                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">REGISTER</button>
                       
                       
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../admin/assets/js/main.js"></script>

</body>
</html>
