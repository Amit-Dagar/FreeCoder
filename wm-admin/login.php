<?php
session_start();
require_once('../api/config.php');
if(isset($_SESSION['webmaster'])){
	echo '<script>window.location.href="index.php";</script>';
}else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="/img/favicon.png">

        <title>Login - FreeCoder</title>

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

        <div class="wrapper-page">
            <div class="panel panel-color panel-inverse">
                <div class="panel-heading">
                   <h3 class="text-center m-t-10"> Sign In to <strong>FreeCoder</strong> </h3>
                </div>

                <div class="panel-body">
                    <form id="login" class="form-horizontal m-t-10 p-20 p-b-0" action="signin.php" method="post">
                        <div id="message" class="alert alert-danger">Sorry! Invalid Credentials | Try Again</div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" name="email" placeholder="email">
                            </div>
                        </div>
                        <div class="form-group ">

                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <div class="col-xs-12">
                                <b id="submit" class="btn btn-success w-md" type="submit">Log In</b>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>




        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>


        <!--common script for all pages-->
        <script src="js/jquery.app.js"></script>
<script>
$("#message").hide();
$("#submit").click(function(){
var email=$("#email").val();
var req=$("#password").val();
if(email!='' && req!=''){
$.post(
$("#login").attr("action"),
$("#login :input").serializeArray(),
function( data ) {
	if(data=='yes'){
window.location.href="index.php";
	}else{
		alert(data);
		$("#message").show();
	}
}
);
}
});
</script>

    </body>
</html>
<?php } ?>
