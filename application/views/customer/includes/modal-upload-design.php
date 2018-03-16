<div class="modal fade modal" id="upload-design" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tee Design Contest</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url()?>design_contest/upload_design" method="post" enctype="multipart/form-data" id="upload-form">
                    <div>
                        Design name
                        <input type="text" class="form-control" name="design-name" value="<?php echo set_value('design-name');?>" width="100%">
                    </div>
                    <br>
                    <div>
                        Image
                        <input type="file" class="form-control" name="userfile" width="100%">
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-success btn-lg" id="upload-btn"><span class="glyphicon glyphicon-picture"></span> Upload</button>
                    </div>
                </form>
            </div>            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    
    
    $('#upload-btn').click(function(e) {
        e.preventDefault();


    bootbox.confirm('<font color="#f00">By clicking the "OK" Button, you agree to our Terms and condtions below:</font><br><br>\n\
    <b>CUSTOMIZATION AND UPLOAD DESIGN TERMS AND CONDITIONS</b><br>\n\
    1. Designs that are sent to Italiannis will be owned by Italiannis but with your acknowledgement as the designer.<br>\n\
    ', function(result) {
        
        
        if (result) {
            $('#upload-form').submit();
        }
    });
});
</script>