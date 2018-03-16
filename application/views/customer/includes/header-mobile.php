<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Italiannis : Pasta, Pizza and Wings
        </title>
        <link rel="shortcut icon" href="<?php echo base_url() ?>favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url() ?>favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- JQuery -->
        <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
        
        <!-- AJAX LOADER -->
        <script src="<?php echo base_url() ?>assets/ajaxloader/loadingoverlay.js"></script>        
        <!-- Bootstrap -->
        <link href="<?php echo base_url() ?>bs/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo base_url() ?>bs/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>bs/js/bootbox.min.js"></script>
        
        <!-- Custom CSS -->
        <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">
        <script src="<?php echo base_url() ?>assets/js/siteloading.js"></script>
        
        <!-- Custom Footer -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/custom-footer.css" rel="stylesheet">
        
        <!-- DATA TABLES -->
        <script src="<?php echo base_url() ?>bs/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>bs/datatables/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>bs/datatables/dataTables.bootstrap.min.css">
        
        
        
        <script>
            $(document).ready(function(){
                $('#example').DataTable();
            });
        </script>
        
    </head>
    <body>
        <div id="overlay">
            <div id="progstat"></div>
            <div id="progress"></div>
        </div>