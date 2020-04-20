<?php
session_start();
require_once('../api/config.php');
$i=0;
if(isset($_SESSION['webmaster'])){
	if(isset($_POST['query'])){
		$sql=$_POST['query'];
		if($conn->query($sql)===true)
		{
			$i=1;
		}
		else
		{
			$i=2;
		}
}
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/velonic_3.0/admin_4/form-codeeditor.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2018 05:21:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="https://freecoder.in/img/favicon.png">

        <title>Query Processor - Freecoder Admin</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="assets/material-design-iconic-font/css/material-design-iconic-font.min.css" rel="stylesheet" />

        <!--Plugin Css-->
        <link rel="stylesheet" href="assets/codemirror/codemirror.css" />
        <link rel="stylesheet" href="assets/codemirror/ambiance.css">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->


    </head>


    <body>
<?php include('header.php');?>
            <div class="wraper container-fluid">
                <div class="page-title"> 
                    <h3 class="title">Insert/Update/Delete Command Processor</h3> 
                </div>

                
                <div class="row">
                
                    <div class="col-sm-12">
                        <div class="panel panel-default">
						<?php if($i==1)
						{?>
					    <div class="panel-heading">
                                <h6 class="panel-title  alert alert-success">Query Processed</h6>
                        </div>  
						<?php }
						if($i==2)
						{?>
					    <div class="panel-heading">
                                <h6 class="panel-title  alert alert-danger">Invalid Query</h6>
                        </div>  
						<?php }?>
                            <div class="panel-heading">
                                <h3 class="panel-title">Query Processor</h3>
                            </div>
							<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <div class="panel-body p-0">
									<textarea id="code" name="query"></textarea>   
                                </div>
                        </div>
						<button name="submit" id="submit" type="submit" class="btn btn-primary">RUN</submit>
							</form>
                    </div>
                    
                    

                </div> <!-- End row -->



            </div>
<?php include('footer.php');?>
        </section>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

    <!--codemirror-->
    <script src="assets/codemirror/codemirror.js"></script>
    <script src="assets/codemirror/formatting.js"></script>
    <script src="assets/codemirror/xml.js"></script>
    <script src="assets/codemirror/javascript.js"></script>
    <script src="assets/codemirror/custom.codemirror.js"></script>




    <script src="js/jquery.app.js"></script>




  </body>
</html>

<?php } else echo '<script>window.location.href="login.php";</script>'; ?>
