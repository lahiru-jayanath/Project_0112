<!--
 * Created by PhpStorm.
 * User: Harsha
 * Date: 8/16/2018
 * Time: 10:00 PM
-->
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
                            <h1>Bill Histtory</h1>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="<?php echo base_url('Dashboard'); ?>">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>

                            <li>
                                <span>Bill Details</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <div id="collapse_3_1" <?php //echo $cls; ?> aria-expanded="false">
                            <div class="panel-body">
                                <form role="form" method="post" name="action_search" id="action_search" enctype="multipart/form-data">
                                    <!-- <input type="hidden" name="uid" id="uid" value="<?php /*echo $enuser_id;*/?>" >-->
                                    <div class="m-grid">
                                        <!-- ************************** START SEARCH ********************************** -->
                                        <div class="m-grid-row">
                                            <div class="m-grid-col m-grid-col-top m-grid-col-left m-grid-col-md-3" style="padding: 0px 10px;">
                                                <div class="form-group">
                                                    <label for="single" class="control-label">To Date</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                        <input type="text" class="form-control" name="date_start" id="date_start">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-th"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-grid-col m-grid-col-top m-grid-col-left m-grid-col-md-3" style="padding: 0px 10px;">
                                                <div class="form-group">
                                                    <label for="single" class="control-label">From Date</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                        <input type="text" class="form-control" name="date_end" id="date_end">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-th"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-grid-col m-grid-col-top m-grid-col-left m-grid-col-md-1" style="padding: 7px 20px;">
                                                <br/><input type="hidden" name="accsrch1" id="formkeySub" value="Y">
                                                <button style="width: 150px;" type="submit" name="filter" id="filter" class="btn yellow">Filter <iclass="icon-magnifier"></i></button>  <!--<input type="button" name="filter" id="filter" value="Filter"> -->
                                            </div>
                                            </div>
                                        </form>
                            </div>
                        </div>
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if ($this->session->flashdata('delete_succ')) { ?>
                                        <div class="note note-success">
                                            <div class="alert alert-success">
                                                <h2><?php echo $this->session->flashdata('delete_succ'); ?></h2>
                                            </div>
                                        </div>
                                    <?php } ?>


                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-coffee"></i>Bill Details </div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"> </a>

                                            </div>
                                        </div>
                                        <div id="bill_table" name="bill_table" class="portlet-body flip-scroll">
                                            <table class="table table-bordered table-striped table-condensed flip-content">
                                                <thead class="flip-content">
                                                <tr>
                                                    <th> # </th>
                                                    <th> Bill Number </th>
                                                    <th class="numeric"> Bill Owner </th>
                                                    <th class="numeric"> Waiter </th>
                                                    <th class="numeric"> Table Or Room Number </th>
                                                    <th class="numeric"> Total </th>
                                                    <th class="numeric"> Action </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                               // var_dump($bill_history);die;
                                                $n = 1;
                                                if (sizeof($bill_history) > 0) {

                                                    foreach ($bill_history as $bill_history_result) {
                                                        ?>
                                                        <tr>
                                                            <td class="text-left"> <?php echo $n; ?> </td>
                                                            <td> <?php echo $bill_history_result->session_id; ?> </td>
                                                            <td class="numeric text-right"> <?php echo  $bill_history_result->bill_owner; ?> </td>
                                                            <td class="numeric text-right"> <?php echo $bill_history_result->waiter; ?> </td>
                                                            <td class="numeric text-right"> <?php echo $bill_history_result->tbl_name; ?> </td>
                                                            <td class="numeric text-right"> <?php echo $bill_history_result->total; ?> </td>

                                                            <td class="numeric text-center">
                                                                <a class="btn btn-sm btn-success text-center"  title="Edit" href="<?php echo base_url() ?>ShowBill?id=<?php echo $bill_history_result->session_id; ?>" > <i class="fa fa-edit" style="margin-right: 10px;"></i> </a>
                                                                <a class="btn btn-sm btn-danger text-center"  style="text-align:center;"  title="Delete" href="<?php echo base_url() ?>Bill/delete_bill?id=<?php echo $bill_history_result->session_id; ?>"  onclick="return confirm('Are You Sure?');"> <i class="fa fa-times" style="margin-right: 10px;"></i> </a>

                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $n++;
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="alert alert-danger">
                                                        <strong>Sorry!</strong> There is no data to display.
                                                    </div>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END SAMPLE TABLE PORTLET-->


                                </div></div>

                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT INNER -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

        </div></div>
        <!-- END CONTAINER -->
    </div>
</div>

<div class="modal fade modal-md" id="add_new_beverage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="model_title"></h4>
            </div>

            <div class="row" style="margin-bottom:5px;margin-top:5px;">
                <div class="col-sm-12">
                    <button id="btn_show_edit" class="btn btn-sm btn-success pull-left" style="width:250px;" onclick="showDetailsEdit()"><i class="fa fa-info"></i> Edit Details</button>
                    <button id="btn_show_inventory" class="btn btn-sm btn-warning pull-right" style="width:250px;" onclick="showStock()"      ><i class="fa fa-truck" ></i> Manage Inventory</button>
                </div>
            </div>

            <form id="form" name="form" action="<?php echo base_url('Beverage/add_edit_beverage'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <label>Add New Mobile Number</label> -->
                        <input type="hidden" id="data_id" name="data_id"/>
                        <input type="hidden" id="data_type" name="data_type"/>

                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-coffee"></i>
                            <input type="text" class="form-control" name="bev_name" id="bev_name" placeholder="Product Name" pattern="[A-Z a-z]{1,32}" required>
                        </div>

                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-credit-card"></i>
                            <input type="number" class="form-control" name="b_quantity" id="b_quantity" placeholder="Quanlity" required>
                        </div>
                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-money"></i>
                            <input type="number" class="form-control" name="b_buy_price" id="b_buy_price" placeholder="Buying Price" required>
                        </div>
                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-dollar"></i>
                            <input type="number" class="form-control" name="b_sel_price" id="b_sel_price" placeholder="Seling Price"  required>
                        </div>
                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-cart-arrow-down"></i>
                            <input type="number" class="form-control" name="b_discount" id="b_discount" placeholder="Discount" >
                        </div>
                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-calendar"></i>
                            <input type="date" class="form-control" name="b_buy_date" id="b_buy_date" placeholder="Purchase Date">
                        </div>
                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-newspaper-o"></i>
                            <input type="text" class="form-control" name="b_discription" id="b_discription" placeholder="Description">
                        </div>


                    </div>
                </div>

                <div id="frmmsgNumber">  </div>

                <div class="modal-footer">
                    <button name="submit" type="submit" value="Save" class="btn green" id="myBtn" onclick="return confirm('Are You Sure?');"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <div id="tempmsg"></div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(document).ready(function (){

        $("#filter").click(function(e){
            e.preventDefault();
            var st_date = $("#date_start").val();
            var ed_date = $("#date_end").val(); //alert(st_date);
            ;

            if(st_date != "" && ed_date != ""){ //alert("asdsad");

                $.post('<?php echo base_url() ?>/BillingHistory/load_from_date?date_start=' + st_date + '&end_date=' + ed_date,{},function(m){
                    console.log(m);
                })

            }
        });
    });
</script>
