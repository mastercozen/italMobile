


<!--View ORDER MODAL-->
<div class="modal fade" id="viewOrderDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title" id="ajax-view-order-header"></h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Customer Name</th>
                        <td id="ajax-customer-name"></td>
                    </tr>
                    <tr>
                        <th>Invoice ID</th>
                        <td id="ajax-invoice-id"></td>
                    </tr>
                    <tr>
                        <th>Payment Type</th>
                        <td id="ajax-payment-type"></td>
                    </tr>
                    <tr>
                        <th>PayPal Transaction ID</th>
                        <td id="ajax-pp-txn-id"></td>
                    </tr>
                    <tr>
                        <th>Order Status</th>
                        <td id="ajax-order-status"></td>
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        <td id="ajax-payment-status"></td>
                    </tr>
                    <tr>
                        <th>Shipping Address</th>
                        <td id="ajax-shipping-address"></td>
                    </tr>
                    <tr>
                        <th>Date Ordered</th>
                        <td id="ajax-date-ordered"></td>
                    </tr>
                </table>
                <div id="view-order-table">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-id="0"data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



