<?php
include_once('includes/header.php'); 
include_once('includes/sidebar.php'); 
include_once("includes/footer.php"); 
?>
<title>History | Doctor</title>
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
                    <div class="col-auto float-right ml-auto">
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Patient History</h4>
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
</div>
<script type="text/javascript">
$(document).ready(function() {
    show_patient_history();

    function show_patient_history() {
        $.ajax({
            type: "POST",
            url: "controller/common_controller.php",
            data: {
                Type: "show_patient_history"
            },
            success: function(result) {
                $(".live-order-list").html(result);
            }
        });
    }
});
</script>