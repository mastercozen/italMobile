<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
    <head>
        <title>
            Administrator
        </title>
         <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/admin-login.css">
    </head>
    <body>
        <div class="admin-login-wrapper">
            <div class="admin-logo">
                <table border="0">
                    <tr>
                        <td><img src="<?php echo base_url();?>assets/images/logo.png"></td>
                    </tr>
                    <tr>
                        <td><b>Administrator</b> Panel</td>
                    </tr>
                </table>
            </div>
            <div class="validations" style="font-family:calibri; color:#f00; text-align:Center;">
                <?php echo validation_errors(); ?>
            </div>
           <form action="<?php echo base_url();?>Administrator/verify_login" method="post">
                 <table border="0">
                     <tr>
                         <td><input type="text" name="username" placeholder="Enter Username"/></td>
                     </tr>
                     <tr>
                         <td><input type="password" name="password" placeholder="Enter Password"></td>
                     </tr>
                     <tr>
                         <td><Input type="submit"  value="Login"/></td>
                     </tr>
                 </table>
             </form>
        </div>
    </body>
</html>