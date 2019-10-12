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
                    <h1 style="color: green;" align="center" class="page-header">UNVERIFIED REPORTS<br><br><a type="button" href="../menu/home.php" name="home" class="btn btn-primary">BACK TO HOME</a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div  >
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning" id="logs">
                                        <thead>
                                            <tr role="row">
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Comment</th>
                                                <th>Complaint</th>
                                                <th>Complainant</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- <tr  role="row"> -->
                                                <?php 
                                                $query = "SELECT * FROM reports WHERE status_report = '1' AND verification = 'UNVERIFY'";
                                                $result = mysqli_query($db, $query);
                                                while ($row = mysqli_fetch_array($result)) { ?>
                                                    <tr>
                                                        <td><?php echo $row['date_time']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['comment']; ?></td>
                                                        <td><?php echo $row['complaint']; ?></td>
                                                        <td><?php echo $row['complainant']; ?></td>
                                                        <td>
                                                            <input type="button" name="view" value="VIEW" id="<?php echo $row['id']; ?>" class="btn btn-info view_data"/>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <div><img src="../omg2.png" style="width: auto; height: 320px; margin-left: 500px;margin-bottom: 10px;"></div>
                            <div align="center" id="footer" style=""><h3>Copyright © 2019 OMG. All rights reserved.</h3></div>
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

    <div id="view_data_Modal" class="modal fade">
        <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Report Details: </h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     
                </div>
                <div class="modal-body" id="report_details">
                    
                </div>
                <div class="modal-footer">
                    <input type="submit" name="verify" id="verify" class="btn btn-primary" value="VERIFY"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                </div>
             </div>
        </div>
    </div>
    
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
    <script type="text/javascript">$(document).ready( function () {
    $('#logs').DataTable( {
        "order": [[ 0, "asc" ]]
        } );
    } );
    </script>
    <script>
     $(document).ready(function(){
        $('#logs').on('click', '.view_data',function(){
            var report_id = $(this).attr("id");
            $.ajax({
                url:"report_view.php",
                method:"post",
                data:{report_id:report_id},
                success:function(data){
                    $('#report_details').html(data);
                    $('#view_data_Modal').modal("show");
                }
            });
            
            $(document).on('click','#verify',function(){
            var verify_id = report_id; 
                $.ajax({
                    url:"../server.php",
                    method:"GET",
                    data:{verify_id:verify_id},
                    success:function(data)
                    {
                        //alert("Sucess");
                        $('#view_data_Modal').modal('hide');
                        location.reload();
                    },
                    error:function(err)
                    {
                        console.log(err);
                    }
                });
            });
        });
        

    });
    </script>

    
</body>

</html>
