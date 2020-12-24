<?php
    //права админа на удаление и редактирование 
    require_once "db/connection.php"; // conn
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['pass']);
    $role_id = mysqli_real_escape_string($conn, $_REQUEST['role_id']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    session_start();

    if (count($_POST)>0) {
      if($_POST['edit']){
        $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name',
        password='$password', role_id='$role_id', email='$email' WHERE id='$id'";
        $res = mysqli_query($conn, $sql);
        header('Location: pages/restricted.php?id='.$_SESSION['admin_id']);
      }

      if($_POST['delete']){
        $sql = "DELETE FROM users WHERE id='$id'";
        $res = mysqli_query($conn, $sql);
        header('Location: pages/restricted_admin.php?id='.$_SESSION['admin_id']);
      }

      if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
      }

    }
?>
