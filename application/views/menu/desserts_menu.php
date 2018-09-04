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
                            <h1>Desserts</h1>
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
                                <span>Dessert Details</span>
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
                                     <button type="button" class="btn blue" onclick="openModal('ADD',[]);" style="margin-bottom: 10px;">
                                        <i class="fa fa-apple"></i>  Add New Dessert </button>

                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-apple"></i>Dessert Details </div>
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
                                                    <th class="numeric"> Price </th>
                                                    <th class="numeric"> Discount </th>
                                                    <th class="numeric"> Publish </th>
                                                    <th class="numeric"> Action </th>
                                                </tr>
                                                </thead>
                                                 <tbody>
                                                    <?php
                                                    $n = 1;
                                                    if (sizeof($desserts_detail) > 0) {

                                                        foreach ($desserts_detail as $desserts_result) {
                                                            ?>
                                                            <tr>
                                                                <td class="text-left"> <?php echo $n; ?> </td>
                                                                <td> <?php echo $desserts_result->dessert_name; ?> </td>
                                                                <td class="numeric text-right"> <?php echo number_format((float) $desserts_result->dessert_price, 2, '.', ''); ?> </td>
                                                                <td class="numeric text-right"> <?php echo number_format((float) $desserts_result->dessert_discount, 2, '.', '') ?> </td>
                                                                <td class="numeric text-center"> <?php
                                                                    if ($desserts_result->publish == 1) {
                                                                        echo "Yes";
                                                                    } else {
                                                                        echo "No";
                                                                    }
                                                                    ?> </td>
                                                                <td class="numeric text-center">
                                                                    <a class="btn btn-sm btn-success text-center" style="text-align:center;visibility:hidden;display:none"  title="Edit" href="<?php echo base_url() ?>Dessert/edit_foods?id=<?php echo $desserts_result->dessert_id; ?>" > <i class="fa fa-edit" style="margin-right: 10px;"></i> </a>
                                                                    <a class="btn btn-sm btn-danger text-center"  style="text-align:center;"  title="Delete" href="<?php echo base_url() ?>Dessert/delete_dessert?id=<?php echo $desserts_result->dessert_id; ?>"  onclick="return confirm('Are You Sure?');"> <i class="fa fa-times" style="margin-right: 10px;"></i> </a>
                                                                    <button class="btn btn-sm btn-success text-center" id="<?php echo $desserts_result->dessert_id; ?>" onclick="editdata(this);"><i class="fa fa-edit" style="margin-right: 10px;"></i></button>
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

       <div class="modal fade modal-md" id="add_new_dessert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="model_title"></h4>
            </div>
            <form id="form" name="form" action="<?php echo base_url('Dessert/add_edit_dessert'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <label>Add New Mobile Number</label> -->
                        <input type="hidden" id="data_id" name="data_id"/>
                        <input type="hidden" id="data_type" name="data_type"/>
                        <div class="input-icon" style="margin-bottom: 5px;">
                            <i class="fa fa-apple"></i>
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
        $.post('<?php echo base_url() ?>Dessert/get_dessert_by_id?id=' + id,
                function (returnedData) {
                    if(returnedData!="NO_DATA"){
                        var obj = JSON.parse(returnedData);
                        var food_id = (obj.dessert_id);
                        var food_name = (obj.dessert_name);
                        var food_description = (obj.dessert_descripton);
                        var food_price = (obj.dessert_price);
                        var food_discount = (obj.dessert_discount);
                        openModal("EDIT",[food_id,food_name,food_price,food_discount,food_description,]);
                   }else{
                     alert("NO_DATA");    
                   }

                });
    }
    
    function openModal(mode,data) {
       if(mode=="EDIT"){
            $("#model_title").text("Edit Dessert Details");
            $("#data_id").val(data[0]);
            $("#data_type").val("EDIT");
            $("#product_name").val(data[1]);
            $("#p_sel_price").val(data[2]);
            $("#p_discount").val(data[3]);
            $("#p_discription").val(data[4]);
            $('#add_new_dessert').modal('show');
       }else  if(mode=="ADD"){
           $("#model_title").text("Add New Dessert Details");
            $("#data_id").val("");
            $("#data_type").val("ADD");
            $("#product_name").val("");
            $("#p_sel_price").val("");
            $("#p_discount").val("");
            $("#p_discription").val("");
            $('#add_new_dessert').modal('show');
       }
    }
</script>