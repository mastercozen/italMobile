<?php
include("connection.php");

if(isset($_POST['email'])
	&& isset($_POST['pass'])
	&& isset($_POST['fname'])
	&& isset($_POST['mname'])
	&& isset($_POST['lname'])
	&& isset($_POST['contact'])) {

	// Purify user input
	$email = strip_tags($_POST['email']);
	$pass = strip_tags($_POST['pass']);
	$fname = strip_tags($_POST['fname']);
	$mname = strip_tags($_POST['mname']);
	$lname = strip_tags($_POST['lname']);
	$contact = strip_tags($_POST['contact']);

	$sql = "UPDATE customer
		SET password = :password,
			first_name = :fname,
			middle_name = :mname,
			last_name = :lname,
			contact = :contact
		WHERE email = :email;";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':password', $password);
	$stmt->bindParam(':fname', $fname);
	$stmt->bindParam(':mname', $mname);
	$stmt->bindParam(':lname', $lname);
	$stmt->bindParam(':contact', $contact);
	$stmt->bindParam(':email', $email);
	$stmt->execute();

	if($stmt->rowCount() > 0) {
		// Update Successful
		$result['status'] = 1;
		echo json_encode($result);
	} else {
		// Update Failed
		$result['status'] = 2;
		echo json_encode($result);
	}
} else {
	echo basename($_SERVER['PHP_SELF']);
}
?>