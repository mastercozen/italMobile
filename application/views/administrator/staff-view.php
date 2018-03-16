
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Staff Management</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> 
                        <?php echo validation_errors(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add-staff-modal">Add Staff</button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-striped table-hover" cellspacing="0" width="100%"> 
                    <thead>
                        <tr>
                            <th>Staff ID</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($staffs as $staff) { ?>
                        <?php 
                            if($staff->status=="Active")
                                echo "<tr class='success'>" ;
                            else
                                echo "<tr class='danger'>" ;
                        ?>
                            <td><?php echo $staff->staff_id ?></td>
                            <td><?php echo $staff->username ?></td>
                            <td><?php echo $staff->first_name ?> <?php echo $staff->last_name ?></td>
                            <td><?php echo $staff->status ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a data-toggle="modal" href="#" id="editBtn" onclick="edit_staff('<?php echo $staff->staff_id ?>')"><span class="glyphicon glyphicon-edit"></span> Edit Info</a></li>
                                        <li><a data-toggle="modal" href="#" id="editBtn" onclick="change_staff_username('<?php echo $staff->staff_id ?>')"><span class="glyphicon glyphicon-user"></span> Change Username</a></li>
                                        <li><a data-toggle="modal" href="#change-password-modal" id="editBtn" onclick="change_staff_password('<?php echo $staff->staff_id ?>')"><span class="glyphicon glyphicon-lock"></span> Change Password</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function edit_staff(id) {
        $.LoadingOverlay("show");
        $.ajax({
            url: "<?php echo base_url('administrator_page/ajax_view_staff_by_id') ?>/" + id,
            type: "POST",
            success: function(data) {
                var json = JSON.parse(data);
                var staff_id = (json['result'][0]['staff_id']);
                var first_name = (json['result'][0]['first_name']);
                var middle_name = (json['result'][0]['middle_name']);
                var last_name = (json['result'][0]['last_name']);
                var status = (json['result'][0]['status']);


                if (status === "Active") {
                    $('#option-active').attr('selected', 'selected')
                }
                if (status === "Not Active") {
                    $('#option-not-active').attr('selected', 'selected')
                }

                $("#fake-id").val(staff_id);
                $("#fname").val(first_name);
                $("#mname").val(middle_name);
                $("#lname").val(last_name);
                
                $.LoadingOverlay("hide");
                $('#edit-staff-modal').modal('show');

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error !');
            }
        });
    }
    function change_staff_username(id) {
        $.LoadingOverlay("show");
        $.ajax({
            url: "<?php echo base_url('administrator_page/ajax_view_staff_by_id') ?>/" + id,
            type: "POST",
            success: function(data) {
                var json = JSON.parse(data);
                var staff_id = (json['result'][0]['staff_id']);
                var username = (json['result'][0]['username']);

                $("#fake-staff-id-2").val(staff_id);
                $("#current-username").val(username);
                
                $.LoadingOverlay("hide");
                $('#change-username-modal').modal('show');


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error !');
            }
        });
    }
    function change_staff_password(id) {
        $.ajax({
            url: "<?php echo base_url('administrator_page/ajax_view_staff_by_id') ?>/" + id,
            type: "POST",
            success: function(data) {
                var json = JSON.parse(data);
                var staff_id = (json['result'][0]['staff_id']);

                $("#fake-staff-id").val(staff_id);
                
                


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error !');
            }
        });
    }
</script>

<!--ADD Staff MODAL-->
<div class="modal fade madal" id="add-staff-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Staff</h4>
            </div>
            <form method="post" action="<?php echo base_url() . 'administrator_page/add_staff' ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?php echo set_value('username');?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Desired Password" value="<?php echo set_value('password');?>">
                    </div>
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" class="form-control" id="first-name" name="first-name" placeholder="Enter First name" value="<?php echo set_value('first-name');?>">
                    </div>
                    <div class="form-group">
                        <label>Middle name</label>
                        <input type="text" class="form-control" id="middle-name" name="middle-name" placeholder="Enter Middle name" value="<?php echo set_value('middle-name');?>">
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Enter Last name" value="<?php echo set_value('last-name');?>">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="name" name="status">
                            <option value="Active">Active</option>
                            <option value="Not Active">Not Active</option>
                        </select>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Staff</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Edit staff MODAL-->
<div class="modal fade modal" id="edit-staff-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Staff</h4>
            </div>
            <form method="post" action="<?php echo base_url() . 'administrator_page/update_staff' ?>">
                <div class="modal-body">
                    <input type="text" id="fake-id" name="staff-id" readonly hidden>
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" class="form-control" id="fname" name="first-name" placeholder="Enter First name" value="">
                    </div>
                    <div class="form-group">
                        <label>Middle name</label>
                        <input type="text" class="form-control" id="mname" name="middle-name" placeholder="Enter Middle name" value="">
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control" id="lname" name="last-name" placeholder="Enter Last name" value="">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="edit-status" name="status">
                            <option value="Active" id="option-active">Active</option>
                            <option value="Not Active" id="option-not-active">Not Active</option>
                        </select>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Staff</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--change Username MODAL-->
<div class="modal fade modal" id="change-username-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Staff Username</h4>
            </div>
            <form method="post" action="<?php echo base_url() . 'administrator_page/update_staff_username' ?>">
                <div class="modal-body">
                    <input type="text" id="fake-staff-id-2" name="staff-id" hidden readonly>
                    <div class="form-group">
                        <label>Current Username</label>
                        <input type="text" class="form-control" id="current-username" readonly>
                    </div>
                    <div class="form-group">
                        <label>New Username</label>
                        <input type="text" class="form-control" name="new-username" value="" placeholder="Enter new username">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update username</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--change password MODAL-->
<div class="modal fade modal" id="change-password-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Staff Password</h4>
            </div>
            <form method="post" action="<?php echo base_url() . 'administrator_page/update_staff_password' ?>">
                <div class="modal-body">
                    <input type="text" id="fake-staff-id" name="staff-id" hidden readonly>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="Enter New Password"> 
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm New Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update password</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>