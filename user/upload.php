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
    $join_date=$row['user_create'];
    $designation=$row['designation'];
    $password=$row['password'];
  }
  ?>
    <!DOCTYPE html>
    <html lang="en-Us">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="http://freecoder.in/img/favicon.png">
        <title>Upload Data - Freecoder</title>
        <!-- Bootstrap Core CSS -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- You can change the theme colors from here -->
        <script src="/ckeditor/ckeditor.js"></script>
        <link href="css/colors/blue.css" id="theme" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/api/users_thumbs/<?php echo $picture;?>" height="30" alt="<?php echo $name;?>" class="profile-pic m-r-10" /><?php echo $name;?></a>
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
                                <h3 class="text-themecolor m-b-0 m-t-0">Upload</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                    <li class="breadcrumb-item active">Upload</li>
                                </ol>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Bread crumb and right sidebar toggle -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Start Page Content -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="form-group">

                                        </div>
                                        <form class="form-horizontal form-material" method="post" id="data" enctype="multipart/form-data">
                                            <div class="article_alert"></div>
                                            <div class="form-group">
                                                <label class="col-md-12">Title</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="title" value="" placeholder="Article Title" class="form-control form-control-line" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label class="col-sm-12">Category 1</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control form-control-line" name="category1" id='category1' required="">
                                                            <option value="">Select category</option>
                                                            <?php
                                              $sql="select * from category";
                                              $result=$conn->query($sql);
                                              while ($row=$result->fetch_assoc()) {
                                                echo '<option>'.$row['name'].'</option>';
                                              }
                                               ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-sm-12">Category 2</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control form-control-line" name="category2">
                                                            <option value="">Select category</option>
                                                            <?php
                                              $sql="select * from category";
                                              $result=$conn->query($sql);
                                              while ($row=$result->fetch_assoc()) {
                                                echo '<option>'.$row['name'].'</option>';
                                              }
                                               ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-sm-12">Category 3</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control form-control-line" name="category3">
                                                            <option value="">Select category</option>
                                                            <?php
                                              $sql="select * from category";
                                              $result=$conn->query($sql);
                                              while ($row=$result->fetch_assoc()) {
                                                echo '<option>'.$row['name'].'</option>';
                                              }
                                               ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="col-sm-12">Category 4</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control form-control-line" name="category4">
                                                            <option value="">Select category</option>
                                                            <?php
                                              $sql="select * from category";
                                              $result=$conn->query($sql);
                                              while ($row=$result->fetch_assoc()) {
                                                echo '<option>'.$row['name'].'</option>';
                                              }
                                               ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <textarea name="editor1" id="article_body" required="required"></textarea>

                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button name="submit" id="submit" class="btn btn-default btn-md">Post</button>
                                                </div>
                                            </div>
                                        </form>
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
                    <script>
                        CKEDITOR.replace('editor1');
                    </script>
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

        <script type="text/javascript">
            var i;

        $(function() {
            $('form').on('submit', function(e) {
                for (instance in CKEDITOR.instances) {

                  CKEDITOR.instances['article_body'].updateElement();

                }
                $('#submit').text('Posting...');
                e.preventDefault();
                if($('#article_body').val().trim().length > 0)
                {
                  jQuery.ajax({
                      type: 'POST',
                      url: "/api/user_article_uploader.php",
                      data: new FormData($("#data")[0]),
                      processData: false,
                      contentType: false,
                      success: function(data)
                      {
                         // alert(data);
                          if(data == 1)
                          {
                              $('.article_alert').html('<div class="alert alert-Success">Article posted successfully</div>');
                              $('#submit').text('Posted');
                          }
                          else
                          {
                              $('.article_alert').html('<div class="alert alert-warning">Something went wrong!</div>');
                              $('#submit').text('Post');
                          }
                      }
                  });
                }
                else
                {
                  $('.article_alert').html('<div class="alert alert-danger">Please fill out all fields.</div>');
                  $('#submit').text('Post');
                }
            });
        });
        </script>

    </body>
    </html>
    <?php
}
else{
  echo '<script>window.location.href="/index.html";</script>';
}
 ?>