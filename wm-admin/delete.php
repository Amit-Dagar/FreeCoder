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

        <title>Delete Data - FreeCoder</title>

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
                    <h3 class="title">Data Edit</h3>
                </div>
				<?php
				if(isset($_GET['id'])){
				$id=$_GET['id'];
				$sql="select * from uploads where id='$id'";
				$result=$conn->query($sql);
				if($result->num_rows>0)
				{
					while($row=$result->fetch_assoc())
					{

				?>
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading"><h3 class="panel-title"><?php echo $row['title'];?></h3></div>
									<div class="panel-body">
										<form id="update" class="form-horizontal p-20" role="form" method="post" action="data_delete.php">
											<div id="message" class="alert alert-danger">Sorry! Something went wrong!</div>
											<input type="hidden" name="data"value="1">
											<input type="hidden" name="id" value="<?php echo $row['id'];?>">
											<div class="text-center">Do You want to Delete <b class="text-danger">"<?php echo $row['title'];?>"</b></div><br>
											<div class="form-group">
												<div class="text-center">
													<b id="submit" class="btn btn-danger"><i class="zmdi zmdi-close"></i>&nbsp;Delete</b>
													<b id="retrive" class="btn btn-success"><i class="zmdi zmdi-shield-check"></i>&nbsp;Cancel</b>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

				<?php }
				}
				}
				if(isset($_GET['cat_id'])){
				$id=$_GET['cat_id'];
				$sql="select * from category where id='$id'";
				$result=$conn->query($sql);
				if($result->num_rows>0)
				{
					while($row=$result->fetch_assoc())
					{

				?>
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading"><h3 class="panel-title"><?php echo $row['name'];?></h3></div>
									<div class="panel-body">
										<form id="update_cat" class="form-horizontal p-20" role="form" method="post" action="data_delete.php">
											<div id="message" class="alert alert-danger">Sorry! Something went wrong!</div>
											<input type="hidden" name="id" value="<?php echo $row['id'];?>">
											<input type="hidden" name="cat"value="1">
											<div class="text-center">Do You want to Delete <b class="text-danger">"<?php echo $row['name'];?>"</b></div><br>
											<div class="form-group">
												<div class="text-center">
													<b id="submit_cat" class="btn btn-danger"><i class="zmdi zmdi-close"></i>&nbsp;Delete</b>
													<b id="retrive_cat" class="btn btn-success"><i class="zmdi zmdi-shield-check"></i>&nbsp;Cancel</b>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

				<?php }
				}
				}
				?>
            </div>
            <?php include('footer.php');?>
        </section>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>


        <script src="js/jquery.app.js"></script>
		<script>
			$(document).ready(function(){
				$("#message").hide();
			});
			$("#submit").click(function(){
				$.post(
					$("#update").attr("action"),
					$("#update :input").serializeArray(),
					function( data ) {
						if(data=='yes'){
							window.location.href="index.php";
						}else{
							$("#message").show();
							alert(data);
						}
					}
				);
			});
			$("#retrive").click(function(){
				window.location.href="index.php";
			});
		</script>

		<script>
			$(document).ready(function(){
				$("#message").hide();
			});
			$("#submit_cat").click(function(){
				$.post(
					$("#update_cat").attr("action"),
					$("#update_cat :input").serializeArray(),
					function( data ) {
						if(data=='yes'){
							window.location.href="category.php";
						}else{
							$("#message").show();
							alert(data);
						}
					}
				);
			});
			$("#retrive_cat").click(function(){
				window.location.href="category.php";
			});
		</script>

    </body>
</html>
<?php } ?>
