<?php
	include("connection.php");

	$sql = "SELECT DISTINCT(type) FROM products;";
	$stmt = $con->prepare($sql);
	$stmt->execute();

	$types = array();
	while($row = $stmt->fetch(PDO::FETCH_NUM)) {
		array_push($types,array('type'=>$row[0]));
	}

	echo json_encode(array("types"=>$types));
?>