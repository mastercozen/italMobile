<?php
include("connection.php");
if(isset($_POST['email']) && isset($_POST['password'])) {
  $email = strip_tags($_POST['email']);
  $password = strip_tags($_POST['password']);

  $sql = "SELECT a.customer_id, email, first_name, middle_name, last_name, contact, b.street, b.city, b.state, b.zip, b.country
    FROM customer a, address_book b
    WHERE a.email = :email
      AND a.password = :password
      AND a.status = '1'
      AND a.customer_id = b.customer_id
    LIMIT 1;";
  $stmt = $con->prepare($sql);
  $stmt->bindParam(":email", $email);
  $stmt->bindParam(":password", $password);
  $stmt->execute();

  // Check if account exists by counting number of rows
  if($stmt->rowCount() > 0) {
    // Account exists, fetch entire row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $address = $row['street'] . " " . $row['city'] . " " . $row['state'] . " " . $row['zip'] . " " . $row['country'];

    $result['status'] = 2;
    $result['customer_id'] = $row['customer_id'];
    $result['email'] = $row['email'];
    $result['first_name'] = $row['first_name'];
    $result['middle_name'] = $row['middle_name'];
    $result['last_name'] = $row['last_name'];
    $result['contact'] = $row['contact'];
    $result['address'] = $address;
    $result['city'] = $row['city'];
    echo json_encode($result);
  } else {
    // Account doesn't exists
    $result['status'] = 0;
    echo json_encode($result);
  }
} else {
  echo basename($_SERVER['PHP_SELF']);
}
?>