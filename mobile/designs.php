<?php
	include("connection.php");

	$sql = "SELECT design_id, name, image FROM shirt_design WHERE design_status = 'Approved';";
	$stmt = $con->prepare($sql);
	$stmt->execute();

	$designs = array();
	while($row = $stmt->fetch(PDO::FETCH_NUM)) {
		array_push($designs,
			array("design_id"=>$row[0],
				"name"=>$row[1],
				"image"=>$row[2])
		);
	}

	echo json_encode(array("designs"=>$designs));
?>