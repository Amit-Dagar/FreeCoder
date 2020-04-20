<?php
session_start();
require_once('../api/config.php');
if(isset($_SESSION['webmaster'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="/img/favicon.png">

        <title>View Data - Freecoder</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="assets/material-design-iconic-font/css/material-design-iconic-font.min.css" rel="stylesheet" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/morris/morris.css">

        <!-- sweet alerts -->
        <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">

    </head>


    <body>
	<?php include('header.php');?>
  <?php
  if(isset($_GET['data_id']))
  {
    $id=$_GET['data_id'];
    $sql="SELECT * FROM articles WHERE id=$id";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {
  ?>
            <div class="wraper container-fluid">
                <div class="page-title">
                    <h3 class="title">View Data !</h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $row['title'];?></h3>
                            </div>
                            <div class="panel-body">
                              <label>Title</label>
                              <p><?php echo $row['title'];?></p><br>

                              <label>Category</label>
                              <p><?php echo $row['category1'];?></p><br>
                              <label>Article Body :</label>
                                <p><?php echo $row['article_body'];?></p><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      <?php
      }
    }
      ?>
      <?php
      if(isset($_GET['req_id']))
      {
        $id=$_GET['req_id'];
        $sql="SELECT * FROM requirements WHERE id=$id";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc())
        {
      ?>
                <div class="wraper container-fluid">
                    <div class="page-title">
                        <h3 class="title">View Requirements !</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $row['email'];?></h3>
                                </div>
                                <div class="panel-body">
                                  <label>Problem :</label>
                                    <p><?php echo $row['message'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          <?php
          }
        }
          ?>
            <!-- Page Content Ends -->
            <!-- ================== -->

            <!-- Footer Start -->
            <?php include('footer.php');?>
            <!-- Footer Ends -->



        </section>
        <!-- Main Content Ends -->



        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

        <!-- Counter-up -->
        <script src="js/waypoints.min.js" type="text/javascript"></script>
        <script src="js/jquery.counterup.min.js" type="text/javascript"></script>

         <!-- sparkline -->
        <script src="assets/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/sparkline-chart/chart-sparkline.js" type="text/javascript"></script>

        <!-- skycons -->
        <script src="js/skycons.min.js" type="text/javascript"></script>

        <!--Morris Chart-->
        <script src="assets/morris/morris.min.js"></script>
        <script src="assets/morris/raphael.min.js"></script>


        <script src="js/jquery.app.js"></script>

        <!-- Dashboard -->
        <script src="js/jquery.dashboard.js"></script>
    </body>
</html>
<?php }else{ echo '<script>window.location.href="index.php";</script>'; }?>
