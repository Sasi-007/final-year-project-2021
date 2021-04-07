<?php
include_once('dbconn.php');
$type = $_REQUEST['Type'];
session_start();

if($type == 'register'){
    $password=md5($_REQUEST["password"]);
        $add_category = gosql("INSERT INTO login (username,password,email) VALUES ('".$_REQUEST["name"]."','".$password."','".$_REQUEST["email"]."')");
 }
 else if($type=="total_sales"){
    $start_date=$_REQUEST["starting_date"];
    $end_date=$_REQUEST["ending_date"];
    $sel_query=return_single("SELECT sum(price) as price,sum(gst_value) as gst,sum(total_price) as total FROM `orders` WHERE date(createdon) BETWEEN '$start_date' AND '$end_date';");
    if($sel_query["total"]!=0){
    echo($sel_query["total"]);
  }else{
    echo 0;
  }
}
else if($type=='show_current_list'){
    $status_common = array("0"=>"Reject","1"=>"Accept");
    // $status_color = array("0"=>"F7344C","1"=>"0EB03E");?>
    <table id="datatable" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Time</th>
            <th>Appointment Status</th>
            <th>Edit Status</th>
            <th>Edit Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
                $count=1;
                $sel_query="SELECT patient_det.pat_id AS id,patient_det.name AS name,appointment.book_time AS date_time,appointment.status AS status FROM `appointment`,`patient_det` WHERE patient_det.pat_id=appointment.pat_id AND appointment.status='0' ORDER BY appointment.book_time DESC";
                $result = return_array($sel_query);
                foreach($result as $row) {  
                    //extra
                    if($row['status']==0){
                    $status_color='#ffc107';
                }
                else if($row['status']==1){
                    $status_color='#F7344C';
                }
                    ?>
        <tr class="count_row">
            <td align="center"><?php echo $row["id"]; ?></td>
            <td align="center"><?php echo $row["name"]; ?></td>
            <td align="center"><?php
                $del_date=date_create($row["date_time"]);
                echo(date_format($del_date,"d/m/Y :: h:m:s")); ?></td>
            <td align="center"><?php
            $date=$row["date_time"]; 
            $get_appointment="SELECT count(*) AS get_count FROM appointment WHERE book_time='$date' AND status='1';";
            $result_appointment=return_single($get_appointment);
            if($result_appointment["get_count"]=='0'){
                echo Available;
            }else{
                echo UnAvailable;
            }
            ?></td>
            <td id="extraColumn"><a style="background:#0EB03E;"
                    class="success btn text-white change_live_status" href="javascript:;" id="<?php echo $row["id"]; ?>"><?php echo $status_common[1]; ?></a></td>
            <td id="extraColumn"><a style="background:#F7344C;"
                    class="success btn text-white change_live_status" href="javascript:;" id="<?php echo $row["id"]; ?>"><?php echo $status_common[0]; ?></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<script src="../assets/js/pages/datatables.init.js"></script>
<?php   
}
else if($type == 'login'){
    $username = $_REQUEST['email'];
    $password = md5($_REQUEST['password']);
    $check_cnt = return_single("SELECT COUNT(1) as cid FROM login WHERE email = '".$username."'");
    if($check_cnt['cid'] > 0){
        $sfqry = "SELECT * FROM login WHERE email='".$username."' and password='".$password."'";
        $row1 = return_single($sfqry);
        if($row1)
        {
            $_SESSION["doc"]["Id"] = $row1["id"];
            $_SESSION["doc"]["name"] = $row1["username"];
            $_SESSION["doc"]["logged_in"] = true;
            echo 1;
        }
        else
        {
            $message = "Invalid Username or Password!";
            echo ($message);
        }
    }
    
    else{
        echo 404;
    }
}
else{
echo 0;
}

?>