<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Feedbacks</h3>
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
                <table id="example" class="table table-striped table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Date Submitted</th>
                            <th>Submitted by</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($results as $result) { ?>
                        <tr class="info">
                            <td><?php echo $result->date_submitted ?></td>
                            <td><?php echo $result->name ?></td>
                            <td><?php echo $result->email ?></td>
                            <td><?php echo $result->phone ?></td>
                            <td><a href="#" onclick="view_feedback('<?php echo $result->feedback_id ?>')" class="btn btn-primary btn-sm">View Feedback</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function view_feedback(id){
        $.LoadingOverlay("show");
        $.ajax({
            url : "<?php echo base_url('staff_page/getFeedbackById')?>/"+id,
            type: "POST",
            success: function(data){
                var json = JSON.parse(data);

                console.log(data);
                
                $('#ajax-feedback-name').val(json['results'][0]['name']);
                $('#ajax-feedback-email').val(json['results'][0]['email']);
                $('#ajax-feedback-phone').val(json['results'][0]['phone']);
                $('#ajax-feedback-date').val(json['results'][0]['date_submitted']);
                $('#ajax-feedback-message').val(json['results'][0]['message']);
                
                
                $.LoadingOverlay("hide");
                $('#view-feedback-modal').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error !');
            }
        });
    }
</script>

<!--ADD PRODUCT MODAL-->
<div class="modal fade madal" id="view-feedback-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Feedback</h4>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="ajax-feedback-name" disabled>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="ajax-feedback-email" disabled>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" id="ajax-feedback-phone" disabled>
                </div>
                <div class="form-group">
                    <label>Date submitted</label>
                    <input type="text" class="form-control" id="ajax-feedback-date" disabled>
                </div>
                <div class="form-group">
                    <label>Feedback message</label>
                    <textarea class="form-control" id="ajax-feedback-message"style="resize: none; height:100px;" disabled></textarea>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
            </div>
        </div>
    </div>
</div>

