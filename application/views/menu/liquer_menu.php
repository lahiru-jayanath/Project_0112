<!-- begin body -->
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
                <div class="container">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1>Liquor</h1>
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
                            <span>Liquor Details</span>
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

                                <!--                                        <a data-toggle="modal"  href="#add_new_user"  data-modal="modal-1" class="btn blue" style="margin-bottom: 12px;"> Add New User-->
                                <!--                                            <i class="fa fa-user"></i>-->
                                <!--                                        </a>-->
                                <button type="button" class="btn blue" onclick="openModal('ADD', []);" style="margin-bottom: 10px;">
                                    <i class="fa fa-glass"></i>  Add New Liquor </button>

                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-glass"></i>Liquor Details </div>
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
                                                    <th> Brand </th>
                                                    <th> Volume </th>
                                                    <th class="numeric"> Purchase Price </th>
                                                    <th class="numeric"> Selling Price </th>
                                                    <th class="numeric"> Discount </th>
                                                    <th class="numeric"> Purchase Date </th>
                                                    <th class="numeric"> Initial QTY </th>
                                                    <th class="numeric"> Current QTY </th>
                                                    <th class="numeric"> Publish </th>
                                                    <th class="numeric"> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $n = 1;

                                                function getBrandNameById($data, $id) {
                                                    foreach ($data as $data_item) {
                                                        $bid = $data_item->iid;
                                                        if ($bid == $id) {
                                                            return $data_item->brand_name;
                                                        }
                                                    }
                                                }

                                                function getVolumeById($data, $id) {
                                                    foreach ($data as $data_item) {
                                                        $bid = $data_item->iid;
                                                        if ($bid == $id) {
                                                            return $data_item->volume;
                                                        }
                                                    }
                                                }

                                                if (sizeof($liquors) > 0) {
                                                    foreach ($liquors as $liquor) {
                                                        $brand_id = $liquor->brand;
                                                        $volume_id = $liquor->volume;


                                                        $brand_name = getBrandNameById($brands, $brand_id);
                                                        $volume_name = getVolumeById($volumes, $volume_id);
                                                        ?>
                                                        <tr>
                                                            <td class="text-left"> <?php echo $n; ?> </td>
                                                            <td class="numeric text-right"> <?php echo $liquor->liq_name; ?> </td>
                                                            <td> <?php echo $brand_name; ?> </td>
                                                            <td> <?php echo $volume_name; ?> </td>
                                                            <td class="numeric text-right"> <?php echo number_format((float) $liquor->buy_price, 2, '.', ''); ?> </td>
                                                            <td class="numeric text-right"> <?php echo number_format((float) $liquor->sell_price, 2, '.', '') ?> </td>
                                                            <td class="numeric text-right"> <?php echo number_format((float) $liquor->discount, 2, '.', '') ?> </td>
                                                            <td class="numeric text-right"> <?php echo $liquor->purchase_date; ?> </td>
                                                            <td class="numeric text-right"> <?php echo $liquor->liq_qty; ?> </td>
                                                            <td class="numeric text-right"></td>
                                                            <td class="numeric text-center"> <?php
                                                                if ($liquor->publish == 1) {
                                                                    echo "Yes";
                                                                } else {
                                                                    echo "No";
                                                                }
                                                                ?> </td>
                                                            <td class="numeric text-center">
                                                                <a class="btn btn-sm btn-success text-center" style="text-align:center;visibility:hidden;display:none"  title="Edit" href="<?php echo base_url() ?>Beverage/edit_foods?id=<?php echo $liquor->iid; ?>" > <i class="fa fa-edit" style="margin-right: 10px;"></i> </a>
                                                                <a class="btn btn-sm btn-danger text-center"  style="text-align:center;"  title="Delete" href="<?php echo base_url() ?>Liquer/delete_liq?id=<?php echo $liquor->iid; ?>"  onclick="return confirm('Are You Sure?');"> <i class="fa fa-times" style="margin-right: 10px;"></i> </a>
                                                                <button class="btn btn-sm btn-success text-center" id="<?php echo $liquor->iid; ?>" onclick="editdata(this);"><i class="fa fa-edit" style="margin-right: 10px;"></i></button>
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
</div>
<div class="modal fade modal-md" id="add_new_liquer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

            <form id="form" name="form" action="<?php echo base_url('Liquer/add_edit_liquor'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <label>Add New Mobile Number</label> -->
                        <div class="input-icon" style="margin-bottom: 5px;">
                            <input type="hidden" id="data_id" name="data_id"/>
                            <input type="hidden" id="data_type" name="data_type"/>
                            <i class="fa fa-user-secret"></i>
                            <select class="form-control" id="liq_brand" name="liq_brand" placeholder="Liquer Brand" required>
                                <option value="0" selected>-Select A Brand-</option>
                                <?php
                                if (sizeof($brands) > 0) {

                                    foreach ($brands as $brand) {
                                        echo '<option value="' . $brand->iid . '">' . $brand->brand_name . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-hourglass-half"></i>
                            <select class="form-control" id="liq_volume" name="liq_volume" placeholder="Liquer Volume" required onchange="getShots(this)">
                                <option value="0" selected >-Select A Volume-</option>
                                <?php
                                if (sizeof($volumes) > 0) {

                                    foreach ($volumes as $volume) {
                                        echo '<option value="' . $volume->iid . '">' . $volume->volume . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-glass"></i>
                            <input type="text" class="form-control" id="liq_name" name="liq_name" placeholder="Liquer Name" required>
                        </div>

                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-credit-card"></i>
                            <input type="number" class="form-control" id="liq_quantity" name="liq_quantity" placeholder="Quanlity" required onchange="recalculateQTY()">
                        </div>

                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-calendar"></i>
                            <input type="date" class="form-control" id="liq_buy_date" name="liq_buy_date" placeholder="Purchase Date" required>
                        </div>

                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-money"></i>
                            <input type="number" class="form-control" id="liq_buy_price" name="liq_buy_price"  placeholder="Buying Price" required>
                        </div>
                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-dollar"></i>
                            <input type="number" class="form-control" id="liq_sel_price" name="liq_sel_price"   placeholder="Seling Price" required>
                        </div>
                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-cart-arrow-down"></i>
                            <input type="number" class="form-control" id="liq_discount" name="liq_discount" placeholder="Discount">
                        </div>
                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-newspaper-o"></i>
                            <input type="text" class="form-control" id="liq_discription" name="liq_discription" placeholder="Description">
                        </div>

                        <div style="background-color:#eee;padding:10px;">
                            <b>Shots</b>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="input-icon" style="margin-bottom: 5px;">
                                        <i class="fa fa-glass"></i>
                                        <input type="text" class="form-control" id="liq_no_25" name="liq_no_25" placeholder="No. of 25ML Shots" readonly="" required="">
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="input-icon" style="margin-bottom: 5px;">
                                        <i class="fa fa-dollar"></i>
                                        <input type="text" class="form-control" id="liq_25_price" name="liq_25_price" placeholder="25ML Shots Price" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="input-icon" style="margin-bottom: 5px;">
                                        <i class="fa fa-glass"></i>
                                        <input type="text" class="form-control" id="liq_no_50" name="liq_no_50" placeholder="No. of 50ML Shots" readonly="" required="">
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="input-icon" style="margin-bottom: 5px;">
                                        <i class="fa fa-dollar"></i>
                                        <input type="text" class="form-control" id="liq_50_price" name="liq_50_price" placeholder="50ML Shot Price" required="">
                                    </div>
                                </div>
                            </div>
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
        $("#liq_brand").show();
        $("#liq_volume").show();
        $("#liq_name").show();
        $("#liq_discription").show();

        $('#liq_brand').prop('readonly', 'readonly');
        $('#liq_volume').prop('readonly', 'readonly');

        $("#liq_quantity").hide();
        $("#liq_buy_date").hide();
        $("#liq_buy_price").hide();
        $("#liq_sel_price").hide();
        $("#liq_discount").hide();

    }

    function showDetailsALL() {
        hideButtons();
        $("#liq_brand").show();
        $("#liq_volume").show();
        $("#liq_name").show();
        $("#liq_discription").show();
        $("#liq_quantity").show();
        $("#liq_buy_date").show();
        $("#liq_buy_price").show();
        $("#liq_sel_price").show();
        $("#liq_discount").show();

        $('#liq_brand').removeAttr('disabled');
        $('#liq_volume').removeAttr('disabled');
    }

    function showStock() {
        $("#liq_brand").hide();
        $("#liq_volume").hide();
        $("#liq_name").hide();
        $("#liq_discription").hide();

        $("#liq_quantity").show();
        $("#liq_buy_date").show();
        $("#liq_buy_price").show();
        $("#liq_sel_price").show();
        $("#liq_discount").show();
    }



    function editdata(element) {
        showButtons();
        showDetailsEdit();

        var id = element.id;
        $.post('<?php echo base_url() ?>Liquer/get_liq_by_id?id=' + id,
                function (returnedData) {
                    //alert(returnedData);
                    if (returnedData != "NO_DATA") {
                        var obj = JSON.parse(returnedData);
                        var iid = (obj.iid);
                        var brand = (obj.brand);
                        var volume = (obj.volume);
                        var liq_name = (obj.liq_name);
                        var liq_qty = (obj.liq_qty);
                        var purchase_date = (obj.purchase_date);
                        var buy_price = (obj.buy_price);
                        var sell_price = (obj.sell_price);
                        var discount = (obj.discount);
                        var description = (obj.description);

                        var no_of_25_shot = (obj.no_of_25_shot);
                        var price_25_shot = (obj.price_25_shot);
                        var no_of_50_shot = (obj.no_of_50_shot);
                        var price_50_shot = (obj.price_50_shot);

                        openModal("EDIT", [iid, brand, volume, liq_name, liq_qty, purchase_date, buy_price, sell_price, discount, description, no_of_25_shot, price_25_shot, no_of_50_shot, price_50_shot]);
                    } else {
                        alert("NO_DATA");
                    }

                });
    }

    function openModal(mode, data) {
        if (mode == "EDIT") {
            $("#model_title").text("Edit Liquor Details");
            $("#data_id").val(data[0]);
            $("#data_type").val("EDIT");

            $("#liq_brand").val(data[1]);
            $("#liq_volume").val(data[2]);
            $("#liq_name").val(data[3]);
            $("#liq_quantity").val(data[4]);
            $("#liq_buy_date").val(data[5]);
            $("#liq_buy_price").val(data[6]);
            $("#liq_sel_price").val(data[7]);
            $("#liq_discount").val(data[8]);
            $("#liq_discription").val(data[9]);

            $("#liq_no_25").val(data[10]);
            $("#liq_25_price").val(data[11]);
            $("#liq_no_50").val(data[12]);
            $("#liq_50_price").val(data[13]);


            $('#add_new_liquer').modal('show');
        } else if (mode == "ADD") {
            showDetailsALL();

            $("#model_title").text("Add New Liquor Details");
            $("#data_id").val("");
            $("#data_type").val("ADD");

            $("#liq_name").val("");
            $("#liq_quantity").val("");
            $("#liq_buy_date").val("");
            $("#liq_buy_price").val("");
            $("#liq_sel_price").val("");
            $("#liq_discount").val("");
            $("#liq_discription").val("");
            $("#liq_no_25").val("");
            $("#liq_25_price").val("");
            $("#liq_no_50").val("");
            $("#liq_50_price").val("");

            $('#add_new_liquer').modal('show');
        }
    }

    function getShots(element) {
        var id = element.value;
        $.post('<?php echo base_url() ?>Liquer/get_shots_by_id?id=' + id,
                function (returnedData) {
                    var obj = JSON.parse(returnedData);
                    var no_of_25_shot = (obj[0].no_of_25_shot);
                    var no_of_50_shot = (obj[0].no_of_50_shot);
                    $("#liq_no_25").val(no_of_25_shot);
                    $("#liq_no_50").val(no_of_50_shot);

                    $("#liq_no_25").attr("data-qty", no_of_25_shot);
                    $("#liq_no_50").attr("data-qty", no_of_50_shot);
                });
    }

    function recalculateQTY() {
        var qty = $("#liq_quantity").val();
        var qty_25 = $("#liq_no_25").attr("data-qty");
        var qty_50 = $("#liq_no_50").attr("data-qty")

        var new_25 = qty_25 * qty;
        var new_50 = qty_50 * qty;

        $("#liq_no_25").val(new_25);
        $("#liq_no_50").val(new_50);

    }

</script>

