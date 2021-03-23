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
else if($type == 'login'){
    $username = $_REQUEST['email'];
    $password = md5($_REQUEST['password']);
    $check_cnt = return_single("SELECT COUNT(1) as cid FROM login WHERE email = '".$username."'");
    if($check_cnt['cid'] > 0){
        $sfqry = "SELECT * FROM login WHERE email='".$username."' and password='".$password."'";
        $row1 = return_single($sfqry);
        if($row1)
        {
            $_SESSION["Id"] = $row1["id"];
            $_SESSION["name"] = $row1["username"];
            $_SESSION["logged_in"] = true;
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