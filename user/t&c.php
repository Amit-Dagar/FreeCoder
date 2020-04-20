<?php
session_start();
include('../api/config.php');
if(isset($_SESSION['user']))
{
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
    $join_date=$row['user_create'];
    $designation=$row['designation'];
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="http://freecoder.in/img//favicon.png">
    <title> Revenue - Freecoder</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
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
        <svg class="circular" viewBox="25 25 50 50">
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
                            <img src="https://freecoder.in/img/favicon.png" alt="homepage" class="light-logo" style="height:50px;width:auto"/>
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
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/api/users_thumbs/<?php echo $picture;?>" alt="user" class="profile-pic m-r-10 img-circle" height="30"/><?php echo $name; ?></a>
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
                        <h3 class="text-themecolor">Revenue</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Terms & Conditions</li>
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
                <!-- Row -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <!-- Column -->
                        <?php 
                        $id=$_SESSION['user'];
						$sql4="SELECT * FROM articles WHERE user_id=$id AND status=1";
						$result=$conn->query($sql4);
						$amount=1*$result->num_rows;
						$th1=$amount*100/20;
						$th2=$amount*100/40;
						$th3=$amount*100/80;
                        ?>
                        <div class="card">
                            <img class="card-img-top" src="assets/images/background/profile-bg.jpg" alt="Card image cap">
                            <div class="card-block little-profile text-center">
                                <div class="pro-img"><img src="/api/users_thumbs/<?php echo $picture;?>" alt="user" /></div>
                                <h3 class="m-b-0"><?php echo $name; ?>&nbsp;<i class="mdi mdi-account-check" style="color:#1e88e5"></i></h3>
                                <p><?php echo $designation;?></p>
								<a href="revenue.php" class="m-t-10 waves-effect waves-dark btn btn-warning btn-md btn-rounded"><?php echo $amount;?>&nbsp;Credits</a><br><br><br>
								<div class="row text-center m-t-20" style="display:inline">									
                                    <div class="col-lg-6 col-md-6 m-t-20" style="display:inline">
                                        <a href="revenue.php"><small>Revenue</small></a></div>
									
                                    <div class="col-lg-6 col-md-6 m-t-20" style="display:inline">
                                        <a href="article.php"><small>Article</small></a></div>
									
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Terms & Conditions</h4>
								<p style="margin:0px;"><span style="font-size:20px;opacity:0.2;h" style="text-success">&#10004;</span>
								<span style="font-size:15px;">No repetition of the scripts will be allowed.</span></p>
								<p style="margin:0px;"><span style="font-size:20px;opacity:0.2;" style="text-success">&#10004;</span>
								<span style="font-size:15px;">Information of profile should be correct (Name,Email, Phone Number, Address). For payment system.</span></p>
								<p style="margin:0px;"><span style="font-size:20px;opacity:0.2;" style="text-success">&#10004;</span>
								<span style="font-size:15px;">You have to upload code with all requirement and compelete description.</span></p>
								<p style="margin:0px;"><span style="font-size:20px;opacity:0.2;" style="text-success">&#10004;</span>
								<span style="font-size:15px;">Credits will transfer to your account when code is accepted by Admin.</span></p>
								<p style="margin:0px;"><span style="font-size:20px;opacity:0.2;" style="text-success">&#10004;</span>
								<span style="font-size:15px;">Gifts/Amount only withdraw when you reach Threshold.</span></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Threshold Conditions</h4>
								<div class="table-responsive">
                                    <table class="table">
										<tr>
											<th>Credits</th>
											<th>&#10095;</th>
											<th>Amount/Gifts</th>
										</tr>
										<tr>
											<td>20</td>
											<td>&#10095;</td>
											<td>$2</td>
										</tr>
										<tr>
											<td>40</td>
											<td>&#10095;</td>
											<td>$4</td>
										</tr>
										<tr>
											<td>80</td>
											<td>&#10095;</td>
											<td>$8</td>
										</tr>
										<tr>
											<td>100</td>
											<td>&#10095;</td>
											<td>$8+$2</td>
										</tr>
										<tr>
											<td>150</td>
											<td>&#10095;</td>
											<td>$15+$2</td>
										</tr>
										<tr>
											<td>200</td>
											<td>&#10095;</td>
											<td>$20+$2</td>
										</tr>
										<tr>
											<td>500</td>
											<td>&#10095;</td>
											<td>$50+$20</td>
										</tr>
										<tr>
											<td>1000</td>
											<td>&#10095;</td>
											<td>Redmi Note 5 Pro + 1 Surprise</td>
										</tr>
										<tr>
											<td>1500</td>
											<td>&#10095;</td>
											<td>$170+$30</td>
										</tr>
										<tr>
											<td>2000</td>
											<td>&#10095;</td>
											<td>One Plus 6 + 2 Surprises</td>
										</tr>
									</table>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="assets/plugins/d3/d3.min.js"></script>
    <script src="assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
</body>
<script>
function jump()
{
  window.location.href="http://freecoder.in/requirement.php";
}
</script>
</html>
<?php
}else {
    echo '<script>window.location.href="login.php";</script>';
}
 ?>
