<?php
	include("connection.php");

	if(isset($_POST['type'])) {
		$type = strip_tags($_POST['type']);
		$sql = "SELECT COUNT(*) FROM products
			WHERE status = 'Active'
				AND type = :type;";
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':type', $type);
		$stmt->execute();
		$numrows = $stmt->fetchColumn();
	  $rowsperpage = 4;
	  $totalpages = ceil($numrows / $rowsperpage);
	  if(isset($_POST['currentpage']) && is_numeric($_POST['currentpage'])) {
	    $currentpage = (int)$_POST['currentpage'];
	  } else {
	    $currentpage = 1;
	  }
	  if ($currentpage > $totalpages) {
	    $currentpage = $totalpages;
	  }
	  if ($currentpage < 1) {
	    $currentpage = 1;
	  }

	  $offset = ($currentpage - 1) * $rowsperpage;
		$sql = "SELECT * FROM products
			WHERE status = 'Active'
				AND type = :type
			LIMIT $offset, $rowsperpage";

		$stmt = $con->prepare($sql);
		$stmt->bindParam(':type', $type);
		$stmt->execute();

		$items = array();
		while($row = $stmt->fetch(PDO::FETCH_NUM)) {
			array_push($items,
				array('product_id'=>$row[0],
					'product_name'=>$row[1],
					'type'=>$row[2],
					'sizing'=>$row[3],
					'color'=>$row[4],
					'price'=>$row[5],
					'description'=>$row[7],
					'image_path'=>$row[8]
				)
			);
		}

		echo json_encode(array("page"=>$currentpage, "totalpages"=>$totalpages, "items"=>$items));
	} else {
		echo basename($_SERVER['PHP_SELF']);
	}
?>