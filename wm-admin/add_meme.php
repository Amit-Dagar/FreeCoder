<?php 
session_start();
require_once('../api/config.php');
$i=0;
if(isset($_SESSION['webmaster'])){
	if(isset($_POST['submit'])){
	$meme = time() . '.' . pathinfo($_FILES['meme']['name'], PATHINFO_EXTENSION);
	$uploads_dir = 'meme/';
	if(file_exists($uploads_dir))
	{

	}
	else
		mkdir('meme/');

	$tmp_name = $_FILES["meme"]["tmp_name"];
	if(move_uploaded_file($tmp_name, $uploads_dir.$meme))
	{

		$sql="INSERT INTO meme(meme,post_date) VALUES('$meme',now())";
		if($conn->query($sql)===true)
		{

			$i=1;
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title>Add New Meme - FreeCoder</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="assets/material-design-iconic-font/css/material-design-iconic-font.min.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">

    </head>


    <body><?php include('header.php');?>
            <div class="wraper container-fluid">
                <div class="page-title"> 
                    <h3 class="title">Meme</h3> 
                </div>
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading"><h3 class="panel-title">New Meme</h3></div>
									<div class="panel-body">
										<form class="form-horizontal p-20" role="form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>"> <?php if($i==1){?>
										<div id="message" class="alert alert-success">Record Uploaded!</div><?php } ?>
											<div class="form-group">
												<label class="col-md-2 control-label">Name</label>
												<div class="col-md-10">
													<input type="file" name="meme" class="form-control" required="">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label"></label>
												<div class="col-sm-10">
													<button id="submit" name="submit" class="btn btn-primary">Submit</button>
												</div>
											</div> 		
										</div>								
										</form>
									</div> 
								</div> 
							</div> 
						</div>
            </div>
            <footer class="footer">
                2016 © FreeCoder.
            </footer>
        </section>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>


        <script src="js/jquery.app.js"></script>
    </body>
</html>
<?php } else echo '<script>window.location.href="login.php";</script>'; ?>