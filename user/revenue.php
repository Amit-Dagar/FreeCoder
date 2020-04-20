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
                            <li class="breadcrumb-item active">Revenue</li>
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
						$sql4="SELECT * FROM articles WHERE user_id=$id AND article_status=1";
						$result=$conn->query($sql4);
						$amount=1*$result->num_rows;
						$debited_amount=0;
						$sql="SELECT * FROM checkout where uid=$id AND status='y'";
						$result=$conn->query($sql);
						if($result->num_rows>0)
						{
							while($row=$result->fetch_assoc())
							{
								$debited_amount+=$row['credits'];
							}
						}
						$amount=$amount-$debited_amount;
						$th_val=0;
						if($amount>=20 && $amount<40)
							$th_val=1;
						elseif($amount>=40 && $amount<80)
							$th_val=2;
						elseif($amount>=80 && $amount<100)
							$th_val=3;
						elseif($amount>=100 && $amount<150)
						{
							$th_val=4;
						}
						elseif($amount>=150 && $amount<200)
						{
							$th_val=5;
						}
						elseif($amount>=200 && $amount<500)
						{
							$th_val=6;
						}
						elseif($amount>=500 && $amount<1000)
							$th_val=7;
						elseif($amount>=1000 && $amount<1500)
							$th_val=8;
						elseif($amount>=1500 && $amount<2000)
						{
							$th_val=9;
						}
						elseif($amount>=2000)
							$th_val=10;
						else{}
						
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
                                        <a href="t&c.php"><small>T&C</small></a></div>
									
                                    <div class="col-lg-6 col-md-6 m-t-20" style="display:inline">
                                        <a href="article.php"><small>Article</small></a></div>
									
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Your Thresholds</h4>
                                <div class="table-responsive">
								<label>Threshold Level :<b style="color:#DAA520">&nbsp;&nbsp;<?php echo $th_val;?></b></label><br>
								<small style="color:#DAA520">Credits&nbsp;:&nbsp;<?php echo $amount;?></small>
                                    <div class="progress">
									<?php if($amount<=20){$th1=$amount*100/20;?>
									  <div class="progress-bar progress-bar-striped bg-success text-orange active" role="progressbar"
									  aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $th1;?>%">
										<?php echo $amount;?>/20
									  </div>
									<?php }elseif($amount<=40){$th1=$amount*100/40;?>
									  <div class="progress-bar progress-bar-striped bg-success text-orange active" role="progressbar"
									  aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $th1;?>%">
										<?php echo $amount;?>/40
									  </div>
									<?php }elseif($amount<=80){$th1=$amount*100/80;?>
									  <div class="progress-bar progress-bar-striped bg-success text-orange active" role="progressbar"
									  aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $th1;?>%">
										<?php echo $amount;?>/80
									  </div>
									<?php }elseif($amount<=100){$th1=$amount*100/100;?>
									  <div class="progress-bar progress-bar-striped bg-success text-orange active" role="progressbar"
									  aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $th1;?>%">
										<?php echo $amount;?>/100
									  </div>
									<?php }elseif($amount<=150){$th1=$amount*100/150;?>
									  <div class="progress-bar progress-bar-striped bg-success text-orange active" role="progressbar"
									  aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $th1;?>%">
										<?php echo $amount;?>/150
									  </div>
									<?php }elseif($amount<=200){$th1=$amount*100/200;?>
									  <div class="progress-bar progress-bar-striped bg-success text-orange active" role="progressbar"
									  aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $th1;?>%">
										<?php echo $amount;?>/200
									  </div>
									<?php }elseif($amount<=500){$th1=$amount*100/500;?>
									  <div class="progress-bar progress-bar-striped bg-success text-orange active" role="progressbar"
									  aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $th1;?>%">
										<?php echo $amount;?>/500
									  </div>
									<?php }elseif($amount<=1000){$th1=$amount*100/1000;?>
									  <div class="progress-bar progress-bar-striped bg-success text-orange active" role="progressbar"
									  aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $th1;?>%">
										<?php echo $amount;?>/1000
									  </div>
									<?php }elseif($amount<=1500){$th1=$amount*100/1500;?>
									  <div class="progress-bar progress-bar-striped bg-success text-orange active" role="progressbar"
									  aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $th1;?>%">
										<?php echo $amount;?>/1500
									  </div>
									<?php }elseif($amount<=2000){$th1=$amount*100/2000;?>
									  <div class="progress-bar progress-bar-striped bg-success text-orange active" role="progressbar"
									  aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $th1;?>%">
										<?php echo $amount;?>/2000
									  </div>
									<?php }else{}?>
									</div>
									<br>
									<br>
									<?php
									if($amount>=20)
									{
										?>
										<form class="hidden" action="https://freecoder.in/user/custom/checkout.php" method="post">
											<input type="hidden" value="<?php echo $id;?>" name="uid">
										</form>
										<?php
									}
									?>		
									<p style="margin:0px;"><span style="font-size:20px;opacity:0.2;h" style="text-success">&#10004;</span>
									<span style="font-size:12px;">The top Level withdraw only. ( Ex. If you reached Level 1 and you have 25 Credits so you can withdraw only 20 credits(Level 1) not 25 Credits). <a href="t&c.php"><small>T&C</small></a> Apply.</span></p>									
									<?php
									if($amount>=20)
									{
										echo'<b class="btn btn-primary" id="withdraw">Withdraw Money</b>';
									}
									else
									{
										echo '<button class="btn btn-primary" disabled>Withdraw Money</button>';
									}
									?>
								</div>
								
                            </div>
                        </div>
                    </div>
                </div>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
				<script>
				$("#withdraw").click(function(){
					$.post(
					"https://freecoder.in/user/custom/checkout.php",
					{"id":"<?php echo $id;?>"},
					function(data)
						{
							//							if(data=='yes')
							//{
							///	location.reload(true);
							//}
							if(data==1)
							{
								$("#withdraw").removeClass("btn-primary");
								$("#withdraw").addClass("btn-danger");
								$("#withdraw").text("Sorry! Insufficient Balance");
							}
							if(data==0)
							{
								$("#withdraw").removeClass("btn-primary");
								$("#withdraw").addClass("btn-warning");
								$("#withdraw").text("Please Wait! You have already requested");
							}
							if(data==2)
							{
								$("#withdraw").removeClass("btn-primary");
								$("#withdraw").addClass("btn-success");
								$("#withdraw").text("Request Submitted");
							}
						}
					);
				});
				</script>
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
    echo '<script>window.location.href="index.html";</script>';
}
 ?>
