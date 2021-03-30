<?php
include_once('dbconn.php');
$type = $_REQUEST['Type'];
session_start();

if($type == 'register'){
    $password=md5($_REQUEST["password"]);
        $add_category = gosql("INSERT INTO patient_det (pat_id,name,password,email) VALUES ('".$_REQUEST["pat_id"]."','".$_REQUEST["name"]."','".$password."','".$_REQUEST["email"]."')");
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
else if($type == 'edit_profile'){
    $update_item = gosql("UPDATE patient_det SET age='".$_REQUEST["age"]."',gender='".$_REQUEST["gender"]."',ph_number='".$_REQUEST["ph_number"]."',height='".$_REQUEST["height"]."',weight='".$_REQUEST["weight"]."' WHERE id='".$_REQUEST["id"]."';");
}
else if($type =='fetch_customer_details')
{
$id = $_REQUEST["user_id"];
$fetch_customer = return_single("SELECT * from `patient_det` where id = '".$id."'");
echo json_encode($fetch_customer);
}
else if($type=='patient_req_entry'){
    $pat_id=$_REQUEST["id"];
    $insert_entry = gosql("INSERT INTO appointment (pat_id,book_time) VALUES ('".$pat_id."','".$_REQUEST["book_date"]."')");
    echo $pat_id;
}
else if($type == 'login'){
    $username = $_REQUEST['email'];
    $password = md5($_REQUEST['password']);
    $check_cnt = return_single("SELECT COUNT(1) as cid FROM patient_det WHERE email = '".$username."'");
    if($check_cnt['cid'] > 0){
        $sfqry = "SELECT * FROM patient_det WHERE email='".$username."' and password='".$password."'";
        $row1 = return_single($sfqry);
        if($row1)
        {
            $_SESSION["Id"] = $row1["id"];
            $_SESSION["pat_id"] = $row1["pat_id"];
            $_SESSION["name"] = $row1["name"];
            $_SESSION["email"] = $row1["email"];
            $_SESSION["logged_in"] = true;
            $_SESSION["efficient_data"]=0;
            if($row1["age"]!='0' && $row1["gender"]!='0' && $row1["ph_number"]!='0' && $row1["height"]!='0' && $row1["weight"]!='0'){
                $_SESSION["efficient_data"]=1;
            }
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