<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Customer Management</h3>
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
        <br>
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-striped table-hover table-condensed" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>First name</th>
                            <th>Middle name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($customers as $customer) { ?>
                        <?php 
                            if($customer->status==1)
                                echo "<tr class='success'>" ;
                            else
                                echo "<tr class='danger'>" ;
                        ?>
                        
                            
                            <td><?php echo $customer->customer_id ?></td>
                            <td><?php echo $customer->first_name ?></td>
                            <td><?php echo $customer->middle_name ?></td>
                            <td><?php echo $customer->last_name ?></td>
                            <td><?php echo $customer->email ?></td>
                            <td><?php echo $customer->contact ?></td>
                            <td><?php echo $customer->gender ?></td>
                            <td>
                                <?php 
                                    if($customer->status==1)
                                        echo "Active" ;
                                    else
                                        echo "Not Active";
                                ?>
                            </td>
                            <td>
                                <?php
                                    if($customer->status==1)
                                        echo '<a href="#" class="btn btn-danger btn-sm"  onclick="deactivate_user('.$customer->customer_id.');">Deactivate</a> ';
                                    else
                                        echo '<a href="#" class="btn btn-primary btn-sm" onclick="activate_user('.$customer->customer_id.');">Activate</a> ';
                                ?>
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
    function deactivate_user(id) {
        bootbox.confirm("Are you sure you want to deactivate this account?", function(result) {
            if (result)
                window.location = "<?php echo base_url() . 'staff_page/deactivate_customer?id=' ?>" + id;
        });
    }
    function activate_user(id) {
        bootbox.confirm("Are you sure you want to activate this account?", function(result) {
            if (result)
                window.location = "<?php echo base_url() . 'staff_page/activate_customer?id=' ?>" + id;
        });
    }
</script>
