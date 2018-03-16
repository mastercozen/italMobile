<?php
	include("connection.php");
	if(isset($_POST['transaction_id'])
		&& isset($_POST['invoice'])
		&& isset($_POST['customer_id'])
		&& isset($_POST['email'])
		&& isset($_POST['address'])
		&& isset($_POST['items'])
		&& isset($_POST['size'])) {

		$transaction_id = strip_tags($_POST['transaction_id']);
		$invoice = strip_tags($_POST['invoice']);
		$customer_id = strip_tags($_POST['customer_id']);
		$payment_type = "PayPal";
		$order_status = "Pending";
		$payment_status = "Completed";
		$email = strip_tags($_POST['email']);
		$address = strip_tags($_POST['address']);
		$items = json_decode($_POST['items'], true);
		$size = strip_tags($_POST['size']);

		// Timezone
		$timezone = new DateTimeZone('Asia/Hong_Kong');

		// DATE_REG COLUMN
		$datetime = new DateTime();
		$datetime->setTimezone($timezone);
		$date = date($datetime->format('Y-m-d H:i:s'));

		/* FOR DEBUGGING PURPOSES */
		// $transaction_id = "PAY-8BX81784MR323625WK6V6X5I";
		// $invoice = "68861313";
		// $customer_id = '2';
		// $payment_type = "PayPal";
		// $order_status = "Pending";
		// $payment_status = "Completed";
		// $address = "Sample Address";
		// $size = 1;
		// $preItems = '{"0":{"item_id":1,"item_name":"Sample Product 1","item_price":300,"item_qty":10,"item_size":"Extra Large","item_total_amount":3000}}';
		// $items = json_decode($preItems, true);

		// INSERT INTO ORDERS
		$sql = "INSERT INTO orders(transaction_id, invoice_id, customer_id, payment_type,
				order_status, payment_status, shipping_address, date_ordered)
			VALUES(:transaction_id, :invoice_id, :customer_id, :payment_type, :order_status,
				:payment_status, :shipping_address, :date_ordered);";
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':transaction_id', $transaction_id);
		$stmt->bindParam(':invoice_id', $invoice);
		$stmt->bindParam(':customer_id', $customer_id);
		$stmt->bindParam(':payment_type', $payment_type);
		$stmt->bindParam(':order_status', $order_status);
		$stmt->bindParam(':payment_status', $payment_status);
		$stmt->bindParam(':shipping_address', $address);
		$stmt->bindParam(':date_ordered', $date);
		$stmt->execute();

		// INSERT INTO ORDER DETAILS
		$sql = "INSERT INTO order_details
			VALUES(:invoice_id, :product_id, :name, :price, :quantity, :size, :subtotal)";
		$stmt = $con->prepare($sql);

		for($i = 0; $i < $size; $i++) {
			$stmt->bindParam(':invoice_id', $invoice);
			$stmt->bindParam(':product_id', $items[$i]['item_id']);
			$stmt->bindParam(':name', $items[$i]['item_name']);
			$stmt->bindParam(':price', $items[$i]['item_price']);
			$stmt->bindParam(':quantity', $items[$i]['item_qty']);
			$stmt->bindParam(':size', $items[$i]['item_size']);
			$stmt->bindParam(':subtotal', $items[$i]['item_total_amount']);
			$stmt->execute();

			// UPDATE QTY
			$sql_update = "UPDATE stocks_online SET " . $items[$i]['item_size'] . " = " . $items[$i]['item_size'] . " - :quantity WHERE product_id = :product_id";
			$update = $con->prepare($sql_update);
			$update->bindParam(':quantity', $items[$i]['item_qty']);
			$update->bindParam(':product_id', $items[$i]['item_id']);
			$update->execute();
		}

		$result['status'] = 1;
		echo json_encode($result);
	} else {
		echo basename($_SERVER['PHP_SELF']);
	}
?>