<div class="content-wrapper">
    <div class="container-fluid">
        <div class="page-header">
            <h3>Sales Report</h3>
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
            <div class="col-md-4">
                To start viewing the Italiannis Sales Report, Click the button Below.<br><br>
                <div class="dropdown">
                    <button class="btn btn-success btn-lg dropdown-toggle" type="button" data-toggle="dropdown">Sales Report By
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#view-specific-date-report" data-toggle="modal">Specific date</a></li>
                        <li><a href="#view-month-report"  data-toggle="modal">Specific Month of a Year</a></li>
                        <li><a href="#view-year-report" data-toggle="modal">Year</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--SPECIFIC DAY-->
<div class="modal fade madal" id="view-specific-date-report" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enter the date</h4>
            </div>
            <form action="<?php echo base_url()?>staff_page/reports_specific_date" method="post">
            <div class="modal-body">
                
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="input-date"class="form-control">
                </div>
                
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Go">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--SPECIFIC Month-->
<div class="modal fade madal" id="view-month-report" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enter the Month and Year</h4>
            </div>
            <form action="<?php echo base_url()?>staff_page/reports_specific_m_y" method="post">
            <div class="modal-body">
                
                <div class="form-group">
                    <label>Month</label>
                    <select name="month" class="form-control">
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select><br>
                    <label>Year</label>
                    <input type="number" name="year" class="form-control">
                </div>
                
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Go">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--SPECIFIC Month-->
<div class="modal fade madal" id="view-year-report" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enter Year</h4>
            </div>
            <form action="<?php echo base_url()?>staff_page/reports_specific_year" method="post">
            <div class="modal-body">
                
                <div class="form-group">
                    <label>Year</label>
                    <input type="number" name="year" class="form-control">
                </div>
                
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Go">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
            </div>
            </form>
        </div>
    </div>
</div>