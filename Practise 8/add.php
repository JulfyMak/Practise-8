<?php
    require_once "pages/connection.php"; // conn

      $first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
      $last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
      $role_id = mysqli_real_escape_string($conn, $_REQUEST['role_id']);
      $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
      $password = mysqli_real_escape_string($conn, $_REQUEST['pass']);

      	if (count($_POST)>0) {
          $sql = "INSERT INTO users (first_name, last_name, email, password,
          role_id) VALUES ('$first_name', '$last_name', '$email', '$password', '$role_id')";

      		$res = mysqli_query($conn, $sql);

          if (!$res) {
              printf("Error: %s\n", mysqli_error($conn));
              exit();
          }

          header('Location: pages/restricted_admin.php?id='.$_GET['id']);
        }
?>
