<?php 
if(isset($_POST['report_id'])) {
    $output = '';
    $db = mysqli_connect('localhost', 'root', '', 'ucdb');
    $query = "SELECT * FROM reports WHERE id = '".$_POST['report_id']."'";
    $result = mysqli_query($db,$query);
    $output .= '
    <div class="table-responsive table--no-card m-b-30">
        <table class="table table-borderless table-striped table-earning" id="logs">';
    while($row = mysqli_fetch_array($result)) {
        $output .= '
            <tr>
                <td width="100px"><label class="form-control">Date: '.$row['date_time'].'</label></td>
            </tr>
            <tr>
                <td width="100px;"><label class="form-control">Name: '.$row['name'].'</label></td>
            </tr>
            <tr>
                <td width="100px;"><label class="form-control">Comment: '.$row['comment'].'</label></td>
            </tr>
            <tr>
                <td width="100px;"><label class="form-control">Complaint: '.$row['complaint'].'</label></td>
            </tr>
            <tr>
                <td width="100px;"><label class="form-control">Complainant: '.$row['complainant'].'</label></td>
            </tr>

        ';
    }
    $output .= "</table></div>";
    echo $output;
}

?>

                        