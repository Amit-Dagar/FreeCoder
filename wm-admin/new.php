<?php
session_start();
require_once('../api/config.php');
$i=0;
if(isset($_SESSION['webmaster'])){
	if(isset($_POST['submit'])){
	if(!file_exists($_POST['category']))
	{
		mkdir('uploads/');
	}
	$my_file ='uploads/'.$_POST['title'].'.php';
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = '
	<!DOCTYPE html>
<html lang="en-US">
   <head>
      <title>'.$_POST['seotitle'].'</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="Keywords" content="'.$_POST['seokeyword'].', freecoder, free coder">
      <meta name="Description" content="'.$_POST['seodescription'].'">
      <meta property="og:url" content="http://freecoder.in/apis/index.php" />
      <meta property="og:type" content="Article" />
      <meta property="og:title" content="Quick APIs Codes - Freecoder | API | Rest API |Api Tutorial | Api Technologies | Ajax Cleaner" />
      <meta property="og:description" content="We provide codes about Api, sms api, sms api free, twilio, twilio  sms api, twilio sms, sms message, twilio sms pricing, twilio sms gateway, twilio sms status, twilio sms service, twilio api, twilio stock, twilio python, freecoder, free coder python api tutorial" />
      <meta property="og:image" content="http://freecoder.in/img/favicon.png" />
      <style>
         #twilio_sms_api{background-color:#4CAF50;}
      </style>
      <?php include("header.php");?>
      <div class="w3-main" id="belowtopnav" style="margin-left:220px;">
      <div class="w3-row w3-white">
         <div class="w3-col l10 m12" id="main" >
            <h1 itemscope itemtype="http://schema.org/name">Twilio <span class="color_h1">'.$_POST['title'].'</span></h1>
            <div class="w3-clear nextprev">
               <a class="w3-left w3-btn" href="index.php">&#10094; Previous</a>
               <a class="w3-right w3-btn" href="#">Next &#10095;</a>
            </div>
            <div class="w3-panel w3-info intro" itemscope itemtype="http://schema.org/description">
               '.$_POST['description'].'
            </div>
            <hr>
			<div class="w3-panel w3-note">
			'.$_POST['instruction'].'
			</div>
			<div class="w3-panel w3-note">
				<p><code class="w3-codespan">/vendor/autoload.php && Twilio\Rest\Client</code> download files.<br>
				<a href="/downloads/twilio_sms_api.zip" download><code class="w3-codespan">click here</code></a>
				</p>
			</div>
            <hr>
            <div class="w3-clear nextprev">
               <a class="w3-left w3-btn" href="index.php">&#10094; Previous</a>
               <a class="w3-right w3-btn" href="#">Next &#10095;</a>
            </div>
         </div>
      </div>
      <?php include("../ajax/footer.php");?>
	';
	if(fwrite($handle, $data))
	{
		$i=1;
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

        <link rel="shortcut icon" href="/img/favicon.png">

        <title>Add New Data - FreeCoder</title>

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
                    <h3 class="title">New Record</h3>
                </div>
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading"><h3 class="panel-title">New Code</h3></div>
									<div class="panel-body">
										<form id="update" class="form-horizontal p-20" role="form" method="post" enctype="multipart/form-data" action="new.php"> <?php if($i==1){?>
										<div id="message" class="alert alert-success">Record Uploaded!</div><?php } ?>
											<div class="form-group">
												<label class="col-md-2 control-label">Category</label>
												<div class="col-md-10">
													<select name="category" class="form-control">
													<?php
														$sql="Select * from category";
														$result=$conn->query($sql);
														while($row=$result->fetch_assoc())
														{
															echo '<option>'.$row['name'].'</option>';
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Title</label>
												<div class="col-md-10">
													<input type="text" name="title" class="form-control" placeholder="Title	" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Description</label>
												<div class="col-md-10">
													<textarea class="form-control" placeholder="Description" name="description" rows="5" required></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">File Name</label>
												<div class="col-md-10">
													<input type="text" name="data_file" class="form-control" placeholder="Enter File Name">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Data Instraction</label>
												<div class="col-md-10">
													<textarea class="form-control" placeholder="About Data Instraction" name="instruction" rows="10"required></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">SEO Title</label>
												<div class="col-md-10">
													<textarea class="form-control" placeholder="KeyWords" name="seotitle" rows="2" required></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">SEO KeyWords</label>
												<div class="col-md-10">
													<textarea class="form-control" placeholder="KeyWords" name="seokeyword" rows="2" required></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">SEO Description</label>
												<div class="col-md-10">
													<textarea class="form-control" placeholder="KeyWords" name="seodescription" rows="2" required></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label"></label>
												<div class="col-sm-10">
													<button id="submit" name="submit" class="btn btn-primary">Create</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
            </div>
            <?php include('footer.php');?>
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
