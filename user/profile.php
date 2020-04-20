<?php
session_start();
include('../api/config.php');
if(isset($_SESSION['user']))
{
  $i=0;
  $id=$_SESSION['user'];
  $sql="select * from users where id=$id";
  $result=$conn->query($sql);
  while($row=$result->fetch_assoc())
  {
    $id=$row['id'];
    $fname=$row['fname'];
    $lname=$row['lname'];
    $name=$fname.' '.$lname;
    $email=$row['email'];
    $phone=$row['phno'];
    $picture=$row['picture'];
    $picture2=$row['picture'];
    $join_date=$row['user_create'];
    $designation=$row['designation'];
    $password=$row['password'];
  }
  if(isset($_POST['submit']))
  {
  $designation=$_POST['designation'];
  $sql="update users set designation='$designation' where id=$id";
  if($conn->query($sql)===true)
  {
    $i=1;
  }
  $sql="SELECT * FROM users where id=$id";
  $result=$conn->query($sql);
  while($row=$result->fetch_assoc())
  {
    $fname=$row['fname'];
    $lname=$row['lname'];
    $name=$fname.' '.$lname;
    $email=$row['email'];
    $phone=$row['phno'];
    $picture=$row['picture'];
    $picture2=$row['picture'];
    $join_date=$row['user_create'];
    $designation=$row['designation'];
    $password=$row['password'];
  }
  }

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <title><?php echo $name;?> Profile - Freecoder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="http://freecoder.in/img/favicon.png">
    <title></title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox=" 25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->

                            <!-- Light Logo icon -->
                            <img src="http://freecoder.in/img/favicon.png" alt="homepage" class="light-logo" style="height:50px;width:auto"/>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span style="color:white">

                         <!-- Light Logo text -->
                         Freecoder</span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/api/users_thumbs/<?php echo $picture;?>" alt="<?php echo $name;?>" class="profile-pic m-r-10" height="30" /><?php echo $name;?></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include('header.php');?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <style>
                input[type="file"] {
                    display: none;
                }

                .custom-file-upload {
                    border: 1px solid #ccc;
                    display: inline-block;
                    padding: 6px 12px;
                    cursor: pointer;
                    border-radius: 3px;
                    margin-bottom: 10px;
                }
                </style>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <center class="m-t-30"> <img src="/api/users_thumbs/<?php echo $picture;?>" class="img-circle" width="150" height="150" />
                                    <h4 class="card-title m-t-10"></i><?php echo $name;?>&nbsp;<i class="mdi mdi-account-check" style="color:#1e88e5"></i></h4>
                                    <h6 class="card-subtitle">Team Member of Freecoder</h6>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                              <div class="form-group">
                                  <div class="col-md-12">
                                    <?php
                                    if($i==1)
                                    {
                                    echo '<p style="background-color:#26c6da!important;padding:20px;border-radius:5px;text-align:center;color:white">Profile Updated</p>';
                                    }
                                    ?>
                                  </div>

                              </div>
                                <form class="form-horizontal form-material" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                    <div class="form-group">
                                        <label class="col-sm-12">Select Designation</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line" name="designation" required="">
                                              <option <?php if($designation=='Software Developer'){echo "selected";}?>>Software Developer</option>
                                              <option <?php if($designation=='R Developer'){echo "selected";}?>>R Developer</option>
                                              <option <?php if($designation=='Web Designer'){echo "selected";}?>>Web Designer</option>
                                              <option <?php if($designation=='Python Developer'){echo "selected";}?>>Python Developer</option>
                                              <option <?php if($designation=='Web Developer'){echo "selected";}?>>Web Developer</option>
                                              <option <?php if($designation=='Ethical Hacker/Host'){echo "selected";}?>>Ethical Hacker/Host</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button name="submit" class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                    <div>
                                      If you want to change you name and password then go to the <a href="/login/">API console</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include('footer.php');?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>
<?php
}
else{
	echo '<script>window.location.href="login.php";</script>';
}
 ?>
