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

        <title>All Codes - FreeCoder</title>

        <!-- DataTables -->
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
                    <h3 class="title">Datatable</h3>
                </div>
						<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Records</h3>
                                    </div>
                                    <div class="panel-body">

                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Project Name</th>
                                                    <th>Start Date</th>
                                                    <th>Status</th>
                                                    <th>Assign</th>
													<th class="text-center">Edit</th>
													<th class="text-center">Delete</th>
                                                </tr>
                                            </thead>


                                            <tbody>
											<?php
											$sql="select * from uploads order by id DESC";
											$result=$conn->query($sql);
											if($result->num_rows>0)
											{
												while($row=$result->fetch_assoc())
												{ echo'
													<tr>
														<td id="id">'.$row['id'].'</td>
														<td>'.$row['title'].'</td>
														<td>'.date("j M, Y", strtotime($row['posted'])).'</td>
														<td><span class="label label-info">Active</span></td>
														<td>FreeCoder</td>
														<td class="text-center"><a href="edit.php?id='.$row['id'].'"><i class="fa fa-pencil"></i></a></td>
														<td class="text-center"><a href="delete.php?id='.$row['id'].'"><i class="fa fa-trash"></i></a></td>
													</tr>';
												}
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

<!-- Mirrored from coderthemes.com/velonic_3.0/admin_4/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2018 05:22:30 GMT -->
</html>


<?php
}
else
{
echo '<script>window.location.href="index.php";</script>';
}
?>
