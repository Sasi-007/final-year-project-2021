<?php
session_start(); 
include_once('controller/dbconn.php'); 
include_once('includes/header.php'); 
include_once('includes/sidebar.php'); 
include_once("includes/footer.php");
$username=ucfirst($_SESSION["name"]);
$email=$_SESSION["email"];
?>
<title>Account | <?php echo $username;?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<title>Profile</title>
<div id="layout-wrapper">
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title-box">
                            <h3 class="font-size-28">Profile</h3>
                            <ol class="breadcrumb mb-0">
                                <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">View Profile</a></li> -->
                            </ol>
                        </div>
                    </div>
                    <div class="  col-auto float-right ml-auto">
                        <div>
                            <a href="#" class="btn add-btn btn-primary edit_customer" data-toggle="modal"
                                data-target="#edit_customers"><i class="fa fa-pen"></i> Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="view_profile" class="table mb-0 table-bordered dt-responsive nowrap">
                                    <tbody>
                                        <?php
                                            $count=1;
                                            $sel_query="SELECT * FROM `patient_det` WHERE name = '".$username."'";
                                            $result = return_array($sel_query);
                                            foreach($result as $row) { ?>
                                        <tr>
                                            <td><b>NAME</b></td>
                                            <td><?php echo $username; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>EMAIL</b></td>
                                            <td><?php echo $row["email"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>AGE</b></td>
                                            <td><?php if($row["age"]=='0'){print("-");}else{
                                              echo $row["age"];
                                            } ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>GENDER</b></td>
                                            <td><?php if($row["gender"]=='1'){
                                              echo Male;
                                            }else if($row["gender"]=='2'){
                                              echo Female;
                                            } else{
                                              print("-");
                                            } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>PHONE NUMBER</b></td>
                                            <td>+91 <?php if($row["ph_number"]=='0'){print("-");}else{
                                              echo $row["ph_number"];
                                            } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>HEIGHT</b></td>
                                            <td><?php if($row["height"]=='0'){print("-");}else{
                                              echo $row["height"];
                                            } ?> inches
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>WEIGHT</b></td>
                                            <td><?php if($row["weight"]=='0'){print("-");}else{
                                              echo $row["weight"];
                                            } ?> inches
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div id="edit_customers" class="modal  custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <!-- modal================== -->
                                <div class="modal-body">
                                    <form id="customer_form" style="align:center;" class="customer_form"
                                        name="customer_form">


                                        <div class="row">
                                            <div class="col-lg-6">

                                                <div>
                                                    <div class="form-group mb-4">
                                                        <label for="venture_name">Name</label>
                                                        <input type="text" class="form-control" name="venture_name"
                                                            value="<?php echo $get_role["venture_name"];?>"
                                                            id="venture_name" placeholder="<?php echo $username; ?>"
                                                            autocomplete="off" disabled>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="owner_email">Age</label>
                                                        <input type="number" class="form-control" name="owner_email"
                                                            id="owner_email" placeholder="Enter Age"
                                                            autocomplete="off">
                                                    </div>
                                                    <input type="hidden" name="hidid" id="hidid" class="hidid" />
                                                    <div class="form-group mb-4">
                                                        <label for="zone">Gender</label>
                                                        <input type="text" class="form-control" name="zone" id="zone"
                                                            placeholder=" Enter your zone" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-4">
                                                    <label for="manager_name">Manager Name</label>
                                                    <input type="text" class="form-control" name="manager_name"
                                                        id="manager_name" placeholder="Enter manager name"
                                                        autocomplete="off">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="manager_email">Manager Email</label>
                                                    <input type="email" class="form-control" name="manager_email"
                                                        id="manager_email" placeholder="Enter manager email"
                                                        autocomplete="off">
                                                </div>
                                                <div class=" password form-group mb-4">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        id="password" placeholder="Password" autocomplete="off">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="contact_number">Contact number</label>
                                                    <input type="number" class="form-control" name="contact_number"
                                                        id="contact_number" placeholder="Contact number"
                                                        autocomplete="off">

                                                    <span id="phone-availability-status"></span></label>
                                                    <span id="phone_validate" class="r"></span></label>



                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="invoice_email">Invoice mail</label>
                                                    <input type="email" class="form-control" name="invoice_email"
                                                        id="invoice_email" placeholder="Invoice mail"
                                                        autocomplete="off">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="venture-name">Category</label>

                                                    <div class="form-group mb-4">
                                                        <div class="input-field">
                                                            <span id="code-availability-status"></span>
                                                            <select class="form-control select2" name="category"
                                                                id="category">
                                                                <option disabled selected value>Select Category</option>
                                                                <?php foreach ($get_category as $key => $value) {
                                                                echo $key;
                                                                $selected = "";
                                                                if($get_item_det["category_id"] == $value["id"]){
                                                                    $selected = "selected";
                                                                }
                                                            echo '<option value="'.$value["id"].'" '.$selected.'>'.$value["name"].'</option>';
                                                            } 
                                                            // echo '<input type="submit" value="Validate" onclick="return Validate()" />'
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class="text-muted"></span>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="margin_rate">Margin rate</label>
                                                    <input type="text" class="form-control" name="margin_rate"
                                                        id="margin_rate" placeholder=" Margin rate " autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="hide-div" class="form-group row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary w-md waves-effect waves-light"
                                                    id="edit">Edit
                                                </button>
                                            </div>
                                        </div>
                                </div>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
$(document).ready(function() {
    var username = "<?php echo $username ?>"
    $.ajax({
        type: "POST",
        url: "controller/common_controller.php",
        data: {
            username: username,
            Type: "fetch_profile"
        },
        success: function(result) {
            // var res = JSON.parse(result);
            // if (res != 0) {
            $(".view_profile").html(result);
            // console.log(res);
            // }
        }
    });
    $(".edit_customer").click(function() {
        var username = "<?php echo $username ?>"
        var userid = "<?php echo $userid ?>"
        console.log(userid);
        call_edit_page(userid);

    });
    $("#edit").click(function() {
        if ($("#edit").valid()) {
            var venture_name = $("#venture_name").val();
            var venture_address = $("#venture_address").val();
            var brand_name = $("#brand_name").val();
            var brand_address = $("#brand_address").val();
            var owner_name = $("#owner_name").val();
            var owner_email = $("#owner_email").val();
            var zone = $("#zone").val();
            var manager_name = $("#manager_name").val();
            var manager_email = $("#manager_email").val();
            var password = $("#password").val();
            var contact_number = $("#contact_number").val();
            var invoice_email = $("#invoice_email").val();
            var margin_rate = $("#margin_rate").val();
            var id = $("#hidid").val();
            // alert(id);
            var category = Validate();
            register(venture_name, venture_address, brand_name, brand_address, owner_name, owner_email,
                zone, manager_name, manager_email, password, invoice_email, margin_rate,
                contact_number, category, id);

        }
    });

    function Validate() {
        var category = document.getElementById("category");
        if (category.value == "") {
            alert("pls enter a value");
        }
        return category.value;
    }


    function call_edit_page(user_id) {
        console.log(user_id)
        $.ajax({
            type: "POST",
            url: "controller/common_controller.php",
            data: {
                user_id: user_id,
                Type: "fetch_customer_details"
            },
            success: function(result) {
                $("#add_customers").modal("show");
                var res1 = JSON.parse(result);
                $("#password").hide();
                console.log(res1);

                $("#venture_name").val(res1.company_name);
                $("#venture_address").val(res1.address);
                $("#brand_name").val(res1.brand_name);
                $("#brand_address").val(res1.brand_address);
                $("#owner_name").val(res1.username);
                $("#owner_email").val(res1.email);
                $("#zone").val(res1.zone)
                $("#manager_name").val(res1.manager_name);
                $("#manager_email").val(res1.manager_mail);
                //  $("#password").val(res1.password);
                $("#address").val(res1.address);
                $("#contact_number").val(res1.phone_number);
                $("#invoice_email").val(res1.invoice_mail);
                $("#category").val(res1.category);
                $("#margin_rate").val(res1.margin_rate);
                $("#hidid").val(res1.id);
            }
        });
    }

});

function register(venture_name, venture_address, brand_name, brand_address, owner_name, owner_email, zone,
    manager_name, manager_email, password, invoice_email, margin_rate, contact_number, category, id) {
    $.ajax({
        type: "POST",
        url: "controller/common_controller.php",
        data: {
            venture_name: venture_name.trim(),
            venture_address: venture_address.trim(),
            brand_name: brand_name.trim(),
            brand_address: brand_address.trim(),
            owner_name: owner_name.trim(),
            owner_mail: owner_email.trim(),
            zone: zone.trim(),
            manager_name: manager_name.trim(),
            manager_mail: manager_email.trim(),
            password: password.trim(),
            invoice_mail: invoice_email.trim(),
            margin_rate: margin_rate.trim(),
            phone_number: contact_number.trim(),
            category: category.trim(),
            id: id,
            Type: "edit_profile"
        },
        success: function(result) {
            // $("#myModal").modal("show");

            // setTimeout(function() {
            window.location.reload();
            // }, 10000);
        }
    });
}
</script>