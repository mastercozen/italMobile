<br>
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
                </div>
                <div class="container">
                    
                    <br><br>
                    <?php foreach ($customers as $customer) { ?>  
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                           <div class="panel panel-warning">
                                <div class="panel-heading">
                                    Email
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Email</label>
                                            <input type="text" class="form-control" placeholder="Enter your Email" value="<?php echo $customer->email; ?>" id="email-fld" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    Change Password
                                </div>
                                <div class="panel-body">
                                    <form action="<?php echo base_url()?>profile/change_password?id=<?php echo $customer->customer_id; ?>" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Enter Old Password</label>
                                                <input type="password" name="old-password" class="form-control" placeholder="Enter your password" disabled id="password-fld"><br>
                                            </div>
                                            <div class="col-md-12">
                                                <label>New Password</label>
                                                <input type="password" name="new-password" class="form-control" placeholder="Enter New password" disabled id="change-password-fld"><br>
                                            </div>
                                             <div class="col-md-12">
                                                <label>Confirm Password</label>
                                                <input type="password" name="confirm-new-password" class="form-control" placeholder="Confirm New password" disabled id="confirm-password-fld">
                                            </div>
                                            <div class="col-md-12"><br>
                                                <a class="btn btn-default btn-sm" id="change-password-btn">Edit</a>
                                                <a href="<?php echo base_url()?>profile?id=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-sm" id="cancel-password-btn">Cancel</a>
                                                <button type="submit" class="btn btn-primary btn-sm" id="submit-password-btn">Change Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                           <div class="panel panel-warning">
                                <div class="panel-heading">
                                    Profile
                                </div>
                                <div class="panel-body">
                                    <form action="<?php echo base_url()?>profile/change_profile_info?id=<?php echo $customer->customer_id; ?>" method="post">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>First name</label>
                                                <input type="text" name="first-name" class="form-control" placeholder="Enter your First name" value="<?php echo $customer->first_name; ?>" disabled id="change-firstname-fld">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Middle name</label>
                                                <input type="text" name="middle-name" class="form-control" placeholder="Enter your Middle name" value="<?php echo $customer->middle_name; ?>" disabled id="change-middlename-fld">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Last name</label>
                                                <input type="text" name="last-name" class="form-control" placeholder="Enter your Last name" value="<?php echo $customer->last_name; ?>" disabled id="change-lastname-fld">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Gender</label>
                                                <select name="gender" class="form-control" disabled id="change-gender-fld">
                                                    <option value="" <?php if($customer->gender=="")echo "selected" ?>>Select Gender</option>
                                                    <option value="Male"   <?php if($customer->gender=="Male")echo "selected" ?>>Male</option>
                                                    <option value="Female" <?php if($customer->gender=="Female")echo "selected" ?>>Female</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Contact number</label>
                                                <input type="text" name="contact" class="form-control" placeholder="Enter your Contact number" value="<?php echo $customer->contact; ?>" disabled id="change-contact-fld">
                                            </div>
                                            <div class="col-md-12"><br>
                                                <a class="btn btn-default btn-sm" id="change-info-btn">Edit</a>
                                                <a href="<?php echo base_url()?>profile?id=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-sm" id="cancel-info-btn">Cancel</a>
                                                <button type="submit" class="btn btn-primary btn-sm" id="submit-info-btn">Change Info</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                           <div class="panel panel-warning">
                                <div class="panel-heading">
                                    Address Book
                                </div>
                                <div class="panel-body">
                                    <button class="btn btn-warning btn-sm"  data-target="#add-address-book" data-toggle="modal">Add New Address</button><br><br>
                                    
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Address</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($addresses as $address) { ?>
                                                <tr>
                                                    <td><?php echo $address->street.", ".$address->city.", ".$address->state." ".$address->zip.", ".$address->country ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                                Actions
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#" onclick="edit_address('<?php echo $address->address_id ?>')"><span class="glyphicon glyphicon-edit"></span> Edit</a></li>
                                                                <li><a href="#" onclick="delete_address('<?php echo $address->address_id ?>');"><span class="glyphicon glyphicon-trash"></span> Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <a href="<?php echo base_url() ?>shop">Back to Shop</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>  
                    
                </div>

                <script>
                    $(document).ready(function() {
                        $("#cancel-password-btn").hide();
                        $("#submit-password-btn").hide();
                        $("#cancel-info-btn").hide();
                        $("#submit-info-btn").hide();
                        
                        $("#change-password-btn").click(function() {
                            $("#change-password-btn").hide();
                            $("#change-info-btn").hide();
                            $("#password-fld").removeAttr('disabled');
                            $("#change-password-fld").removeAttr('disabled');
                            $("#confirm-password-fld").removeAttr('disabled');
                            
                            $("#cancel-password-btn").show(); 
                            $("#submit-password-btn").show();
                        });
                        
                        $("#change-info-btn").click(function() {
                            $("#change-password-btn").hide();
                            $("#change-info-btn").hide();
                            $("#change-firstname-fld").removeAttr('disabled');
                            $("#change-middlename-fld").removeAttr('disabled');
                            $("#change-lastname-fld").removeAttr('disabled');
                            $("#change-gender-fld").removeAttr('disabled');
                            $("#change-contact-fld").removeAttr('disabled');
                            
                            $("#cancel-info-btn").show(); 
                            $("#submit-info-btn").show();
      
                        });
                       
                        
                    });
                </script>
                <script>
                    function edit_address(id){
                    	$.LoadingOverlay("show");
                        $.ajax({
                            url : "<?php echo base_url('profile/ajax_view_address_by_id')?>/"+id,
                            type: "POST",
                            success: function(data){
                                var json = JSON.parse(data);
                                //var product_id=();
                                
                                $('#ajax-id').val(json['result'][0]['address_id']);
                                $('#ajax-street').val(json['result'][0]['street']);
                                $('#ajax-city').val(json['result'][0]['city']);
                                $('#ajax-state').val(json['result'][0]['state']);
                                $('#ajax-zip').val(json['result'][0]['zip']);
                                $('#ajax-country').val(json['result'][0]['country']);
                                
                                $.LoadingOverlay("hide");
                                $('#edit-address-book').modal('show');
                                
                            },
                            error: function (jqXHR, textStatus, errorThrown){
                                alert('Error !');
                            }
                        });
                    }
                </script>
                <script>
                    function delete_address(id) {
                        bootbox.confirm("Are you sure you want to delete this address?", function(result) {
                            if (result)
                                window.location = "<?php echo base_url() . 'profile/delete_address?aid=' ?>" + id + "&uid=<?php echo $this->input->get('id')?>";
                        });
                    }
                </script>