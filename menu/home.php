<?php include('../server.php'); ?>

<?php   
    if(!isset($_SESSION['username'])) {
    header('location: ../index.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="20;url= ../menu/home.php">

    <title>TRICY-RATE REPORTS</title>
    

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body style="background-color: #C0C0C0;">
<div>

        <div  style="min-height: 500px;background-color:#C0C0C0">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="color: green;" align="center" class="page-header">TRICY-RATE REPORTS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div  >
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="glyphicon glyphicon-list-alt fa-3x"></i>
                                                
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                
                                                 <?php 
                                                $query = "SELECT * FROM reports WHERE status_report = 1 AND verification = ''";
                                                $result = mysqli_query($db,$query);
                                                $row = mysqli_num_rows($result);
                                                $total = $row;
                                                 ?> 
                                                <div class="huge"><?php echo $total; ?></div>
                                                <div style="font-size: 30px;">PENDING REPORTS</div>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="post">
                                    <a><button style="width: 100%;" name="view_pending">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </button></a>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="glyphicon glyphicon-file fa-3x"></i>
                                            </div>
                                           <div class="col-xs-9 text-right">
                                                
                                                <?php 
                                                $query = "SELECT * FROM reports WHERE verification = 'UNVERIFY'";
                                                $result = mysqli_query($db,$query);
                                                $row = mysqli_num_rows($result);
                                                $total = $row;
                                                 ?> 
                                                <div class="huge"><?php echo $total; ?></div>
                                                <div style="font-size: 30px;">UNVERIFIED REPORTS</div>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="post">
                                    <a><button style="width: 100%;" name="unverify_view">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </button></a>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="glyphicon glyphicon-check fa-3x"></i>
                                            </div>

                                            <div class="col-xs-9 text-right">
                                                <?php 
                                                $query = "SELECT * FROM reports WHERE verification = 'VERIFIED'";
                                                $result = mysqli_query($db,$query);
                                                $row = mysqli_num_rows($result);
                                                $total = $row;
                                                 ?> 
                                                <div class="huge"><?php echo $total; ?></div>
                                                <div style="font-size: 30px;">VERIFIED REPORTS</div>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="post">
                                    <a><button style="width: 100%;" name="verified_view">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </button></a>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-users fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <?php 
                                                $query = "SELECT * FROM users WHERE id_number != 0";
                                                $result = mysqli_query($db,$query);
                                                $row = mysqli_num_rows($result);
                                                $total = $row;
                                                 ?>
                                                <div class="huge"><?php echo $total; ?></div>
                                                <div style="font-size: 30px">LIST OF DRIVERS</div>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="post">
                                    <a><button style="width: 100%;" name="list_drivers">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </button></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>


        </div>
        <!-- /#page-wrapper -->
    </nav>

    </div>
    <div align="center" id="footer" style=""><h3>Copyright © 2019 OMG. All rights reserved.</h3></div>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <!-- <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script> -->
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    
</body>

</html>
