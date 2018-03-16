

<div class="content-wrapper">
    <div class="container-fluid">
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
        <div class="page-header">
            <h3>Administrator Settings</h3>
        </div>
        <div class="row">
            <div class="col-md-3">
                <form action="<?php echo base_url() ?>Administrator_page/update_admin_username" method="post">
                    <?php foreach ($infos as $info) { ?>  
                        <div class="form-group" id="nothing" hidden>
                            <input type="text" class="form-control" id="asd" name="admin-id" value="<?php echo $info->admin_id; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Change Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $info->username; ?>" readonly>
                        </div>
                        <div class="form-group" id="update-username-btn" hidden>
                            <input type="submit" class="btn btn-primary btn-sm" value="Update">
                            <a href="<?php echo base_url() ?>administrator_page/administrator_settings" class="btn btn-danger btn-sm">Cancel</a>
                        </div>
                        <div class="form-group" id="edit-username-btn">
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        </div>
                    <?php } ?>
                </form>
                <form action="<?php echo base_url() ?>Administrator_page/update_admin_password" method="post">
                    <?php foreach ($infos as $info) { ?>  
                        <div class="form-group" id="nothing" hidden>
                            <input type="text" class="form-control" id="asd" name="admin-id" value="<?php echo $info->admin_id; ?>" readonly>
                        </div>
                        <div class="form-group" id="old-password-input" hidden>
                            <label>Enter Old Password</label>
                            <input type="password" class="form-control" id="oldpassword" name="oldpassword" value="" placeholder="Enter Old Password" readonly> 
                        </div>
                        <div class="form-group">
                            <label>Change Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="" placeholder="Enter New Password"  readonly> 
                        </div>
                        <div class="form-group" id="confirm-password-input" hidden>
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm New Password" readonly>
                        </div>
                        <div class="form-group" id="update-password-btn" hidden>
                            <input type="submit" class="btn btn-primary btn-sm" value="Update">
                            <a href="<?php echo base_url() ?>administrator_page/administrator_settings" class="btn btn-danger btn-sm">Cancel</a>
                        </div>
                        <div class="form-group" id="edit-password-btn">
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
        <div class="page-header">
        </div>
        <div class="row">
            <div class="col-md-3">
                <form action="<?php echo base_url() ?>Administrator_page/update_admin_info" method="post">
                    <?php foreach ($infos as $info) { ?>  
                        <div class="form-group" id="nothing" hidden>
                            <input type="text" class="form-control" id="asd" name="admin-id" value="<?php echo $info->admin_id; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>First name</label>
                            <input type="text" class="form-control" id="fname" name="first-name" value="<?php echo $info->first_name; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Middle name</label>
                            <input type="text" class="form-control" id="mname" name="middle-name"value="<?php echo $info->middle_name; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Last name</label>
                            <input type="text" class="form-control" id="lname" name="last-name"  value="<?php echo $info->last_name; ?>" readonly>
                        </div>
                        <div class="form-group" id="update-info-btn" hidden>
                            <input type="submit" class="btn btn-primary btn-sm" value="Update">
                            <a href="<?php echo base_url() ?>administrator_page/administrator_settings" class="btn btn-danger btn-sm">Cancel</a>
                        </div>
                        <div class="form-group" id="edit-info-btn">
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>
        $(document).ready(function() {
            $("#edit-info-btn").click(function() {
                $("#update-info-btn").show();
                $("#edit-info-btn").hide();
                $("#edit-username-btn").hide();
                $("#edit-password-btn").hide();

                $("#fname").removeAttr('readonly');
                $("#mname").removeAttr('readonly');
                $("#lname").removeAttr('readonly');

            });

            $("#edit-username-btn").click(function() {
                $("#update-username-btn").show();
                $("#edit-username-btn").hide();
                $("#edit-password-btn").hide();
                $("#edit-info-btn").hide();

                $("#username").removeAttr('readonly');

            });

            $("#edit-password-btn").click(function() {
                $("#update-password-btn").show();
                $("#confirm-password-input").show();
                $("#old-password-input").show();
                $("#edit-password-btn").hide();
                $("#edit-info-btn").hide();
                $("#edit-username-btn").hide();

                $("#oldpassword").removeAttr('readonly');
                $("#password").removeAttr('readonly');
                $("#confirm-password").removeAttr('readonly');

            });
        });

    </script>