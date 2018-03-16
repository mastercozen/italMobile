<?php
include("connection.php");

if(isset($_POST['name'])
	&& isset($_POST['email'])
	&& isset($_POST['contact'])
	&& isset($_POST['message'])) {

	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$phone = strip_tags($_POST['contact']);
	$message = strip_tags($_POST['message']);

	// Timezone
	$timezone = new DateTimeZone('Asia/Hong_Kong');

	// DATE_REG COLUMN
	$datetime = new DateTime();
	$datetime->setTimezone($timezone);
	$date = date($datetime->format('Y-m-d H:i:s'));

	$sql = "INSERT INTO feedbacks(name, email, phone, message, date_submitted)
		VALUES(:name, :email, :phone, :message, :date_submitted);";

	$stmt = $con->prepare($sql);
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':phone', $phone);
	$stmt->bindParam(':message', $message);
	$stmt->bindParam(':date_submitted', $date);
	$stmt->execute();

	if($stmt->rowCount() > 0) {
		// Feedback Successful
		$result['status'] = 1;
		echo json_encode($result);
	} else {
		// Feedback Failed
		$result['status'] = 2;
		echo json_encode($result);
	}
} else {
	echo basename($_SERVER['PHP_SELF']);
}
?>