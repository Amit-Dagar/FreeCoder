<?php

session_start();

if(isset($_SESSION['webmaster'])){

require_once('../api/config.php');

?>



<!DOCTYPE html>

<html lang="en">



<head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="">

        <meta name="author" content="">



        <link rel="shortcut icon" href="/img/favicon.png">



        <title>Review Data - Freecoder</title>



        <!-- DataTables -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />



        <!-- Bootstrap core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-reset.css" rel="stylesheet">



        <!--Animation css-->

        <link href="css/animate.css" rel="stylesheet">



        <!--Icon-fonts css-->

        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

        <link href="assets/material-design-iconic-font/css/material-design-iconic-font.min.css" rel="stylesheet" />



        <!-- DataTables -->

        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />



        <!-- Custom styles for this template -->

        <link href="css/style.css" rel="stylesheet">

        <link href="css/helper.css" rel="stylesheet">





        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->

        <!--[if lt IE 9]>

          <script src="js/html5shiv.js"></script>

          <script src="js/respond.min.js"></script>

        <![endif]-->



    </head>





    <body><?php include('header.php');?>

            <div class="wraper container-fluid">

                <div class="page-title">

                    <h3 class="title">Users</h3>

                </div>

						<div class="row">

                            <div class="col-md-12">

                                <div class="panel panel-default">

                                    <div class="panel-heading">

                                        <h3 class="panel-title">All Users</h3>

                                    </div>

                                    <div class="panel-body">



                                        <table id="datatable" class="table table-striped table-bordered">

                                            <thead>

                                                <tr>

                                                    <th>#</th>

                                                    <th>Search_key</th>

                                                    <th>+ve</th>
                                                    
                                                    <th>-ve</th>

                                                    <th>View</th>

                                                    <th>Edit</th>

                                                </tr>

                                            </thead>

                                            <tbody>
                                                <?php
                                                $i=1;
                                                $sql="SELECT search_key,id FROM articles where article_status=1";
                                                $result=$conn->query($sql);
                                                while ($row=$result->fetch_assoc()) {
                                                    $search_key=$row['search_key'];
                                                    $id=$row['id'];
                                                    echo '<tr><td>'.$i.'</td>';
                                                    echo '<td>'.substr($row['search_key'],0,40).'</td>';
                                                    $sql="SELECT review FROM review WHERE search_key='$search_key' AND review=1";
                                                    $review=$conn->query($sql);
                                                    echo '<td>'.$review->num_rows.'</td>';
                                                    $sql="SELECT review FROM review WHERE search_key='$search_key' AND review=2";
                                                    $review=$conn->query($sql);  
                                                    echo '<td>'.$review->num_rows.'</td>';

                                                    echo '<td><a href="view_data.php?data_id='.$id.'"><b class="label label-success">view</b></a></td>';
                                                    echo '<td><a href="edit_data.php?data_id='.$id.'"><b class="label label-warning">edit</b></a></td></tr>';                                                  
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>

                                        </table>

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



        <!-- Datatables-->

        <script src="assets/datatables/jquery.dataTables.min.js"></script>

        <script src="assets/datatables/dataTables.bootstrap.js"></script>

        <script src="assets/datatables/dataTables.buttons.min.js"></script>

        <script src="assets/datatables/buttons.bootstrap.min.js"></script>

        <script src="assets/datatables/jszip.min.js"></script>

        <script src="assets/datatables/pdfmake.min.js"></script>

        <script src="assets/datatables/vfs_fonts.js"></script>

        <script src="assets/datatables/buttons.html5.min.js"></script>

        <script src="assets/datatables/buttons.print.min.js"></script>

        <script src="assets/datatables/dataTables.fixedHeader.min.js"></script>

        <script src="assets/datatables/dataTables.keyTable.min.js"></script>

        <script src="assets/datatables/dataTables.responsive.min.js"></script>

        <script src="assets/datatables/responsive.bootstrap.min.js"></script>

        <script src="assets/datatables/dataTables.scroller.min.js"></script>



        <!-- Datatable init js -->

        <script src="js/datatables.init.js"></script>





        <script type="text/javascript">

            $(document).ready(function() {

                $('#datatable').dataTable();

                $('#datatable-keytable').DataTable( { keys: true } );

                $('#datatable-responsive').DataTable();

                $('#datatable-scroller').DataTable( { ajax: "assets/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );

                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );

            } );

            TableManageButtons.init();

        </script>



    </body>


</html>





<?php

}

else

{

echo '<script>window.location.href="index.php";</script>';

}

?>
