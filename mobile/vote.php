<?php
	include("connection.php");
	if(isset($_POST['customer_id'])
		&& isset($_POST['design_id'])) {
		$customer_id = strip_tags($_POST['customer_id']);
		$design_id = strip_tags($_POST['design_id']);

		// Check first if the vote status of the customer
		$sql = "SELECT vote_status
			FROM customer
			WHERE customer_id = :customer_id";
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':customer_id', $customer_id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row['vote_status'] == 0) {
			// Update Customer Voting Status
			$sql = "UPDATE customer
				SET vote_status = 1,
					design_voted = :design_id
				WHERE customer_id = :customer_id;";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':design_id', $design_id);
			$stmt->bindParam(':customer_id', $customer_id);
			$stmt->execute();

			// Increment the number of votes for the shirt design
			$sql = "UPDATE shirt_design
				SET votes = votes + 1
				WHERE design_id = :design_id";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':design_id', $design_id);
			$stmt->execute();

			if($stmt->rowCount() > 0) {
				$result['status'] = 1;
				echo json_encode($result);
			} else {
				$result['status'] = 2;
				echo json_encode($result);
			}
		} else {
			$result['status'] = 3;
			echo json_encode($result);
		}
	} else {
		echo basename($_SERVER['PHP_SELF']);
	}
?>