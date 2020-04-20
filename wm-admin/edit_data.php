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
        <script src="/ckeditor/ckeditor.js"></script>
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        <style type="text/css">
        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
    </style>            
        </style>
    </head>


    <body>
	<?php include('header.php');?>
            <div class="wraper container-fluid">
                <div class="page-title">
                    <h3 class="title">View Data !</h3>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-10 col-md-offset-1">
                        <form enctype="multipart/form-data" method="post" id="data">
                            <h2>Freecoder Controller <small>It's only for Administrative use.</small></h2>
                            <hr class="colorgraph">
                            <div class="article_alert"></div>
                            <?php 
                            $id=$_GET['data_id'];
                            $sql="SELECT * FROM articles where id=$id";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                            ?>
                            <input type="hidden" name="id" value="<?php echo $_GET['data_id'];?>">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="search_key" class="form-control" value="<?php echo $row['search_key'];?>" name="search_key" placeholder="Enter Searh Key" required="required">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="title" class="form-control" value="<?php echo $row['title'];?>" name="title" placeholder="Title" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <select class="form-control category"  name="category1" id='category1' required="">
                                                <option value="<?php echo $row['category1'];?>"><?php echo $row['category1'];?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <select class="form-control category" name="category2" >
                                                <option value="<?php echo $row['category2'];?>"><?php echo $row['category2'];?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <select class="form-control category" name="category3">
                                                <option value="<?php echo $row['category3'];?>"><?php echo $row['category3'];?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <div class="form-group">
                                           <select class="form-control category" name="category4">
                                               <option value="<?php echo $row['category4'];?>"><?php echo $row['category4'];?></option>
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" required="required"><?php echo $row['meta_description'];?></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Meta Keywords" required="required"><?php echo $row['meta_keyword'];?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file-upload" class="custom-file-upload"  style="border-radius: 1.5rem">Cover Image
                                    </label>
                                    <input id="file-upload" name='article_cover' type="file" style="display:none;">
                                </div>
                                <div class="form-group">
                                    <textarea name="editor1" id="article_body" required="required"><?php echo $row['article_body'];?></textarea>
                                </div>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-md-3"><span class="btn btn-primary btn-sm" id="submit">Post</span></div>
                                </div>
                            <?php
                            }
                        ?>
                        </form>
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

    <script>
        CKEDITOR.replace('editor1');
    </script>

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Dashboard -->
        <script src="js/jquery.dashboard.js"></script>
        <script type="text/javascript">
        $('#file-upload').change(function() {
            var i = $(this).prev('label').clone();
            var file = $('#file-upload')[0].files[0].name;
            $(this).prev('label').text(file);
        });
    </script>
    <script type="text/javascript">
        var i;
        $.ajax( {
            url: '/api/articles.php?menu=0',
            type: 'POST',
            dataType: 'json',
            //  data : 'uname='+uname+'&pass='+pass,
            success: function (data) {
                for(i=0;i<data.length;i++)
                {
                    $('.category').append('<option value="'+data[i].name+'">'+data[i].name+'</option>');                    
                }
            }
        });
        $("#submit").click(function(e) {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances['article_body'].updateElement();
            }
            var title = $('#title').val();
            var search_key = $('#search_key').val();
            var meta_description = $('#meta_description').val();
            var meta_keyword = $('#meta_keyword').val();
            var category = $('#category1').val();
            if(title!='' && search_key!='' && meta_description!='' && meta_keyword!='' && $('#article_body').val().trim().length > 0 && category!='')
            {
                $("#submit").text('Posting...');
                jQuery.ajax({
                    type: 'POST',
                    url: "/api/article_uploader.php",
                    data: new FormData($("#data")[0]),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if(data==1)
                        {
                            $('.article_alert').html('<div class="alert alert-success">Article posted successfully.</div>');
                            $("#submit").text('Posted');
                        }
                        else
                        {
                            alert(data);
                            $('.article_alert').html('<div class="alert alert-danger">'+data+'</div>');
                            $("#submit").text('Post');
                        }
                    }
                });
            }
        });
    </script>
    </body>
</html>
<?php }else{ echo '<script>window.location.href="index.php";</script>'; }?>
