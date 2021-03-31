<?php
include_once('includes/header.php'); 
include_once('includes/sidebar.php'); 
include_once("includes/footer.php"); 
?>
<title>Schedule | Doctor</title>
<div id="layout-wrapper">
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title-box">
                        </div>
                    </div>
                    <div class="  col-auto float-right ml-auto">
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Patient Requests</h4>
                                <div class="table-responsive">
                                    <div class="live-order-list">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <div id="view_order_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="order_details_div">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="view_delivery_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title">Enter Payment Method and Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form style="align:center;" id="add_payment_status" class="add_payment_status"
                        name="add_payment_status">
                        <div class="form-group row ">
                            <div class="col-sm-4">
                                <label for="example-text-input" class="col-sm-15 col-form-label">Choose Payment Status
                                    <span class="r">*</span></label>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select class="form-control select2" name="payment_method" id="payment_method">
                                        <option disabled selected value>Select</option>
                                        <option value="0">Not Paid</option>
                                        <option value="1">Partially Paid</option>
                                        <option value="2">Fully Paid</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="amount">
                            <div class="col-sm-4">
                                <label for="example-text-input" class="col-sm-15 col-form-label">Amount Paid
                                    <span class="r">*</span></label>
                            </div>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" placeholder="Enter Amount" name="amount_paid"
                                    id="amount_paid" autocomplete="off">
                                <span id="role-availability-status"></span>
                            </div>
                            <input type="hidden" name="hid_order_id" id="hid_order_id">
                        </div>
                        <button id="save_changes" class="success btn btn-primary ui-button " type="button">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end main content-->
</div>
<script type="text/javascript">
    $(document).ready(function() {
        show_current_list();
    });

    
    function show_current_list() {
        $.ajax({
            type: "POST",
            url: "controller/common_controller.php",
            data: {
                Type: "show_current_list"
            },
            success: function(result) {
                $(".live-order-list").html(result);
            }
        });
    }
</script>