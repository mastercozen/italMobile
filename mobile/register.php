<?php
include("connection.php");

if(isset($_POST['email'])
	&& isset($_POST['password'])
	&& isset($_POST['firstname'])
	&& isset($_POST['middlename'])
	&& isset($_POST['lastname'])
	&& isset($_POST['contactnumber'])
	&& isset($_POST['gender'])
	&& isset($_POST['street'])
	&& isset($_POST['city'])
	&& isset($_POST['state'])
	&& isset($_POST['zip'])
	&& isset($_POST['country'])) {

	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	$firstname = strip_tags($_POST['firstname']);
	$middlename = strip_tags($_POST['middlename']);
	$lastname = strip_tags($_POST['lastname']);
	$contact = strip_tags($_POST['contactnumber']);
	$gender = strip_tags($_POST['gender']);
	$street = strip_tags($_POST['street']);
	$city = strip_tags($_POST['city']);
	$state = strip_tags($_POST['state']);
	$zip = strip_tags($_POST['zip']);
	$country = strip_tags($_POST['country']);

		// // DEBUGGING PURPOSES (Uncomment for testing only)
		// $email = "bascoangelo@gmail.com";
		// $password = "sample";
		// $firstname = "Angelo";
		// $middlename = "Cortez";
		// $lastname = "Basco";
		// $contact = "09275354581";
		// $gender = "Male";
		// $street = "Sample Street";
		// $city = "Sample City";
		// $state = "Sample State";
		// $zip = "1234";
		// $country = "Philippines";

	// Check for duplicate email
	$sql = "SELECT email FROM customer
		WHERE email = :email;";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	if($stmt->rowCount() == 0) {
		// Generate status key and status
		$key = uniqid();
		$status = 0;

		// Generate query
		$sql = "INSERT INTO customer(email, password, first_name, middle_name, last_name, contact, gender, status, status_key)
			VALUES(:email, :password, :firstname, :middlename, :lastname, :contact, :gender, :status, :key);";
		// Prepare PDO
		$stmt = $con->prepare($sql);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':middlename', $middlename);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':contact', $contact);
		$stmt->bindParam(':gender', $gender);
		$stmt->bindParam(':status', $status);
		$stmt->bindParam(':key', $key);
		$stmt->execute();

		if($stmt->rowCount() > 0) {
			// Creation Successful
			// Get the customer_id of the newly created account
			$sql = "SELECT customer_id FROM customer
				WHERE email = :email";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$id = $row['customer_id'];

			// Generate query to insert to address book
			$sql = "INSERT INTO address_book(customer_id, street, city, state, zip, country)
				VALUES(:customer_id, :street, :city, :state, :zip, :country);";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':customer_id', $id);
			$stmt->bindParam(':street', $street);
			$stmt->bindParam(':city', $city);
			$stmt->bindParam(':state', $state);
			$stmt->bindParam(':zip', $zip);
			$stmt->bindParam(':country', $country);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				// Successful Insertion to address book
				// Generate Email Verification Message
				// ! DONT FORGET TO CHANGE EMAIL HEADER
				require 'PHPMailer/PHPMailerAutoload.php';
				$mail = new PHPMailer;
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'nicolasiipro@gmail.com';                 // SMTP username
				$mail->Password = '@Mhoc026';                           // SMTP password
				$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 465;                                    // TCP port to connect to

				//$mail->setFrom('administrator@limitadoph.com', 'Italiannis : Pasta, Pizza and Wings');
				$mail->setFrom('nicolasiipro@gmail.com', 'Italiannis : Pasta, Pizza and Wings');
				$mail->addAddress($email);     // Add a recipient
				$mail->Subject = 'Email Verification';
				$mail->Body    = 'Greetings! from Italiannis : Pasta, Pizza and Wings. You may now click the confirmation Link below to complete your registration. http://limitadoph.com/Register/updateStatus/'.$id."/$key";
				$mail->send();

				// Successful Registration
				$result['status'] = 1;
				echo json_encode($result);
			} else {
				// Failed Insertion to address book
				$result['status'] = 2;
				echo json_encode($result);
			}
		} else {
			// Account Creation Failed
			$result['status'] = 3;
			echo json_encode($result);
		}
	} else {
		// Return error, email already taken
		$result['status'] = 4;
		echo json_encode($result);
	}
} else {
	echo basename($_SERVER['PHP_SELF']);
}

/* PROGRAM FLOW
	1. Check all variable validity using isset()
	2. Strip all HTML tags from user input
	3. Check for Duplicate Email
	4. Insert user input to customer table
	5. Get newly generated customer_id from customer table
	6. Insert address in address_book using customer_id as foreign key
	7. Generate Email Verification
 */
?>
