        <?php $user_session = $this->session->userdata('customer_logged_in');?>    

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" id="menu-toggle">
                        <span class="glyphicon glyphicon-menu-hamburger"/></span>
                    </a>
                    <a href="<?php echo base_url() ?>profile?id=<?php echo $user_session['id'];?>" class="navbar-brand"  style="font-size:14px;">
                        Table Number: <?php echo $user_session['first_name'];?>
                    </a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="border:0px;">
                        <span class="glyphicon glyphicon-menu-down"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">My Account <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              
                                <li><a href="<?php echo base_url()?>view_order?id=<?php echo $user_session['id'];?>"><span class="glyphicon glyphicon-list-alt"></span> Order History</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url() ?>profile?id=<?php echo $user_session['id'];?> "><span class="glyphicon glyphicon glyphicon-cog"></span> Settings</a></li>	
                                <li><a href="#" onclick="logout()"><span class="glyphicon glyphicon glyphicon-off"></span> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <script type = "text/javascript" src = "<?php echo base_url() ?>assets/js/custom.js"></script>

        <script>
            function logout() {
                bootbox.confirm("Are you sure you want to logout?", function(x) {
                    if (x)
                        window.location = "<?php echo base_url() . 'shop/logout' ?>";
                });
            }
        </script>