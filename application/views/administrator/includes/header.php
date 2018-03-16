<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
    <head>
        <title>PRODUCTS</title>
        
        <!-- JQUERY -->
        <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
        
        <!-- AJAX LOADER -->
        <script src="<?php echo base_url(); ?>assets/ajaxloader/loadingoverlay.js"></script>    
        
        <!-- Bootstrap -->
        <link href="<?php echo base_url() . 'bs/' ?>css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo base_url() . 'bs/' ?>js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() . 'bs/' ?>js/bootbox.min.js"></script>
        <!--Custom CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/admin.css">
        
            
        
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