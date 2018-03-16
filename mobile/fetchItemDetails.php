<?php
	include("connection.php");

	if(isset($_POST['id'])) {
		$id = strip_tags($_POST['id']);
		// For Testing purposes
		// $id = 1;

		$sql = "SELECT xs, sm, md, lg, xl, xxl, xxxl, one FROM stocks_online WHERE product_id = :id";
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$result['xs'] = $row['xs'];
		$result['sm'] = $row['sm'];
		$result['md'] = $row['md'];
		$result['lg'] = $row['lg'];
		$result['xl'] = $row['xl'];
		$result['xxl'] = $row['xxl'];
		$result['xxxl'] = $row['xxxl'];
		$result['size_one'] = $row['one'];

		echo json_encode($result);
	} else {
		echo basename($_SERVER['PHP_SELF']);
	}
?>