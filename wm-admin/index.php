<?php
session_start();
require_once('../api/config.php');
if(isset($_SESSION['webmaster'])){
	class data{
		//Code Data
		function pending_code(){
			$sql="select * from articles where article_status=2";
			$result=$GLOBALS['conn']->query($sql);
			return $result->num_rows;
		}
		function total_code(){
			$sql="select * from articles";
			$result=$GLOBALS['conn']->query($sql);
			return $result->num_rows;
		}
		//User DATA
		function user(){
		$sql="select * from users";
		$result=$GLOBALS['conn']->query($sql);
		return $result->num_rows;
		}
		//Visitor DATA
		function visit(){
			$sql="select * from counter";
			$result=$GLOBALS['conn']->query($sql);
			return $result->num_rows;
		}
		//###Requirements DATA
		function pending_req(){
			$sql="select * from requirements where action='pending'";
			$result=$GLOBALS['conn']->query($sql);
			return $result->num_rows;
		}
		function total_req(){
			$sql="select * from requirements";
			$result=$GLOBALS['conn']->query($sql);
			return $result->num_rows;
		}
		function cat(){
			$sql="select * from category";
			$result=$GLOBALS['conn']->query($sql);
			return $result->num_rows;
		}
		function review(){
			$sql="select * from review";
			$result=$GLOBALS['conn']->query($sql);
			return $result->num_rows;
		}
		function review_positive(){
			$sql="select * from review where review=1";
			$result=$GLOBALS['conn']->query($sql);
			return $result->num_rows;
		}		
		function checkouts(){
		$sql="select * from checkout where status='p'";
		$result=$GLOBALS['conn']->query($sql);
		return $result->num_rows;
		}
	}
	$obj=new data();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="/img/favicon.png">

        <title>Welcome To FreeCoder</title>

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
            <div class="wraper container-fluid">
                <div class="page-title">
                    <h3 class="title">Welcome !</h3>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="tile-stats white-bg">
                            <div class="col-sm-12">
                                <div class="status">
                                    <a href="data.php">
                                        <h3 class="m-t-15"><span class="counter"><?php echo $obj->pending_code().' / '.$obj->total_code();?></span></h3>
                                        <p>Pending Codes</p>
									</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="tile-stats white-bg">
                            <div class="col-sm-12">
                                <div class="status">
                                    <a href="category.php">
                                        <h3 class="m-t-15"><span class="counter"><?php echo $obj->cat();?></span></h3>
                                        <p>Total Categories</p>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="tile-stats white-bg">
                            <div class="col-sm-12">
                                <div class="status">
                                    <a href="requirement.php">
                                        <h3 class="m-t-15"><span class="counter"><?php echo $obj->pending_req().' / '.$obj->total_req();?></span></h3>
                                        <p>Pending Requirements</p>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="tile-stats white-bg">
                            <div class="col-sm-12">
                                <a href="users.php">
                                    <div class="status">
                                        <h3 class="m-t-15"><span class="counter"><?php echo $obj->user();?></span></h3>
                                        <p>Total Users</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="tile-stats white-bg">
                            <div class="col-sm-12">
                                <a href="review.php">
                                    <div class="status">
                                        <h3 class="m-t-15"><span class="counter">+<?php echo $obj->review_positive().' / '.$obj->review();?></span></h3>
                                        <p>Total Review</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="tile-stats white-bg">
                            <div class="col-sm-12">
                                <a href="users.php">
                                    <div class="status">
                                        <h3 class="m-t-15"><span class="counter"><?php echo $obj->checkouts().' / '.$obj->checkouts();?></span></h3>
                                        <p>Pending Checkouts</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
				</div>

                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Visitor Counter</h3>
                            </div>
                            <div class="panel-body text-center">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <?php
																			$sql="SELECT * FROM count";
																			$result=$conn->query($sql);
																			$precision = 1;
																			while($row=$result->fetch_assoc())
																			{
																				$counts=$row['count(id)'];
																				if ($counts < 900000) {
																				// 0.9k-850k
																				$n_format = number_format($counts / 1000, $precision);
																				$suffix = 'K';
																				}
																			}
																			?>
                                            <b style="position:absolute;margin-left:52px;margin-top:55px"><?php echo $n_format.' '.$suffix;?></b>
                                            <span data-plugin="peity-donut-alt" data-peity='{ "fill": ["#fb6d9d", "#ebeff2"], "innerRadius": 60, "radius": 65 }'>4/7</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Recent Codes</h3>
                            </div>
                            <?php
														$sql="select * from articles order by id DESC LIMIT 5";
														$result=$conn->query($sql);
														if($result->num_rows>0)
														{
														  while($row=$result->fetch_assoc())
														  {
																$uid=$row['user_id'];
																$sql="select * from users where id=$uid";
																$result2=$conn->query($sql);
																while($ur=$result2->fetch_assoc())
																{
																	$name=$ur['fname'].' '.$ur['lname'];
																}
																?>
                                <div class="panel-body">
                                    <blockquote>
                                        <p>
                                            <?php echo $row['title'];?>
                                        </p>
                                        <footer>
                                            <cite title="Source Title"><?php echo $name;?></cite>&nbsp;&nbsp;(<span style="font-size:10px;"><?php echo date("j M, Y", strtotime($row['post_date']));?></span>)</footer>
                                        <a href="view_data.php?data_id=<?php echo $row['id'];?>"><b class="label label-info">View</b></a>
                                        <?php
																	if($row['article_status']==1)
																	{
																		echo '<b class="label label-success">Accepted</b>';
																	}
																	else {
																		echo '<b class="label label-warning">Pending</b>';
																	}
																	 ?>
                                    </blockquote>
                                </div>
                                <?php
															}
														}
														?>
                                    <div class="panel-footer">
                                        <h3 class="panel-title"><a href="data.php">More codes...</a></h3>
                                    </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Recent Requirements</h3>
                            </div>
                            <?php
														$sql="select * from requirements order by id DESC LIMIT 5";
														$result=$conn->query($sql);
														if($result->num_rows>0)
														{
														  while($row=$result->fetch_assoc())
														  {
																?>
                                <div class="panel-body">
                                    <blockquote>
                                        <p>
                                            <?php echo substr($row['message'],0,40);?>
                                        </p>
                                        <footer>
                                            <cite title="Source Title"><?php echo $row['name'];?></cite>&nbsp;&nbsp;(<span style="font-size:10px;"><?php echo date("j M, Y", strtotime($row['posted']));?></span>)</footer>
                                        <a href="view_data.php?req_id=<?php echo $row['id'];?>"><b class="label label-info" style="height:25px!important">View</b></a>
                                        <?php
																	if($row['action']=='Resolved')
																	{
																		echo '<b class="label label-success">Resolved</b>';
																	}
																	else {
																		echo '<b class="label label-warning">Pending</b>';
																	}
																	 ?>
                                    </blockquote>
                                </div>
                                <?php
															}
														}
														?>
                                    <div class="panel-footer">
                                        <h3 class="panel-title"><a href="requirement.php">More Requirements...</a></h3>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
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

                <script src="assets/jquery-knob/jquery.knob.js"></script>

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

                <script src="assets/peity-chart/jquery.peity.min.js"></script>
                <script src="assets/peity-chart/jquery.peity.init.js"></script>

                <script src="js/jquery.app.js"></script>

                <!-- Dashboard -->
                <script src="js/jquery.dashboard.js"></script>
    </body>

    </html>
    <?php }else{ echo '<script>window.location.href="login.php";</script>'; }?>