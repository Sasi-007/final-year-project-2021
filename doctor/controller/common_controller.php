<?php
include_once('dbconn.php');
$type = $_REQUEST['Type'];
session_start();

if($type == 'register'){
    if($_REQUEST["cat_id"] == ''){
        $add_category = gosql("INSERT INTO category (restaurant_id,name,description,is_available,createdon,createdby) VALUES ('".RESTAURANT_ID."','".$_REQUEST["catname"]."','".$_REQUEST["catdesc"]."','".$_REQUEST["is_available"]."',now(),'1')");
    }
 }
else if($type == 'login'){
    $username = $_REQUEST['email'];
    $password = $_REQUEST['password'];
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