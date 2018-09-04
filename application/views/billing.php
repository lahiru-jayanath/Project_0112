
<style>
    .dashboard-stat .details .desc {
        padding-top: 25px;
        text-align: right;
        font-size: 34px;
        line-height: 36px;
        letter-spacing: 2px;
        margin-bottom: 0;
        font-weight: 300;
    }
</style>
<!-- begin body -->
<div class="page-wrapper-row full-height">
    <div class="page-wrapper-middle">
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Billing</h1>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">



                            <div class="row">
                                <a href="javascript:" class="get_cat" onclick="myFunction('food')"><div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-bottom-10">
                                        <div class="dashboard-stat  blue bg_cat" id="menu_food">
                                            <div class="visual">
                                                <i class="fa fa-birthday-cake fa-icon-small"></i>
                                            </div>
                                            <div class="details">
                                                <div class="desc"> FOODS </div>
                                            </div>

                                        </div>
                                    </div></a>
                                <a href="javascript:" class="get_cat" onclick="myFunction('beverage')"><div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat red bg_cat" id="menu_beverage">
                                            <div class="visual">
                                                <i class="fa fa-coffee fa-icon-small"></i>
                                            </div>
                                            <div class="details">
                                                <div class="desc"> BEVERAGE </div>
                                            </div>
                                            <!--                                                    <a class="more" href="javascript:;"> View more-->
                                            <!--                                                        <i class="m-icon-swapright m-icon-white"></i>-->
                                            <!--                                                    </a>-->
                                        </div>
                                    </div></a>
                                <a href="javascript:" class="get_cat" onclick="myFunction('dessert')"><div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat purple bg_cat" id="menu_dessert">
                                            <div class="visual">
                                                <i class="fa fa-apple fa-icon-small"></i>
                                            </div>
                                            <div class="details">
                                                <div class="desc"> DESSERT </div>
                                            </div>
                                            <!--                                                    <a class="more" href="javascript:;"> View more-->
                                            <!--                                                        <i class="m-icon-swapright m-icon-white"></i>-->
                                            <!--                                                    </a>-->
                                        </div>
                                    </div></a>
                                <a href="javascript:" class="get_cat" onclick="myFunction('liquor')" ><div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                        <div class="dashboard-stat green-seagreen bg_cat" id="menu_liquor">
                                            <div class="visual">
                                                <i class="fa fa-glass fa-icon-small"></i>
                                            </div>
                                            <div class="details">
                                                <div class="desc"> LIQUOR </div>
                                            </div>
                                            <!--                                                    <a class="more" href="javascript:;"> View more-->
                                            <!--                                                        <i class="m-icon-swapright m-icon-white"></i>-->
                                            <!--                                                    </a>-->
                                        </div>
                                    </div></a>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">    
                                    <div class="row">
                                        <div class="col-sm-9">    
                                            <button class="btn btn-success" id="new_cart" style="width:200px;" onclick="newBill()"><i class="fa fa-neuter"></i> New Bill</button>   
                                            <button class="btn btn-primary"  id="proceed_cart"  style="width:400px;display:none;" onclick="proceedBill()"><i class="fa fa-check-square"></i> Proceed Bill</button>
                                            <button class="btn btn-danger"  id="cancel_cart"  style="width:200px;display:none;margin-left:30px;" onclick="cancelBill()"><i class="fa fa-times-circle"></i> Cancel</button>
                                            <button class="btn btn-warning pull-right"  id="cancel_cart"  style="width:200px;" onclick="showHelp()"><i class="fa fa-info-circle"></i> Help</button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="portlet light ">
                                                <!-- drop down item  list -->
                                                <div class="form-group">
                                                    <label for="single-append-text" class="control-label">Select Item </label>
                                                    <div class="input-group select2-bootstrap-append">
                                                        <select id="items_load" class="form-control select2-allow-clear">
                                                            <option value="0" selected="">-Select a Item-</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <!-- end drop down  item list -->

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- drop down table Number -->
                                                        <div class="form-group">
                                                            <label for="single-append-text" class="control-label">Select Table Number </label>
                                                            <div class="input-group select2-bootstrap-append">
                                                                <select id="table_no_load" class="form-control select2-allow-clear" placeholder="Select an Item" required>
                                                                    <option value="0" selected="">-Select a Table-</option>
                                                                    <?php
                                                                    if (sizeof($table_details) > 0) {

                                                                        foreach ($table_details as $table) {
                                                                            echo '<option value="' . $table->iid . '">' . $table->tbl_name . '</option>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <!-- end drop down  table Number -->
                                                    </div>

                                                    <div class="col-md-6">
                                                        <!-- drop down waiter -->
                                                        <div class="form-group">
                                                            <label for="single-append-text" class="control-label">Select A Waiter </label>
                                                            <div class="input-group select2-bootstrap-append">
                                                                <select id="waiters_load" class="form-control select2-allow-clear" placeholder="Select an Item" required>
                                                                    <option value="0" selected="">-Select a Waiter-</option>
                                                                    <?php
                                                                    if (sizeof($waiter_details) > 0) {

                                                                        foreach ($waiter_details as $waiter) {
                                                                            echo '<option value="' . $waiter->user_id . '">' . $waiter->user_fname . " " . $waiter->user_lname . '</option>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end drop down  waiter -->

                                                    <!-- bill type-->
                                                    <div class="col-md-6">
                                                        <!-- drop down waiter -->
                                                        <div class="form-group">
                                                            <label for="single-append-text" class="control-label">Select Bill Type </label>
                                                            <div class="input-group select2-bootstrap-append">
                                                                <select id="bill_type" class="form-control select2-allow-clear" placeholder="Select an Item" required>
                                                                    <option value="0" selected="">-Select a Bill Type-</option>
                                                                    <?php
                                                                    if (sizeof($bill_type_details) > 0) {

                                                                        foreach ($bill_type_details as $billtype) {
                                                                            echo '<option value="' . $billtype->ibill_type_id . '">' . $billtype->vname .'</option>';
                                                                        }
                                                                    }
                                                                    ?>

                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- bill type end -->
                                                </div>


                                                <!-- bill items table ->
                                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                                <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-comments"></i>Billing Items </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="collapse"> </a>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="table-scrollable">
                                                            <table id="bill_items" class="table table-bordered table-striped table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th> # </th>
                                                                        <th> Item </th>
                                                                        <th> Type </th>
                                                                        <th> QTY </th>
                                                                        <th> Unit Price(Rs.) </th>
                                                                        <th> Discount (%) </th>
                                                                        <th> Sub Total(Rs.)</th>
                                                                        <th> ACTION </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END SAMPLE TABLE PORTLET-->
                                                <!-- end bill items tables -->

                                            </div>
                                        </div>
                                        <!-- end billing list -->

                                        <!--  total bill section -->
                                        <div class="col-md-3">
                                            <?php
                                            // $user_detail = ($this->session->all_userdata()['current_session']);
                                            ?>
                                            <div class="portlet light ">   
                                                <input type="text" id="bill_session_id" class="form-control bg-white" readonly="" value="" style="font-size:16px;text-align:center;">
                                                <div class="note note-info">
                                                    <h4  class="block">Grand Total (Rs.): </h4>
                                                    <h2 id="finalTotal" class="font-black bold text-right">0.00</h2>
                                                </div>

                                                <button type="button" id="view_bill" class="btn red-mint" style="width:100%;display:none;" onclick="viewBill('VB')"><i class="fa fa-newspaper-o"></i> View Bill</button>

                                            </div>
                                        </div>

                                        <!-- end total bill section -->


                                        <!-- view previos bill-->
                                        <div class="col-md-3">
                                            <div class="portlet light ">     
                                                <div class="note note-info">
                                                    <h4>TABLE:</h4>
                                                    <h3 id="finalTable" class="font-blue-dark bold"></h3>
                                                    <h4  class="block">Waiter: </h4>
                                                    <strong id="finalWaiter" class="font-blue-dark bold"></strong>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- end view previos bill-->


                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->

                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Start Liquer modal-content -->
<div class="modal fade modal-md" id="liq_model" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Select a type</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="item_code" name="item_code" value="">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <button class="btn btn-md btn-danger" onclick="selectLiqModel($('#item_code').val(), 'BTL')" style="width:100%;height:75px;">Bottle</button>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-md btn-primary" onclick="selectLiqModel($('#item_code').val(), '50ML')" style="width:100%;height:75px;">50 ml Shot</button>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-md btn-success" onclick="selectLiqModel($('#item_code').val(), '25ML')" style="width:100%;height:75px;">25 ml Shot</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">                   
                <button type="button" class="btn btn-default" data-dismiss="modal"> OK</button>
            </div>
        </div>
    </div>
</div>
<!-- END Liquer modal -->




<!-- Start HElp modal-content -->
<div class="modal fade modal-md" id="help_model" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Help</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>SHIFT+N</td>
                        <td>New Bill</td>
                    </tr>
                    <tr>
                        <td>SHIFT+Q</td>
                        <td>Cancel Ongoing Bill</td>
                    </tr>
                    <tr>
                        <td>SHIFT+1</td>
                        <td>Select Food</td>
                    </tr>
                    <tr>
                        <td>SHIFT+2</td>
                        <td>Select Beverage</td>
                    </tr>
                    <tr>
                        <td>SHIFT+3</td>
                        <td>Select Dessert</td>
                    </tr>
                    <tr>
                        <td>SHIFT+4</td>
                        <td>Select Liquor</td>
                    </tr>
                    <tr>
                        <td>SHIFT+S</td>
                        <td>Proceed the Bill</td>
                    </tr>
                    <tr>
                        <td>SHIFT+V</td>
                        <td>View Bill</td>
                    </tr>
                    <tr>
                        <td>SHIFT+P</td>
                        <td>Finish & Print Bill</td>
                    </tr>

                </table>
            </div>
            <div class="modal-footer">                   
                <button type="button" class="btn btn-default" data-dismiss="modal"> OK</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END HElp modal -->


<!-- Start Food modal-content -->
<div class="modal fade modal-md" id="add_new_foods" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="model_title"></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="page_origin" name="page_origin" value="BILL" >

                    <!-- <label>Add New Mobile Number</label> -->
                    <input type="hidden" id="data_id" name="data_id"/>
                    <input type="hidden" id="data_type" name="data_type"/>
                    <div class="input-icon" style="margin-bottom: 5px;">
                        <i class="fa fa-birthday-cake"></i>
                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name*" pattern="[A-Z a-z]{1,32}" required>
                    </div>

                    <div class="input-icon" style="margin-bottom: 5px;">
                        <i class="fa fa-dollar"></i>
                        <input type="number" class="form-control" name="p_sel_price" id="p_sel_price" placeholder="Seling Price*"  required>
                    </div>
                    <div class="input-icon" style="margin-bottom: 5px;">
                        <i class="fa fa-cart-arrow-down"></i>
                        <input type="number" class="form-control" name="p_discount" id="p_discount" placeholder="Discount" >
                    </div>
                    <div class="input-icon" style="margin-bottom: 5px;">
                        <i class="fa fa-newspaper-o"></i>
                        <input type="text" class="form-control" name="p_discription" id="p_discription" placeholder="Description">
                    </div>


                </div>
            </div>

            <div id="frmmsgNumber">  </div>

            <div class="modal-footer">
                <button name="submit" value="Save" class="btn green" id="myBtn" onclick="saveFood()"><i class="fa fa-save"></i> Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <div id="tempmsg"></div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END Food modal -->




<?php include_once('BillingHelper.php'); ?>

<script>


    function openModal(mode, data) {
        if (mode == "EDIT") {

        } else if (mode == "ADD") {
            $("#model_title").text("Add New Food Details");
            $("#data_id").val("");
            $("#data_type").val("ADD");
            $("#product_name").val("");
            $("#p_sel_price").val("");
            $("#p_discount").val("");
            $("#p_discription").val("");
            $('#add_new_foods').modal('show');
        }
    }
//
    $("#add_new_foods").submit(function () {
        //alert("Submitted");
    });


    function saveFood() {
        var is_save = confirm("Are You Sure?");
        if (is_save == true) {

            var product_name = $("#product_name").val();
            var p_sel_price = $("#p_sel_price").val();
            var p_discount = $("#p_discount").val();
            var p_discription = $("#p_discription").val();

            $.post('<?php echo base_url() ?>Food/add_main_food?product_name=' + product_name + '&p_sel_price=' + p_sel_price + '&p_discount=' + p_discount + '&p_discription=' + p_discription,
                    function (returnedData) {
//                        alert(returnedData);
                        if (returnedData == "1") {
                            myFunction('food');
                            $('#add_new_foods').modal('hide');
                            alert("Saved Successfully.");
                        }
                    });
        }
    }


    function checkCart() {
        $.post('<?php echo base_url() ?>Bill/print_bill_check',
                function (returnedData) {
                    if (returnedData == "") {
                        //alert(returnedData);
                        closeBill();
                    }
                });
    }
    setInterval(checkCart, 1000);
    var audio_error = new Audio('assets/sounds/error.mp3');
    var audio_adding = new Audio('assets/sounds/adding.mp3');
    var sale_suceess = new Audio('assets/sounds/sale_suceess.mp3');
    var notifi_beep = new Audio('assets/sounds/notifi_beep.mp3');
    var err_beep = new Audio('assets/sounds/err_beep.mp3');
    function showHelp() {
        $('#help_model').modal('show');
    }

    document.addEventListener("keydown", function (event) {
        /*event.keyCode
         event.shiftKey
         event.altKey
         event.ctrlKey
         **/


        if (event.shiftKey) {
            switch (event.keyCode) {
                case 49:
                    //SHIFT+1
                    myFunction('food');
                    audio_adding.play();
                    break;
                case 50:
                    //SHIFT+2
                    myFunction('beverage');
                    audio_adding.play();
                    break;
                case 51:
                    //SHIFT+3
                    myFunction('dessert');
                    audio_adding.play();
                    break;
                case 52:
                    //SHIFT+4
                    myFunction('liquor');
                    audio_adding.play();
                    break;
                case 83:
                    //SHIFT+S -Save
                    proceedBill();
                    break;
                case 80:
                    //SHIFT+P - Print 
                    sale_suceess.play();
                    break;
                case 86:
                    //SHIFT+V-View
                    notifi_beep.play();
                    viewBill("VB");
                    break;
                case 78:
                    //SHIFT+N-NEW
                    notifi_beep.play();
                    newBill();
                    break;
                case 81:
                    //SHIFT+Q-Cancel
                    audio_error.play();
                    cancelBill();
                    break;
            }
        }


        var keycode = event.keyCode;
        //alert(keycode);

    });
</script>