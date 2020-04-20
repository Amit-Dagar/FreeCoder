<?php
require_once('../api/config.php');
$ip=$_SERVER['REMOTE_ADDR'];
$sql="SELECT ip FROM counter WHERE ip='$ip'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
}
else {
  $sql="INSERT INTO counter(ip,posted) VALUES('$ip',now())";
  if($conn->query($sql)===true)
  {

  }
}
?>
        <aside class="left-panel">

            <!-- brand -->
            <div class="logo">
                <a href="index.php" class="logo-expanded">
                    <i class="ion-code"></i>
                    <span class="nav-label">FreeCoder</span>
                </a>
            </div>
            <!-- / brand -->

            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">
                    <li><a href="index.php"><i class="zmdi zmdi-view-dashboard"></i> <span class="nav-label">Dashboard</span></a></li>
                    <li>
                        <a href="/controller.php"><i class="zmdi zmdi-collection-plus"></i> <span class="nav-label">New Code</span></a>
                    </li>
					<li><a href="users.php"><i class="zmdi zmdi-assignment-account"></i> <span class="nav-label">Users</span></a></li>
					<li><a href="data.php"><i class="zmdi zmdi-layers"></i> <span class="nav-label">Users Data</span></a></li>
                    <li><a href="review.php"><i class="zmdi zmdi-eye"></i> <span class="nav-label">Review Data</span></a></li>
                    <li class="has-submenu">
                        <a href="#"><i class="zmdi zmdi-labels"></i> <span class="nav-label">Category</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="category.php">All Category</a></li>
							<li><a href="add_cat.php">New Category</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="zmdi zmdi-image"></i> <span class="nav-label">Meme's</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="meme.php">All Meme's</a></li>
                            <li><a href="add_meme.php">New Meme</a></li>
                        </ul>
                    </li>
					<li><a href="check_req.php"><i class="zmdi zmdi-money"></i> <span class="nav-label">Checkouts</span></a></li>
					<li><a href="query.php"><i class="zmdi zmdi-code"></i> <span class="nav-label">Query Processor</span></a></li>
					<li><a href="requirement.php"><i class="zmdi zmdi-flash"></i> <span class="nav-label">Requirements</span></a></li>
				</ul>
            </nav>

        </aside>
        <!-- Aside Ends-->


        <!--Main Content Start -->
        <section class="content">

            <!-- Header -->
            <header class="top-head container-fluid">
                <button type="button" class="navbar-toggle pull-left">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Search -->
                <!-- <form role="search" class="navbar-left app-search pull-left hidden-xs">
                  <input type="text" placeholder="Search..." class="form-control">
                  <a href="#"><i class="fa fa-search"></i></a>
                </form> -->

                <!-- Left navbar -->
                <nav class=" navbar-default" role="navigation">
                    <ul class="nav navbar-nav navbar-right top-menu top-right-menu">
                        <!-- /Notification -->

                        <!-- user login dropdown start-->
                        <li class="dropdown text-center">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="img/avatar-2.jpg" class="img-circle profile-img thumb-sm">
                                <span class="username">Admin</span> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                                <!-- <li><a href="profile.html"><i class="fa fa-briefcase"></i>Profile</a></li>
                                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                                <li><a href="#"><i class="fa fa-bell"></i> Friends <span class="label label-info pull-right mail-info">5</span></a></li> -->
                                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!-- End right navbar -->
                </nav>

            </header>
