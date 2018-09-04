<?php
/**
 * Created by PhpStorm.
 * User: Harsha Edirisinghe
 * Date: 8/18/2018
 * Time: 2:47 PM
 */
$b_id = $this->input->get("id");
?>

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
                            <h1>Bill Details [<?php echo $b_id; ?>]</h1>
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
                                <span>Bil Details</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">

<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-birthday-cake"></i>Bill Details </div>
        <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
        </div>
    </div>
    <div class="portlet-body flip-scroll">
        <table class="table table-bordered table-striped table-condensed flip-content">
            <thead class="flip-content">
            <tr>
                <th> # </th>
                <th> Bill ID </th>
                <th class="numeric"> Bill Owner </th>
                <th class="numeric"> Waiter </th>
                <th class="numeric"> Table/Room</th>
                <th class="numeric"> Item Name </th>
                <th class="numeric"> Qty </th>
                <th class="numeric"> Sub Total </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $n = 1;

            if (sizeof($show_bill) > 0) {

                foreach ($show_bill as $show_bill_result) {
                    ?>
            <tr>
                <td class="text-left"> <?php echo $n; ?> </td>
                <td class="text-left"> <?php echo $show_bill_result->session_id; ?> </td>
                <td class="text-left"> <?php echo $show_bill_result->bill_owner; ?> </td>
                <td class="text-left"> <?php echo $show_bill_result->waiter; ?> </td>
                <td class="text-left"> <?php echo $show_bill_result->tbl_name; ?> </td>
                <?php if(!empty($show_bill_result->food_name)){?>
                    <td class="text-left"> <?php echo $show_bill_result->food_name; ?> </td>
                <?php }elseif (!empty($show_bill_result->dessert_name)){ ?>
                        <td class="text-left"> <?php echo $show_bill_result->dessert_name; ?> </td>
                <?php }elseif (!empty($show_bill_result->liq_name)){?>
                        <td class="text-left"> <?php echo $show_bill_result->liq_name; ?> </td>
                <?php } else{?>
                        <td class="text-left"> <?php echo $show_bill_result->drink_name; ?> </td>
                <?php } ?>

                <td class="text-left"> <?php echo $show_bill_result->qty; ?> </td>
                <td class="text-left"> <?php echo $show_bill_result->sub_total; ?> </td>
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
</div>
</div>

</div>
</div>
</div>
<!-- END PAGE CONTENT INNER -->
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

</div>
<!-- END CONTAINER -->
</div>
</div>

<div class="modal fade modal-md" id="add_new_foods" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="model_title"></h4>
            </div>
            <form id="form" name="form" action="<?php echo base_url('Food/add_edit_food'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
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
                    <button name="submit" type="submit" value="Save" class="btn green" id="myBtn" onclick="return confirm('Are You Sure?');"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <div id="tempmsg"></div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    function editdata(element) {
        var id = element.id;
        $.post('<?php echo base_url() ?>Food/get_foods_by_id?id=' + id,
            function (returnedData) {
                if(returnedData!="NO_DATA"){
                    var obj = JSON.parse(returnedData);
                    var food_id = (obj.food_id);
                    var food_name = (obj.food_name);
                    var food_description = (obj.food_description);
                    var food_price = (obj.food_price);
                    var food_discount = (obj.food_discount);
                    openModal("EDIT",[food_id,food_name,food_price,food_discount,food_description,]);
                }else{
                    alert("NO_DATA");
                }

            });
    }

    function openModal(mode,data) {
        if(mode=="EDIT"){
            $("#model_title").text("Edit Food Details");
            $("#data_id").val(data[0]);
            $("#data_type").val("EDIT");
            $("#product_name").val(data[1]);
            $("#p_sel_price").val(data[2]);
            $("#p_discount").val(data[3]);
            $("#p_discription").val(data[4]);
            $('#add_new_foods').modal('show');
        }else  if(mode=="ADD"){
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
</script>