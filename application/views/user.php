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
                            <h1>User</h1>
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
                                <span>User Details</span>
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
                                    <button type="button" class="btn blue" data-toggle="modal" data-target="#add_new_user" style="margin-bottom: 10px;">
                                       <i class="fa fa-user-plus"></i> Add New User </button>

                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-user"></i>User Details Dashboard</div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"> </a>
                                          
                                            </div>
                                        </div>
                                        <div class="portlet-body flip-scroll">
                                            <table class="table table-bordered table-striped table-condensed flip-content">
                                                <thead class="flip-content">
                                                <tr>
                                                    <th> # </th>
                                                    <th> User Name </th>
                                                    <th class="numeric"> First Name </th>
                                                    <th class="numeric"> Last Name </th>
                                                    <th class="numeric"> Contact No. </th>
                                                    <th class="numeric"> Designation </th>
                                                    <th class="numeric"> Status </th>
                                                    <th class="numeric"> Action </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $n=1;
                                                foreach($user as $row){
                                                ?>
                                                <tr>
                                                    <td> <?php echo $n; ?> </td>
                                                    <td> <?php echo  $row->user_login_username; ?> </td>
                                                    <td class="numeric"> <?php echo  $row->user_fname; ?> </td>
                                                    <td class="numeric"> <?php echo  $row->user_lname; ?> </td>
                                                    <td class="numeric"> <?php echo  $row->user_mobile; ?> </td>
                                                    <td class="numeric"> <?php echo  $row->group_name; ?> </td>
                                                    <td class="numeric text-center"> <?php
                                                                    if ($row->publish == 1) {
                                                                        echo "<span class='badge bg-green'>ACTIVE</span>";
                                                                    } else {
                                                                         echo "<span class='badge bg-red'>INACTIVE</span>";
                                                                    }
                                                                    ?> 
                                                    </td>
                                                    <td class="numeric">
                                                       
                                                                    <a class="btn btn-sm btn-danger text-center"  style="text-align:center;"  title="Delete" href="<?php echo base_url() ?>User/remove_user?id=<?php echo $row->user_id; ?>"  onclick="return confirm('Are You Sure?');"> <i class="fa fa-trash" style="margin-right: 10px;"></i> </a>
                                                                    <button class="btn btn-sm btn-success text-center" id="<?php echo $row->user_id; ?>" onclick="editdata(this);"><i class="fa fa-edit" style="margin-right: 10px;"></i></button>
                                                    </td>
                                                </tr>
                                                <?php $n++; } ?>

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
        </div>  

        <div class="modal fade modal-md" id="add_new_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New User</h4>
                    </div>
                    <form id="form" name="form" action="<?php echo base_url('User/add_new_user');?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <!-- <label>Add New Mobile Number</label> -->
                                <div class="input-icon" style="margin-bottom: 5px;">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="first_name" id="first_name" pattern="[A-Za-z]{1,32}" placeholder="First Name" required>
                                </div>
                                <div class="input-icon" style="margin-bottom: 5px;">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" pattern="[A-Za-z]{1,32}" required>
                                </div>
                                <div class="input-icon" style="margin-bottom: 5px;">
                                    <i class="fa fa-credit-card"></i>
                                    <input type="text" class="form-control" name="nic" id="nic" placeholder="NIC Number" required>
                                </div>
                                <div class="input-icon" style="margin-bottom: 5px;">
                                    <i class="fa fa-mobile"></i>
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number" pattern="[0-9]{10}" required="">
                                </div>
                                <div class="input-icon" style="margin-bottom: 5px;">
                                    <i class="fa fa-user-secret"></i>
                                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name" pattern="[A-Za-z]{1,32}" required>
                                </div>
                                 <div class="input-icon" style="margin-bottom: 5px;">
                                    <i class="fa fa-users"></i>
                                
                                    <select class="form-control" name="user_unit">
                                         <option value="0" selected>-Select A Group-</option>
                                        <?php foreach($user_unit as $user_unit_result){ ?>
                                        <option value="<?php echo $user_unit_result->group_id; ?>"><?php echo $user_unit_result->group_name; ?></option>
                                        <?php } ?>
                                    </select>
                                
                                 </div>
                                <div class="input-icon" style="margin-bottom: 5px;">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password [UpperCase, LowerCase,Number and 6 or more characters]" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                                </div>
                                <div class="input-icon" style="margin-bottom: 5px;">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                                </div>


                            </div>
                        </div>

                        <div id="frmmsgNumber">  </div>

                        <div class="modal-footer">
                            <input name="submit" type="submit" value="Submit" class="btn green" id="myBtn">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            <div id="tempmsg"></div>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <script>


            var password = document.getElementById("password")
                , confirm_password = document.getElementById("confirm_password");

            function validatePassword(){
                if(password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Passwords Don't Match");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        </script>
