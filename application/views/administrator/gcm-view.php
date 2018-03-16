<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Push Notifications for Mobile</h3>
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
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="<?php echo base_url()?>administrator_page/push" method="post">
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" name="message" rows="5" style="resize:none;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
        <br><br><br>
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php foreach($messages as $x):?>
                    	<tr>
                            <td><?php echo date("F jS, Y h:i:sa",strtotime($x->date_submitted)) ?></td>
                            <td><?php echo $x->message ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>