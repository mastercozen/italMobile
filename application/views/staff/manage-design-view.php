<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Manage Contest</h3>
        </div>
        <?php if($contest):?>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url() ?>staff_page/manage_design">All</a></li>
                    <li><a href="<?php echo base_url() ?>staff_page/manage_design_pending">Pending Designs</a></li>
                    <li><a href="<?php echo base_url() ?>staff_page/manage_design_approved">Approved Designs</a></li>
                </ul>
            </div>
        </nav>
        <?php endif ?>
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
                <div class="dropdown" style="float:left">
                    <button class="btn btn-warning btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Settings
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <?php if(!$contest):?>
                        <li><a href="#new-contest-modal" data-toggle="modal">Start New Contest</a></li>
                        <?php endif; ?>
                        <?php if($contest):?>
                        <li><a href="#" onclick="end_contest()">End the Contest</a></li>
                        <?php endif; ?>
                    </ul>
                </div>&nbsp;
                <a href="<?php echo base_url()?>staff_page/contest_history"class="btn btn-primary btn-sm">Previous Contests</a>
<a href="<?php echo base_url()?>staff_page/manage_customization_logo"class="btn btn-danger btn-sm">Customization Logos</a>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <?php 
                    if(!$contest){
                        echo "<b>Contest Module:</b> Deactivated";
                    }
                ?>
                <?php foreach($contest as $x):?>
                    <b>Contest Module:</b> <?php echo $x->status?><br>
                    <b>Name:</b> <?php echo $x->name?><br>
                    <b>Start Date:</b> <?php echo date('F d, Y',strtotime($x->start_date));?><br>
                    <b>End Date:</b> <?php echo date('F d, Y',strtotime($x->end_date));?><br>
                    <?php echo $x->z?>
                <?php endforeach;?>
            </div>
        </div>
        <br>
        <?php if($contest){ ?>
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Date submitted</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Uploaded By</th>
                            <th>Votes</th>
                            <th>Status</th>
                            <th class="text-center">Result</th>
                            <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php foreach($results as $result){ ?>
                        <?php 
                            if($result->design_status=="Approved")
                                echo "<tr class='success'>" ;
                            else
                                echo "<tr class='danger'>" ;
                        ?>
                            <td><?php echo $result->date_submitted?></td>
                            <td><?php echo $result->name?></td>
                            <td class="text-center"><img src="<?php echo base_url()?>uploads/designs/<?php echo $result->image?>" width="150"></td>
                            <td><?php echo $result->first_name." ".$result->last_name?></td>
                            <td><?php echo $result->votes?></td>
                            <td>
                                <?php echo $result->design_status?>
                            </td>
                            <td style="background-color:#fff;">
                                <h3 class="text-center"><?php echo $result->result?></h3>
                            </td>
                            <td style="background-color:#fff;">
                                <div class="dropdown">
                                    <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" onclick="view_image('<?php echo $result->design_id ?>');">View Design</a></li>

                                        <?php foreach($contest as $x){?>
                                        <?php if($x->z==0){?>

                                        <?php if($result->design_status=="Pending"){?>
                                        <li class="divider"></li>
                                        <!--<li><a href="<?php echo base_url()?>staff_page/pending_design?id=<?php echo $result->design_id?>">Pending</a></li>-->
                                        <li><a href="#" onclick="approve_design('<?php echo $result->design_id ?>');">Approve</a></li>
                                        <li><a href="#" onclick="disapprove_design('<?php echo $result->design_id ?>');">Disapprove</a></li>
                                        <?php } ?>

                                        <?php if($result->design_status=="Approved"){?>
                                        <li class="divider"></li>
                                        <li><a href="#declare-winner-modal" onclick="declare_winner('<?php echo $result->design_id ?>');">Winner/Move to Products</a></li>
                                        <?php } ?>

                                        <?php } ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
            </div>
        </div>
        <?php } ?>
        
        
    </div>
</div>
<script>
    function end_contest() {
        bootbox.confirm("<font size='4'><b>Are you sure you want to End the Contest?</b></font><br> <font color='#f00'>Note: All Entries will now be Deleted.</font>", function(result) {
            if (result)
                window.location = "<?php echo base_url()?>staff_page/end_contest";
        });
    }
</script>
<script>
    function disapprove_design(id) {
        bootbox.confirm("<font size='4'><b>Are you sure you want to Disapprove this entry?</b></font><br> <font color='#f00'>Note: This will be deleted.</font>", function(result) {
            if (result)
                window.location = "<?php echo base_url() . 'staff_page/disapprove_design?id='?>" + id;
        });
    }
</script>
<script>
    function approve_design(id) {
        bootbox.confirm("<font size='4'><b>Are you sure you want to Approve this entry?</b></font><br> <font color='#f00'>Note: This will be shown in the Tee Design Contest.</font>", function(result) {
            if (result)
                window.location = "<?php echo base_url() . 'staff_page/approve_design?id='?>" + id;
        });
    }
</script>

<script>
    function view_image(id){
        $.LoadingOverlay("show");

        $.ajax({
            url : "<?php echo base_url('staff_page/ajax_view_design_by_id')?>/"+id,
            type: "POST",
            success: function(data){
                  console.log(data);
                var json = JSON.parse(data);
                var image=(json['result'][0]['image']);

                $("#ajax-design-image").attr("src", "<?php echo base_url().'uploads/designs/'?>"+image)
                $.LoadingOverlay("hide");
                $('#view-design-modal').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error !');
            }
        });
    }
</script>

<script>
    function declare_winner(id){
        $.LoadingOverlay("show");

        $.ajax({
            url : "<?php echo base_url('staff_page/ajax_view_design_by_id')?>/"+id,
            type: "POST",
            success: function(data){
              
                var json = JSON.parse(data);
                var votes=(json['result'][0]['votes']);
                var image=(json['result'][0]['image']);
                var id=(json['result'][0]['design_id']);
                var name=(json['result'][0]['name']);
                var customer_id=(json['result'][0]['customer_id']);
                var uploader_fname=(json['result'][0]['first_name']);
                var uploader_lname=(json['result'][0]['last_name']);
                var date_submitted=(json['result'][0]['date_submitted']);

                $("#ajax-design-votes-winner").val(votes);
                $("#ajax-design-image-winner").attr("src", "<?php echo base_url().'uploads/designs/'?>"+image);
                $("#ajax-design-image2-winner").val(image);
                $("#ajax-design-design-id-winner").val(id);
                $("#ajax-design-customer-id-winner").val(customer_id);
                $("#ajax-design-name-winner").val(name);
                $("#ajax-design-uploader-winner").val(uploader_fname+" "+uploader_lname);
                $("#ajax-design-date-submitted-winner").val(date_submitted);
                $.LoadingOverlay("hide");
                $('#declare-winner-modal').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error !');
            }
        });
    }
</script>

<!--View Image MODAL-->
<div class="modal fade modal" id="view-design-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Design</h4>
            </div>
            <div class="modal-body">
                <img src="#" style="width:100%;" id="ajax-design-image">
            </div>            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--NEW CONTEST  MODAL-->
<div class="modal fade modal" id="new-contest-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Start New Contest</h4>
            </div>
            <form action="<?php echo base_url()?>staff_page/start_new_contest" method="post">
            <div class="modal-body">
                <div>
                    Contest name
                    <input type="text" class="form-control" name="contest-name" value="<?php echo set_value('contest-name');?>"/>
                </div>
                <br>
                <div>
                    Contest Description
                    <textarea class="form-control" value="<?php echo set_value('description');?>" name="description" rows="8" style="resize:none;"></textarea>
                </div>
                <br>
                 <div>
                    Start Date
                    <input type="date" class="form-control" name="start-date"/>
                </div>
                <br>
                 <div>
                    End Date
                    <input type="date" class="form-control" name="end-date"/>
                </div>
            </div>            
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Start Contest</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--DECLARE WINNER MODAL-->
<div class="modal fade modal" id="declare-winner-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Declare as Winner</h4>
            </div>
            <form action="<?php echo base_url()?>staff_page/declare_winner" method="post">
            <div class="modal-body">
                <div style="width:100%;text-align:center;">
                    <img src="#" style="height:50%;" id="ajax-design-image-winner">
                </div>

                <?php foreach($contest as $x):?>
                <div>
                    <input type="hidden" class="form-control" name="contest-id" value="<?php echo $x->contest_id ?>" readonly />
                    <input type="hidden" class="form-control" name="contest-name" value="<?php echo $x->name ?>" readonly />
                    <input type="hidden" class="form-control" name="customer-id" id="ajax-design-customer-id-winner" readonly />
                    <input type="hidden" class="form-control" name="image-path" id="ajax-design-image2-winner" readonly />
                </div>
                <br>
                <?php endforeach; ?>

                <div>
                    <input type="hidden" class="form-control" name="design-id" id="ajax-design-design-id-winner" readonly />
                </div>
                
                <br>
                <div>
                    Design name
                    <input type="text" class="form-control" name="design-name" id="ajax-design-name-winner" readonly />
                </div>
                <br>
                <div>
                    Votes
                    <input type="text" class="form-control" name="votes" id="ajax-design-votes-winner" readonly />
                </div>
                <br>
                <div>
                    Uploader
                    <input type="text" class="form-control" name="uploader" id="ajax-design-uploader-winner" readonly />
                </div>
                <br>
                <div>
                    Date submitted
                    <input type="text" class="form-control" name="date-submitted" id="ajax-design-date-submitted-winner" readonly />
                </div>
                <br>
                <div>
                    Color
                    <input type="text" class="form-control" name="color"/>
                </div>
                <br>
                <div>
                    Description
                    <textarea class="form-control" rows="3" name="description" style="resize: none;"></textarea>
                </div>
                <br>
                <div>
                    Price
                    <div class="input-group">
                        <div class="input-group-addon">Php</div>
                        <input type="number" class="form-control" name="price">
                    </div>
                </div>
            </div>      
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Declare as winner</button>
            </div>
        </div>
    </div>
</div>



