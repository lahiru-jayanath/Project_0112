<?php // print_r($bev_details);die();                    ?>
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
                            <h1>Beverages</h1>
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
                                <span>Beverages Details</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if ($this->session->flashdata('add_succ')) { ?>
                                        <div class="note note-success">
                                            <div class="alert alert-success">
                                                <h2><?php echo $this->session->flashdata('add_succ'); ?></h2>
                                            </div>
                                        </div>
                                    <?php } else if ($this->session->flashdata('add_error')) { ?>
                                        <div class="note note-success">
                                            <div class="alert alert-danger">
                                                <h2><?php echo $this->session->flashdata('add_error'); ?></h2>
                                            </div>
                                        </div>
                                    <?php } ?>




                                    <?php if ($this->session->flashdata('delete_succ')) { ?>
                                        <div class="note note-success">
                                            <div class="alert alert-success">
                                                <h2><?php echo $this->session->flashdata('delete_succ'); ?></h2>
                                            </div>
                                        </div>
                                    <?php } else if ($this->session->flashdata('delete_error')) { ?>
                                        <div class="note note-success">
                                            <div class="alert alert-danger">
                                                <h2><?php echo $this->session->flashdata('delete_error'); ?></h2>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <button type="button" class="btn blue" onclick="openModal('ADD', []);" style="margin-bottom: 10px;">
                                        <i class="fa fa-coffee"></i>  Add Beverage Dessert </button>


                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-coffee"></i>Beverage Details </div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"> </a>

                                            </div>
                                        </div>
                                        <div class="portlet-body flip-scroll">
                                            <table class="table table-bordered table-striped table-condensed flip-content">
                                                <thead class="flip-content">
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Product Name </th>
                                                        <th class="numeric"> Purchase Price </th>
                                                        <th class="numeric"> Selling Price </th>
                                                        <th class="numeric"> Discount </th>
                                                        <th class="numeric"> Purchase Date(Y/m/d) </th>
                                                        <th class="numeric"> Initial QTY </th>
                                                        <th class="numeric"> Current QTY </th>
                                                        <th class="numeric"> Publish </th>
                                                        <th class="numeric"> Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $n = 1;
                                                    if (sizeof($bev_details) > 0) {

                                                        foreach ($bev_details as $bev_result) {
                                                            ?>
                                                            <tr>
                                                                <td class="text-left"> <?php echo $n; ?> </td>
                                                                <td> <?php echo $bev_result->drink_name; ?> </td>
                                                                <td class="numeric text-right"> <?php echo number_format((float) $bev_result->drink_price, 2, '.', ''); ?> </td>
                                                                <td class="numeric text-right"> <?php echo number_format((float) $bev_result->drink_salling_price, 2, '.', '') ?> </td>
                                                                <td class="numeric text-right"> <?php echo number_format((float) $bev_result->drink_discount, 2, '.', '') ?> </td>
                                                                <td class="numeric text-center"> 
                                                                    <?php
                                                                    //$bev_result->drink_purches_date;
                                                                    $date = date_create($bev_result->drink_purches_date);
                                                                    echo date_format($date, "Y/m/d");
                                                                    ?> 
                                                                </td>
                                                                <td class="numeric text-right"> <?php echo $bev_result->drink_stock; ?> </td>
                                                                <td class="numeric text-right"> 
                                                                    <?php
                                                                    $current_stock = ($bev_result->drink_current_stock / $bev_result->drink_stock) * 100;
                                                                    $color = "gray";
                                                                    if ($current_stock > 75) {
                                                                        $color = "green";
                                                                    } else if ($current_stock < 75 && $current_stock > 50) {
                                                                        $color = "orange";
                                                                    } else if ($current_stock < 50 && $current_stock > 25) {
                                                                        $color = "purple";
                                                                    } else {
                                                                        $color = "red";
                                                                    }
                                                                    ?>
                                                                    <span class="badge bg-<?php echo $color; ?>" style="width:50px;text-align: center;" title="Percentage: <?php echo round($current_stock); ?>">   <?php echo $bev_result->drink_current_stock; ?> </span>
                                                                </td>
                                                                <td class="numeric text-center"> <?php
                                                                    if ($bev_result->publish == 1) {
                                                                        echo "Yes";
                                                                    } else {
                                                                        echo "No";
                                                                    }
                                                                    ?> </td>
                                                                <td class="numeric text-center">
                                                                    <a class="btn btn-sm btn-danger text-center"  style="text-align:center;"  title="Delete" href="<?php echo base_url() ?>Beverage/delete_bev?id=<?php echo $bev_result->drink_id; ?>"  onclick="return confirm('Are You Sure?');"> <i class="fa fa-times" style="margin-right: 10px;"></i> </a>
                                                                    <button class="btn btn-sm btn-success text-center" id="<?php echo $bev_result->drink_id; ?>" onclick="editdata(this);"><i class="fa fa-edit" style="margin-right: 10px;"></i></button>
                                                                  <?php if (in_array($bev_result->drink_id , $stock_data)) {?>
                                                                    <button class="btn btn-sm btn-primary text-center" data-toggle="modal" data-target="#myModal" onclick="addstock(<?php echo $bev_result->drink_id; ?>,'<?php echo $bev_result->drink_name; ?>' )"><i class="fa fa-plus" style="margin-right: 10px;"></i></button>
                                                                  <?php }?>
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

        </div>
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

<!-- Lahiru  -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Stock</h4>
        </div>
            <form>
        <div class="modal-body">
          
            <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-coffee"></i>
                            <input type="text" class="form-control" name="stock_bev_name" id="stock_bev_name" placeholder="Product Name" pattern="[A-Z a-z]{1,32}" required readonly>
                            <input type="hidden" class="form-control" name="stock_bev_id" id="stock_bev_id" placeholder="Product Name" pattern="[A-Z a-z]{1,32}" required >
                       
            </div>
                      
         <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-credit-card"></i>
                            <input type="number" class="form-control" name="stock_b_quantity" id="stock_b_quantity" placeholder="Quanlity" required>
                        </div>
             <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-money"></i>
                            <input type="number" class="form-control" name="stock_b_buy_price" id="stock_b_buy_price" placeholder="Buying Price" required>
                        </div>
                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-dollar"></i>
                            <input type="number" class="form-control" name="stock_ssb_sel_price" id="stock_ssb_sel_price" placeholder="Seling Price"  required>
                        </div>
            <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-dollar"></i>
                            <input type="number" class="form-control" name="stock_discount" id="stock_discount" placeholder="Discount"  required>
                        </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" onclick="saveStock()" >Save</button>
        </div>
         </form>
      </div>
      
    </div>    
    
</div>

<script>

    hideButtons();

    function showButtons() {
        $("#btn_show_edit").show();
        $("#btn_show_inventory").show();
    }

    function hideButtons() {
        $("#btn_show_edit").hide();
        $("#btn_show_inventory").hide();
    }

    function showDetailsEdit() {
        $("#bev_name").show();
        $("#b_discription").show();
        $("#b_quantity").hide();
        $("#b_buy_price").hide();
        $("#b_sel_price").hide();
        $("#b_discount").hide();
        $("#b_buy_date").hide();
    }

    function showStock() {
        hideButtons();
        $("#bev_name").hide();
        $("#b_discription").hide();
        $("#b_quantity").show();
        $("#b_buy_price").show();
        $("#b_sel_price").show();
        $("#b_discount").show();
        $("#b_buy_date").show();
    }


    function showAll() {
        $("#bev_name").show();
        $("#b_discription").show();
        $("#b_quantity").show();
        $("#b_buy_price").show();
        $("#b_sel_price").show();
        $("#b_discount").show();
        $("#b_buy_date").show();
    }

    function editdata(element) {

        showButtons();
        showDetailsEdit();

        var id = element.id;
        $.post('<?php echo base_url() ?>Beverage/get_bev_by_id?id=' + id,
                function (returnedData) {
                    if (returnedData != "NO_DATA") {
                        var obj = JSON.parse(returnedData);
                        var drink_id = (obj.drink_id);
                        var drink_name = (obj.drink_name);
                        var drink_description = (obj.drink_description);
                        var drink_price = (obj.drink_price);
                        var drink_salling_price = (obj.drink_salling_price);
                        var drink_discount = (obj.drink_discount);
                        var drink_purches_date = (obj.drink_purches_date);
                        var drink_stock = (obj.drink_stock);
                        var drink_current_stock = (obj.drink_current_stock);
                        openModal("EDIT", [drink_id, drink_name, drink_description, drink_price, drink_salling_price, drink_discount, drink_purches_date, drink_stock, drink_current_stock]);
                    } else {
                        alert("NO_DATA");
                    }

                });
    }

    function openModal(mode, data) {
        if (mode == "EDIT") {
            $("#model_title").text("Edit Beverage Details");
            $("#data_id").val(data[0]);
            $("#data_type").val("EDIT");
            $("#bev_name").val(data[1]);
            $("#b_discription").val(data[2]);
            $("#b_buy_price").val(data[3]);
            $("#b_sel_price").val(data[4]);
            $("#b_discount").val(data[5]);
            $("#b_buy_date").val(data[6]);
            $("#b_quantity").val(data[7]);
            $('#add_new_beverage').modal('show');
        } else if (mode == "ADD") {
            showAll();
            $("#model_title").text("Add New Beverage Details");
            $("#data_id").val("");
            $("#data_type").val("ADD");
            $("#bev_name").val("");
            $("#b_quantity").val("");
            $("#b_buy_price").val("");
            $("#b_sel_price").val("");
            $("#b_discount").val("");
            $("#b_buy_date").val("");
            $("#b_discription").val("");
            $('#add_new_beverage').modal('show');
        }
    }
    
   function addstock(id,product_name){
       
       $("#stock_bev_name").val(product_name);
        $("#stock_bev_id").val(id);
      // alert(product_name);
   }
   
  function saveStock(){
     var product_id = $("#stock_bev_id").val();
     var qty = $("#stock_b_quantity").val();
     var buy_price = $("#stock_b_buy_price").val();
     var discount  = $("#stock_discount").val();
     var selling_price  = $("#stock_ssb_sel_price").val();
    	//alert(product_id);
    
     $.post("<?php echo base_url();?>/Beverage/addStock", {product_id:product_id,qty:qty,buy_price:buy_price,selling_price:selling_price,discount:discount}, function(data){
     //alert(data);
    });
  }
</script>

