<?php

$conn = mysqli_connect('localhost','limitado_admin','1234qwer','limitado_db');
  
  $query = mysqli_query($conn, "select * from customer where email='".$_POST['email']."'");

      $data = mysqli_fetch_assoc($query);

         echo json_encode(
          array(
            "first_name" => $data['first_name'],
            "middle_name" =>  $data['middle_name'],
            "last_name" =>  $data['last_name'],
            "password" => $data['password'],
            "contact" => $data['contact']

          )
      );


 ?>