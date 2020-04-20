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
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="/img/favicon.png">

        <title>Edit Codes - FreeCoder</title>

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


    <body>
<?php include('header.php');?>

            <div class="wraper container-fluid">
                <div class="page-title">
                    <h3 class="title">Edit Data</h3>
                </div>
				<?php
				if(isset($_GET['id'])){
				$id=$_GET['id'];
				$sql="select * from uploads where id='$id'";
                $result=$conn->query($sql);
				while($row=$result->fetch_assoc())
				{
				?>
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading"><h3 class="panel-title"><?php echo $row['title'];?></h3></div>
								<div class="panel-body">
									<form class="form-horizontal p-20" role="form" id="update" action="data_update.php" method="post">
										<div class="alert alert-success"id="message">Record Updated Successfully!</div>
										<input type="hidden" name="id"value="<?php echo $row['id'];?>">
										<input type="hidden" name="data"value="1">
										<div class="form-group">
											<label class="col-md-2 control-label">Title</label>
											<div class="col-md-10">
												<input type="text" name="title" class="form-control" value="<?php echo $row['title'];?>">
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-2 control-label">Description</label>
											<div class="col-md-10">
												<textarea class="form-control" name="paragraph1" rows="5"><?php echo $row['paragraph1'];?></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">File Name</label>
											<div class="col-md-10">
												<input type="text" class="form-control" readonly="" value="<?php echo $row['data_file'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Data Instractions</label>
											<div class="col-md-10">
												<textarea class="form-control" name="paragraph2" rows="8"><?php echo $row['paragraph2'];?></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">SEO Keywords</label>
											<div class="col-md-10">
												<textarea class="form-control" name="tag" rows="2"><?php echo $row['tag'];?></textarea>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label">Start Date</label>
											<div class="col-sm-10">
											  <p class="form-control-static"><?php echo  date("j M, Y", strtotime($row['posted']));?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label"></label>
											<div class="col-sm-10">
											  <b class="btn btn-primary" id="submit">Update</b>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php
				}}
				if(isset($_GET['cat_id'])){
				$id=$_GET['cat_id'];
				$sql="select * from category where id='$id'";
                $result=$conn->query($sql);
				while($row=$result->fetch_assoc()){
				?>
				<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading"><h3 class="panel-title"><?php echo $row['name'];?></h3></div>
								<div class="panel-body">
									<form class="form-horizontal p-20" role="form" id="update_cat" action="data_update.php" method="post">
										<div class="alert alert-success"id="message">Record Updated Successfully!</div>
										<input type="hidden" name="id"value="<?php echo $row['id'];?>">
										<input type="hidden" name="cat"value="1">
										<div class="form-group">
											<label class="col-md-2 control-label">Name</label>
											<div class="col-md-10">
												<input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>">
											</div>
										</div>										<div class="form-group">
											<label class="col-md-2 control-label">Title</label>
											<div class="col-md-10">
												<input type="text" name="title" class="form-control" value="<?php echo $row['title'];?>">
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-2 control-label">Description</label>
											<div class="col-md-10">
												<textarea class="form-control" name="description" rows="5"><?php echo $row['description'];?></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">SEO Keywords</label>
											<div class="col-md-10">
												<textarea class="form-control" name="tag" rows="2"><?php echo $row['keyword'];?></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label"></label>
											<div class="col-sm-10">
											  <b id="submit_cat" class="btn btn-primary">Update</b>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php
				}
				}?>
            <?php include('footer.php');?>
            <!-- Footer Ends -->



        </section>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>


        <script src="js/jquery.app.js"></script>
		<script>
			$("#message").hide();
			$("#submit").click(function(){
				$("#submit").text("Updating...");
				$.post(
					$("#update").attr("action"),
					$("#update :input").serializeArray(),
					function(data){
						if(data=='yes'){
							$("#message").show();
							$("#submit").addClass("btn btn-success");
							$("#submit").text("Updated");
						}
						else{
							$("#message").text("Sorry! Something went wrong");
							$("#message").addClass("alert alert-danger");
							$("#message").show();
							$("#submit").addClass("btn btn-danger");
							$("#submit").text("ERROR");
							alert(data);
						}
					}
				);
			});
		</script>
		<script>
			$("#message").hide();
			$("#submit_cat").click(function(){
				$("#submit_cat").text("Updating...");
				$.post(
					$("#update_cat").attr("action"),
					$("#update_cat :input").serializeArray(),
					function(data){
						if(data=='yes'){
							$("#message").show();
							$("#submit_cat").addClass("btn btn-success");
							$("#submit_cat").text("Updated");
						}
						else{
							$("#message").text("Sorry! Something went wrong");
							$("#message").addClass("alert alert-danger");
							$("#message").show();
							$("#submit_cat").addClass("btn btn-danger");
							$("#submit_cat").text("ERROR");
							alert(data);
						}
					}
				);
			});
		</script>
    </body>

</html>
<?php } else echo '<script>window.location.href="index.php";</script>';?>
